<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('c_auth');
        }
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
        $this->load->model('m_pesanan');
        $this->load->model('m_userinfo');
    }

    public function index($id)
    {
        $id_user = $this->session->userdata('id_user');


        if ($this->is_akomodasi($id)) {
            $data['page_title'] = 'Detail Akomodasi';
            $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
            $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
            $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
            $data['kamar'] = $this->M_akomodasi->get_all_kamar($id);
            $data['user'] = $this->m_userinfo->getDetail($id_user);

            $this->load->view('templates/header');
            $data['step'] = 1;
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/index', $data);
        } else if ($this->is_event($id)) {
            $data['page_title'] = 'Detail Event';
            $data['event'] = $this->M_event->getDetail($id);
            $data['step'] = 1;
            $data['user'] = $this->m_userinfo->getDetail($id_user);
            $this->load->view('user/pemesanan/navbar_pesanan', $data);

            $this->load->view('user/pemesanan/detail_event', $data);
            $this->load->view('templates/footer');
        } else {

            $data['event'] = $this->M_event->getDetail($id);
            $this->load->view('templates/header');
            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');

            $data['page_title'] = 'Detail Destinasi';
            $data['destinasi'] = $this->M_tempatWisata->getDetail($id);
            $data['step'] = 1;
            $data['user'] = $this->m_userinfo->getDetail($id_user);
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/detail_destinasi', $data);
        }
    }

    public function step1()
    {
        $data['step'] = 1;
        $this->load->view('user/pemesanan/navbar_pesanan', $data);
        $this->load->view('user/pemesanan/detail_event', $data);
    }

    public function step2()
    {
        $id_user = $this->session->userdata('id_user');
        $id_pemesanan_akomodasi = $this->session->userdata('id_pemesanan_akomodasi');
        $id_pemesanan_destinasi = $this->session->userdata('id_pemesanan_destinasi');
        $id_pemesanan_event = $this->session->userdata('id_pemesanan_event');

        // Debugging: Tampilkan semua session data
        var_dump($this->session->all_userdata());

        if (!$id_pemesanan_akomodasi && !$id_pemesanan_destinasi && !$id_pemesanan_event) {
            redirect('user/pemesanan');
        }

        $data['step'] = 2;
        $data['user'] = $this->m_userinfo->getDetail($id_user);

        if ($id_pemesanan_akomodasi) {
            $data['pemesanan'] = $this->m_pesanan->get_pesanan_akomodasi($id_pemesanan_akomodasi);
            $data['akomodasi'] = $this->M_akomodasi->getDetail($data['pemesanan']['id_akomodasi']);
            $data['tanggal_kunjungan'] = $data['pemesanan']['tanggal_pemesanan'];
            $data['jumlah_orang'] = $data['pemesanan']['jumlah_orang'];
            $data['total_harga'] = $data['pemesanan']['total_harga'];
            $data['jenis_pesanan'] = 'akomodasi';
        } elseif ($id_pemesanan_destinasi) {
            $data['pemesanan'] = $this->m_pesanan->get_pesanan_destinasi($id_pemesanan_destinasi);
            $data['destinasi'] = $this->M_tempatWisata->getDetail($data['pemesanan']['id_tempat_wisata']);
            $data['tanggal_kunjungan'] = $data['pemesanan']['tanggal_pemesanan'];
            $data['jumlah_orang'] = $data['pemesanan']['jumlah_orang'];
            $data['total_harga'] = $data['pemesanan']['total_harga'];
            $data['id_pesanan'] = $id_pemesanan_destinasi;
            $data['jenis_pesanan'] = 'destinasi';
        } elseif ($id_pemesanan_event) {
            $data['pemesanan'] = $this->m_pesanan->get_pesanan_event($id_pemesanan_event);
            $data['event'] = $this->M_event->getDetail($data['pemesanan']['id_event']);
            $data['tanggal_kunjungan'] = $data['pemesanan']['tanggal_pemesanan'];
            $data['jumlah_orang'] = $data['pemesanan']['jumlah_orang'];
            $data['total_harga'] = $data['pemesanan']['total_harga'];
            $data['jenis_pesanan'] = 'event';
            $data['id_pesanan'] = $id_pemesanan_event;
        }

        $data['metode_pembayaran'] = $this->m_pesanan->get_metode_pembayaran();

        // Debugging
        // var_dump($data); // Pastikan data ini sesuai
        // exit;

        $this->load->view('user/pemesanan/navbar_pesanan', $data);
        $this->load->view('user/pemesanan/step2', $data);
    }




    public function cancel($jenis_pesanan = '', $id_pesanan = '')
    {
        // Validasi jenis pesanan
        if (!in_array($jenis_pesanan, ['destinasi', 'akomodasi', 'event'])) {
            show_error('Jenis pesanan tidak valid.');
        }

        // Validasi ID pesanan
        if (empty($id_pesanan) || !is_numeric($id_pesanan)) {
            show_error('ID pesanan tidak valid.');
        }

        // Simpan detail pemesanan dalam session sebelum dihapus
        switch ($jenis_pesanan) {
            case 'destinasi':
                $detail_pemesanan = $this->m_pesanan->getDetailPesananDestinasi($id_pesanan); // Ganti dengan metode dari model sesuai kebutuhan
                $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
                $this->m_pesanan->cancel_pesanan_destinasi($id_pesanan);
                // $this->session->unset_userdata('id_pemesanan_destinasi');
                break;
            case 'akomodasi':
                $detail_pemesanan = $this->m_pesanan->getDetailPesananAkomodasi($id_pesanan); // Ganti dengan metode dari model sesuai kebutuhan
                $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
                $this->m_pesanan->cancel_pesanan_akomodasi($id_pesanan);
                $this->session->unset_userdata('id_pemesanan_akomodasi');
                break;
            case 'event':
                $detail_pemesanan = $this->m_pesanan->getDetailPesananEvent($id_pesanan); // Ganti dengan metode dari model sesuai kebutuhan
                $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
                $this->m_pesanan->cancel_pesanan_event($id_pesanan);
                $this->session->unset_userdata('id_pemesanan_event');
                break;
            default:
                show_error('Jenis pesanan tidak valid.');
                break;
        }

        // Unset jenis_pesanan dari session
        $this->session->unset_userdata('jenis_pesanan');

        // Redirect ke halaman sesuai jenis pesanan yang dibatalkan
        switch ($jenis_pesanan) {
            case 'destinasi':
                redirect('user/pemesanan/index/' . $id_pesanan); // Pastikan URL sesuai dengan kebutuhan
                break;
            case 'akomodasi':
                redirect('user/pemesanan');
                break;
            case 'event':
                redirect('user/pemesanan/index/' . $id_pesanan);
                break;
            default:
                show_error('Jenis pesanan tidak valid.');
                break;
        }
    }



    private function is_akomodasi($id)
    {

        $result = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row();
        return !empty($result);
    }

    private function is_event($id)
    {
        $result = $this->db->get_where('event', ['id_event' => $id])->row();
        return !empty($result);
    }

    private function is_destinasi($id)
    {
        $result = $this->db->get_where('tempat_wisata', ['id_tempat_wisata' => $id])->row();
        return $result;
    }

    public function pemesanan_kamar()
    {
        //mengambil inputan pada view 
        $nama_tamu = $this->input->post('nama_tamu');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $check_in = $this->input->post('check_in');
        $check_out = $this->input->post('check_out');
        $kamar_id = $this->input->post('kamar_id');
        //mengambil data kamar berdasarkan id kamar dari database 
        $kamar = $this->M_akomodasi->get_kamar_id($kamar_id);

        //perhitungan tanggal 
        $check_in_date =  new  DateTime($check_in);
        $check_out_date =  new  DateTime($check_out);
        $tempo = $check_in_date->diff($check_out_date);
        $hari = $tempo->days; // mengambil jumlah hari dan nantik akan di tampilkan
        //menghitung total harga 
        $total_harga = $kamar['harga'] * $hari;

        //inser database ke pemesanan
        $data = array(
            'tanggal_pemesanan' => '',
            'total_harga' => $total_harga,
            'check_in' => $check_in,
            'check_out' => $check_out,
            //masih bingung
            'akomodasi_id_akomodas' => '',
            'event_id_event ' => '',
            'tempat_wisata_id_tempat_wisata' => '',
            'user_id_user' => '',
            'admin_ako_id_admin' => ''
        );
        $this->M_akomodasi->insert_pemesanan($data);
        //mengarah ke pembayaran
    }

    public function proses_pesan()
    {
        $tanggal_kunjungan = $this->input->post('tanggal_kunjungan');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $id_destinasi = $this->input->post('id_tempat_wisata');
        $id_user = $this->session->userdata('id_user');

        if (!$this->is_destinasi($id_destinasi)) {
            show_error('Destinasi tidak valid');
        }

        $destinasi = $this->M_tempatWisata->getDetail($id_destinasi);
        $stok_tiket = $this->M_tempatWisata->getStokTiket($id_destinasi);

        if ($jumlah_orang > $stok_tiket['stok_tiket']) {
            $this->session->set_flashdata('error', 'Jumlah tiket yang diminta melebihi stok yang tersedia');
            redirect('user/pemesanan/index/' . $id_destinasi);
            return;
        }

        $harga_destinasi = $destinasi['biaya_tempat_wisata'];
        $total_harga = $jumlah_orang * $harga_destinasi;

        $data_pemesanan = array(
            'tanggal_pemesanan' => $tanggal_kunjungan,
            'jumlah_orang' => $jumlah_orang,
            'id_tempat_wisata' => $id_destinasi,
            'total_harga' => $total_harga,
            'id_user' => $id_user,
            'status' => 1
        );

        $id_pemesanan = $this->m_pesanan->simpan_pesanan_destinasi($data_pemesanan);
        $this->session->set_userdata('id_pemesanan_destinasi', $id_pemesanan);
        $this->M_tempatWisata->kurangiStokTiket($id_destinasi, $jumlah_orang);

        // Panggil fungsi initiate_payment
        $this->initiate_payment($total_harga, 'destinasi', $id_pemesanan, $id_user);
    }

    public function pesan_event()
    {
        $tanggal_pemesanan = $this->input->post('tanggal_pemesanan');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $id_event = $this->input->post('id_event');
        $id_user = $this->session->userdata('id_user');

        if (!$this->is_event($id_event)) {
            show_error('Event tidak valid');
        }

        $event = $this->M_event->getDetail($id_event);
        $stok_tiket = $this->M_event->getStokTiket($id_event);

        if ($jumlah_orang > $stok_tiket['stok_tiket']) {
            $this->session->set_flashdata('error', 'Jumlah tiket yang diminta melebihi stok yang tersedia');
            redirect('user/pemesanan/index/' . $id_event);
            return;
        }

        $harga_event = $event['biaya_event'];
        $total_harga = $jumlah_orang * $harga_event;

        $data_pemesanan = array(
            'tanggal_pemesanan' => $tanggal_pemesanan,
            'jumlah_orang' => $jumlah_orang,
            'id_event' => $id_event,
            'total_harga' => $total_harga,
            'id_user' => $id_user,
            'status' => 1

        );

        $id_pemesanan_event = $this->m_pesanan->simpan_pesanan_event($data_pemesanan);
        $this->session->set_userdata('id_pemesanan_event', $id_pemesanan_event);
        $this->session->unset_userdata('id_pemesanan_akomodasi');
        $this->session->unset_userdata('id_pemesanan_destinasi');
        $this->M_event->kurangiStokTiket($id_event, $jumlah_orang);

        // Panggil fungsi initiate_payment
        // redirect('user/pemesanan/step2');
        $this->initiate_payment($total_harga, 'event', $id_pemesanan_event, $id_user);
    }

    public function invoice($id_pesanan, $jenis_pesanan)
    {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->m_userinfo->getDetail($id_user);
        $data['jenis_pesanan'] = $jenis_pesanan; // Tambahkan ini

        switch ($jenis_pesanan) {
            case 'destinasi':
                $data['pemesanan'] = $this->m_pesanan->get_pesanan_destinasi($id_pesanan);
                $data['destinasi'] = $this->M_tempatWisata->getDetail($data['pemesanan']['id_tempat_wisata']);
                break;
            case 'akomodasi':
                $data['pemesanan'] = $this->m_pesanan->get_pesanan_akomodasi($id_pesanan);
                $data['akomodasi'] = $this->M_akomodasi->getDetail($data['pemesanan']['id_akomodasi']);
                break;
            case 'event':
                $data['pemesanan'] = $this->m_pesanan->get_pesanan_event($id_pesanan);
                $data['event'] = $this->M_event->getDetail($data['pemesanan']['id_event']);
                break;
            default:
                show_error('Jenis pesanan tidak valid.');
                break;
        }

        $this->load->view('user/pemesanan/invoice', $data);
    }

    private function initiate_payment($total_harga, $jenis_pesanan, $id_pesanan, $id_user)
    {
        // Ambil informasi pelanggan dari basis data
        $user_info = $this->m_userinfo->getDetail($id_user);

        // Gunakan informasi pelanggan untuk inisiasi pembayaran
        $duitkuConfig = new \Duitku\Config("4e2dec7009d4a7cfd6c702ffc8b9d6ee", "DS19493");
        $duitkuConfig->setSandboxMode(true);

        $paymentAmount      = $total_harga;
        $email              = $user_info['email'];
        $phoneNumber        = $user_info['tlp_user'];
        $productDetails     = "Payment for " . $jenis_pesanan;
        $merchantOrderId    = time(); // from merchant, unique   
        $additionalParam    = '';
        $merchantUserInfo   = '';
        $customerVaName     = $user_info['nama']; // Use user's name from database
        $callbackUrl        = 'https://fb38-36-88-105-20.ngrok-free.app/jendela_wisata/user/pemesanan/callback'; // url for callback
        $returnUrl          = 'https://ac4c-180-254-225-83.ngrok-free.app/jendela_wisata/user/Pemesanan/return'; // url for redirect
        $expiryPeriod       = 60;

        // Customer Detail
        $firstName          = $user_info['nama'];
        $lastName           = ''; // Jika tidak ada informasi lebih lanjut

        // Address (optional, jika diperlukan)
        $address = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'address'       => '',
            'city'          => '',
            'postalCode'    => '',
            'phone'         => $phoneNumber,
            'countryCode'   => 'ID'
        );

        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'billingAddress'    => $address,
            'shippingAddress'   => $address
        );

        // Item Details
        $item1 = array(
            'name'      => $productDetails,
            'price'     => $paymentAmount,
            'quantity'  => 1
        );

        $itemDetails = array($item1);

        // Parameter untuk inisiasi pembayaran
        $params = array(
            'paymentAmount'     => $paymentAmount,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // Insert transaksi
            $insertDB = [
                'id_user' => $id_user,
                'amount' => $paymentAmount,
                'status' => 1,

            ];

            // Menyesuaikan ID pemesanan sesuai jenis pesanan
            if ($jenis_pesanan == 'event') {
                $insertDB['id_pemesanan_event'] = $id_pesanan;
            } elseif ($jenis_pesanan == 'destinasi') {
                $insertDB['id_pemesanan_destinasi'] = $id_pesanan;
            }

            $this->db->insert('tbl_transaksi', $insertDB);

            // Panggil fungsi createInvoice dari Duitku
            $responseDuitkuApi = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $data = json_decode($responseDuitkuApi);
            redirect($data->paymentUrl); // Redirect ke halaman pembayaran
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback()
    {
        file_put_contents('callback_log.txt', "Callback received\n", FILE_APPEND);

        $apiKey = '4e2dec7009d4a7cfd6c702ffc8b9d6ee'; // API key anda
        $merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
        $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
        $merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
        $productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        $additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
        $paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
        $resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
        $merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
        $reference = isset($_POST['reference']) ? $_POST['reference'] : null;
        $signature = isset($_POST['signature']) ? $_POST['signature'] : null;
        $publisherOrderId = isset($_POST['publisherOrderId']) ? $_POST['publisherOrderId'] : null;
        $spUserHash = isset($_POST['spUserHash']) ? $_POST['spUserHash'] : null;
        $settlementDate = isset($_POST['settlementDate']) ? $_POST['settlementDate'] : null;
        $issuerCode = isset($_POST['issuerCode']) ? $_POST['issuerCode'] : null;

        file_put_contents('callback_log.txt', print_r($_POST, true), FILE_APPEND);

        if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if ($signature == $calcSignature) {
                file_put_contents('callback_log.txt', "Signature verified\n", FILE_APPEND);

                // Update status transaksi di database berdasarkan merchantOrderId
                $updateStatus = array('status' => $resultCode);
                $this->db->where('id', $merchantOrderId);
                $this->db->update('tbl_transaksi', $updateStatus);

                file_put_contents('callback_log.txt', "Database updated\n", FILE_APPEND);
            } else {
                file_put_contents('callback_log.txt', "* Bad Signature *\r\n", FILE_APPEND);
                throw new Exception('Bad Signature');
            }
        } else {
            file_put_contents('callback_log.txt', "* Bad Parameter *\r\n", FILE_APPEND);
            throw new Exception('Bad Parameter');
        }
    }
}
