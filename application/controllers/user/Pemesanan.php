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
        $this->load->model('M_transaksi');
        $this->load->model('M_kamar_akomodasi');
    }

    public function index($id)
    {
        $id_user = $this->session->userdata('id_user');


        if ($this->is_akomodasi($id)) {
            $id_user = $this->session->userdata('id_user');
            $id_kamar = $this->input->post('id_kamar');
            var_dump($id_kamar);
            // if ($id_kamar == null) {
            //     // Tampilkan pesan error atau redirect ke halaman yang sesuai
            //     show_error('ID Kamar tidak valid', 500);
            // }
            // $kamar = $this->M_akomodasi->get_id_kamar($id_kamar);

            // if ($kamar == null) {
            //     // Tampilkan pesan error atau redirect ke halaman yang sesuai
            //     show_error(' Kamar tidak di temukan ', 500);
            // }


            $data['page_title'] = 'Detail Akomodasi';
            $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
            $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
            $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
            $data['kamar'] = $this->M_akomodasi->get_id_kamar($id, $id_kamar);
            $data['user'] = $this->m_userinfo->getDetail($id_user);
            $data['step'] = 1;
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/detail_akomodasi', $data);
            echo "ID Kamar: " . $id_kamar . "<br>";

            // Pastikan koneksi database terhubung
            // Debugging: Output the id_kamar
            echo "ID Kamar: " . $id_kamar . "<br>";

            // Pastikan koneksi database terhubung
            if ($this->db->conn_id) {
                echo "Database connected!<br>";
            } else {
                echo "Failed to connect to database.<br>";
                return;
            }
            $this->db->where('id_kamar', $id_kamar);
            $query = $this->db->get('kamar_akomodasi');

            // Debugging: Output query yang dijalankan
            echo "Query yang dijalankan: " . $this->db->last_query() . "<br>";

            // Debugging: Output jumlah baris yang ditemukan
            echo "Jumlah baris yang ditemukan: " . $query->num_rows() . "<br>";

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return null;
            }
        } else if ($this->is_event($id)) {
            $data['page_title'] = 'Detail Event';
            $data['event'] = $this->M_event->getDetail($id);
            $data['step'] = 1;
            $data['user'] = $this->m_userinfo->getDetail($id_user);
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/detail_event', $data);
            $this->load->view('templates/footer');
        } else {
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
        // var_dump($this->session->all_userdata());
        log_message('debug', 'Session Data (step2): ' . print_r($this->session->all_userdata(), true));

        if (!$id_pemesanan_akomodasi && !$id_pemesanan_destinasi && !$id_pemesanan_event) {
            redirect('user/pemesanan');
        }

        $data['step'] = 2;
        $data['user'] = $this->m_userinfo->getDetail($id_user);

        if ($id_pemesanan_akomodasi) {
            $data['pemesanan'] = $this->m_pesanan->get_pesanan_akomodasi($id_pemesanan_akomodasi);
            $data['akomodasi'] = $this->M_akomodasi->getDetail($data['pemesanan']['id_akomodasi']);
            $data['checkin'] = $data['pemesanan']['check_in'];
            $data['checkout'] = $data['pemesanan']['check_out'];
            $data['jumlah_kamar'] = $data['pemesanan']['jumlah_kamar'];
            $data['total_harga'] = $data['pemesanan']['total_harga'];
            $data['jenis_pesanan'] = 'akomodasi';
            $data['id_pesanan'] = $id_pemesanan_akomodasi;
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

    public function proses_pembayaran($jenis_pesanan, $id_pesanan)
    {
        $id_user = $this->session->userdata('id_user');

        if ($jenis_pesanan == 'event') {
            $pemesanan = $this->m_pesanan->getPemesananEventDetail($id_pesanan);
        } elseif ($jenis_pesanan == 'akomodasi') {
            $pemesanan = $this->m_pesanan->getPemesananAkomodasiDetail($id_pesanan);
        } elseif ($jenis_pesanan == 'destinasi') {
            $pemesanan = $this->m_pesanan->getPemesananDestinasiDetail($id_pesanan);
        } else {
            show_error('Jenis pemesanan tidak valid');
        }

        if (!$pemesanan) {
            show_error('Detail pemesanan tidak ditemukan');
        }

        $total_harga = $pemesanan['total_harga'];

        // Panggil fungsi initiate_payment
        $this->initiate_payment($total_harga, $jenis_pesanan, $id_pesanan, $id_user);
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

        log_message('debug', 'Jenis Pesanan: ' . $jenis_pesanan . ', ID Pesanan: ' . $id_pesanan); // Debugging jenis dan ID pesanan

        // Simpan detail pemesanan dalam session sebelum dihapus
        switch ($jenis_pesanan) {
            case 'destinasi':
                $detail_pemesanan = $this->m_pesanan->getPemesananDestinasiDetail($id_pesanan);
                if (!$detail_pemesanan) {
                    log_message('error', 'Pemesanan destinasi tidak ditemukan. ID: ' . $id_pesanan); // Log error jika tidak ditemukan
                    $this->session->set_flashdata('error', 'Pemesanan destinasi tidak ditemukan.');
                    redirect('user/pemesanan');
                    return;
                }
                log_message('debug', 'Detail Pemesanan Destinasi: ' . print_r($detail_pemesanan, true)); // Debugging detail pemesanan
                $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
                $this->m_pesanan->cancel_pesanan_destinasi($id_pesanan);

                // Kembalikan jumlah tiket
                if (isset($detail_pemesanan['id_tempat_wisata']) && isset($detail_pemesanan['jumlah_orang'])) {
                    $this->m_pesanan->update_tiket_destinasi($detail_pemesanan['id_tempat_wisata'], $detail_pemesanan['jumlah_orang']);
                }

                // Redirect kembali ke halaman detail destinasi
                redirect('user/tempat_wisata/detail/' . $detail_pemesanan['id_tempat_wisata']);
                break;
                case 'akomodasi':
                    $detail_pemesanan = $this->m_pesanan->getPemesananAkomodasiDetail($id_pesanan);
                    if (!$detail_pemesanan) {
                        log_message('error', 'Pemesanan akomodasi tidak ditemukan. ID: ' . $id_pesanan);
                        $this->session->set_flashdata('error', 'Pemesanan akomodasi tidak ditemukan.');
                        redirect('user/pemesanan');
                        return;
                    }
                    log_message('debug', 'Detail Pemesanan Akomodasi: ' . print_r($detail_pemesanan, true));
                    $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
            
                    // Debug ID kamar sebelum update
                    log_message('debug', 'ID Kamar sebelum update: ' . $detail_pemesanan['id_akomodasi']);
                    log_message('debug', 'Jumlah Kamar yang akan ditambahkan: ' . $detail_pemesanan['jumlah_kamar']);
            
                    $this->m_pesanan->cancel_pesanan_akomodasi($id_pesanan);
            
                    // Kembalikan jumlah kamar
                    if (isset($detail_pemesanan['id_kamar']) && isset($detail_pemesanan['jumlah_kamar'])) {
                        $this->m_pesanan->update_jumlah_kamar($detail_pemesanan['id_kamar'], $detail_pemesanan['jumlah_kamar']);
                    }
            
                    // Redirect kembali ke halaman utama pemesanan akomodasi
                    redirect('user/akomodasi/detail/' . $detail_pemesanan['id_akomodasi']);
                    break;
            case 'event':
                $detail_pemesanan = $this->m_pesanan->getPemesananEventDetail($id_pesanan);
                if (!$detail_pemesanan) {
                    log_message('error', 'Pemesanan destinasi tidak ditemukan. ID: ' . $id_pesanan); // Log error jika tidak ditemukan
                    $this->session->set_flashdata('error', 'Pemesanan destinasi tidak ditemukan.');
                    redirect('user/pemesanan');
                    return;
                }
                log_message('debug', 'Detail Pemesanan Destinasi: ' . print_r($detail_pemesanan, true)); // Debugging detail pemesanan
                $this->session->set_userdata('detail_pemesanan', $detail_pemesanan);
                $this->m_pesanan->cancel_pesanan_event($id_pesanan);

                // Kembalikan jumlah tiket
                if (isset($detail_pemesanan['id_event']) && isset($detail_pemesanan['jumlah_orang'])) {
                    $this->m_pesanan->update_tiket_event($detail_pemesanan['id_event'], $detail_pemesanan['jumlah_orang']);
                }

                // Redirect kembali ke halaman detail event
                redirect('user/event/detail/' . $detail_pemesanan['id_event']);
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
        // Mengambil inputan dari view
        $id_user = $this->session->userdata('id_user');
        $jumlah_kamar = $this->input->post('jumlah_kamar');
        $check_in = $this->input->post('checkin');
        $check_out = $this->input->post('checkout');
        $id_kamar = $this->input->post('id_kamar');
        $id_akomodasi = $this->input->post('id_akomodasi');
        $total_harga = $this->input->post('total-harga');
        // Mengambil data kamar berdasarkan id kamar dari database



        if ($id_kamar) {
            // Menyimpan data pemesanan ke database
            $data = array(
                'jumlah_kamar' => $jumlah_kamar,
                'total_harga' => $total_harga,
                'id_kamar' => $id_kamar,
                'check_in' => $check_in,
                'check_out' => $check_out,
                'id_akomodasi' => $id_akomodasi,
                'id_user' => $id_user,
                'status' => 1, // Status awal pemesanan
            );
            var_dump($data);
            $id_pemesanan_akomodasi = $this->m_pesanan->simpan_pesanan_akomodasi($data); // Menggunakan model untuk menyimpan data
            $this->session->set_userdata('id_pemesanan_akomodasi', $id_pemesanan_akomodasi);
            $this->session->unset_userdata('id_pemesanan_event');
            $this->session->unset_userdata('id_pemesanan_destinasi');
            $this->M_kamar_akomodasi->kurangiJumlahKamar($id_kamar, $jumlah_kamar);
            // Mengarah ke pembayaran   
            redirect('user/pemesanan/step2');
            // $this->initiate_payment($total_harga, 'akomodasi', $id_pemesanan_akomodasi, $id_user);
        } else {
            var_dump($id_kamar);
            // Jika kamar tidak ditemukan
            echo 'gk dapat kamar id jancok';
        }
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
            'status' => 0
        );

        $id_pemesanan = $this->m_pesanan->simpan_pesanan_destinasi($data_pemesanan);
        $this->session->set_userdata('id_pemesanan_destinasi', $id_pemesanan);
        $this->M_tempatWisata->kurangiStokTiket($id_destinasi, $jumlah_orang);
        redirect('user/pemesanan/step2');
        // Panggil fungsi initiate_payment
        // $this->initiate_payment($total_harga, 'destinasi', $id_pemesanan, $id_user);
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
            'status' => 0

        );

        $id_pemesanan_event = $this->m_pesanan->simpan_pesanan_event($data_pemesanan);
        $this->session->set_userdata('id_pemesanan_event', $id_pemesanan_event);
        $this->session->unset_userdata('id_pemesanan_akomodasi');
        $this->session->unset_userdata('id_pemesanan_destinasi');
        $this->M_event->kurangiStokTiket($id_event, $jumlah_orang);

        // Panggil fungsi initiate_payment
        redirect('user/pemesanan/step2');
        // $this->initiate_payment($total_harga, 'event', $id_pemesanan_event, $id_user);
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
        $callbackUrl        = 'https://trusted-pet-lionfish.ngrok-free.app/jendelawisata/user/pemesanan/callback'; // url for callback
        $returnUrl          = 'https://trusted-pet-lionfish.ngrok-free.app/jendelawisata/user/pemesanan/return'; // url for redirect
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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Menyesuaikan ID pemesanan sesuai jenis pesanan
            if ($jenis_pesanan == 'event') {
                $insertDB['id_pemesanan_event'] = $id_pesanan;
            } else if ($jenis_pesanan == 'destinasi') {
                $insertDB['id_pemesanan_destinasi'] = $id_pesanan;
            } else if ($jenis_pesanan == 'akomodasi') {
                $insertDB['id_pemesanan_akomodasi'] = $id_pesanan;
            }

            // Simpan transaksi dan dapatkan ID transaksi
            $id_transaksi = $this->M_transaksi->simpan_transaksi($insertDB);

            // Panggil fungsi createInvoice dari Duitku
            $responseDuitkuApi = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $data = json_decode($responseDuitkuApi);

            // Redirect ke halaman pembayaran
            redirect($data->paymentUrl);
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

        if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if ($signature == $calcSignature) {
                $status = ($resultCode == '00') ? 2 : 3; // 2: Sukses, 3: Gagal
                $updateStatus = [
                    'status' => $status,
                    'payment_time' => date('Y-m-d H:i:s'),
                    'payment_reference' => $reference
                ];
                $this->db->where('id', $merchantOrderId); // Pastikan ini ID dari tabel transaksi
                $this->db->update('tbl_transaksi', $updateStatus);

                $data = $this->input->post();
                file_put_contents('callback_log.txt', print_r($data, true), FILE_APPEND | LOCK_EX);

                if ($status == 2) {
                    // Redirect ke halaman bukti pembayaran jika sukses
                    redirect('user/pemesanan/bukti/' . $merchantOrderId);
                } else {
                    // Redirect ke halaman error jika gagal
                    redirect('user/pemesanan/error');
                }
            } else {
                file_put_contents('callback_log.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
                throw new Exception('Bad Signature');
            }
        } else {
            file_put_contents('callback_log.txt', "* Bad Parameter *\r\n\r\n", FILE_APPEND | LOCK_EX);
            throw new Exception('Bad Parameter');
        }
    }

    public function bukti($id_transaksi)
    {
        // $this->load->model('m_transaksi');
        $transaksi = $this->M_transaksi->get_transaksi_by_id($id_transaksi);

        if (!$transaksi) {
            show_error('Transaksi tidak ditemukan');
        }

        $data['transaksi'] = $transaksi;

        $this->load->view('user/bukti', $data);
    }
}
