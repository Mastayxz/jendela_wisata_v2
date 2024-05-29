<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_AuthAdminAko extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_loginadminako');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin_ako', ['email' => $email])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email' => $admin['email'],
                    'username' => $admin['username'],
                    'nama_ako' => $admin['nama_ako'],
                    'jenis_admin' => $admin['jenis_admin'],
                    'akomodasi' => $admin['akomodasi'],
                    'event' => $admin['event'],
                    'tempat_wisata' => $admin['tempat_wisata'],
                ];
                $this->session->set_userdata('admin_data', $data);
                $this->session->set_userdata('admin_name', $admin['nama_ako']);
                redirect('admin_ako/dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                redirect('c_authadminako/index');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email atau password tidak valid</div>');
            redirect('c_authadminako/index');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('jenis_admin', 'Jenis Admin', 'trim|required');
        $this->form_validation->set_rules('nama_ako', 'Nama Admin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin_ako.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registrasi Admin';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_registeradminako');
            $this->load->view('templates/footer');
        } else {
            $jenis_admin = $this->input->post('jenis_admin');

            if ($jenis_admin == 'akomodasi') {
                $akomodasi_data = [
                    // Sesuaikan kolom-kolom di bawah sesuai dengan kolom yang ada di tabel 'akomodasi'
                    'nama_akomodasi' => htmlspecialchars($this->input->post('nama_akomodasi')),
                    'harga_akomodasi' => htmlspecialchars($this->input->post('harga_akomodasi')),
                    'alamat_akomodasi' => htmlspecialchars($this->input->post('alamat_akomodasi')),
                    'deskripsi_akomodasi' => htmlspecialchars($this->input->post('deskripsi_akomodasi')),
                    // dll.
                ];
                $this->db->insert('akomodasi', $akomodasi_data);
                $akomodasi_id = $this->db->insert_id();
            } elseif ($jenis_admin == 'event') {
                $event_data = [
                    // Sesuaikan kolom-kolom di bawah sesuai dengan kolom yang ada di tabel 'event'
                    'nama_event' => $this->input->post('nama_event'),
                    'biaya_event' => $this->input->post('biaya_event'),
                    'tanggal_event' => $this->input->post('tanggal_event'),
                    // dll.
                ];
                $this->db->insert('event', $event_data);
                $event_id = $this->db->insert_id();
            } elseif ($jenis_admin == 'destinasi') {
                $destinasi_data = [
                    // Sesuaikan kolom-kolom di bawah sesuai dengan kolom yang ada di tabel 'tempat_wisata'
                    'nama_tempat_wisata' => $this->input->post('nama'),
                    'biaya_tempat_wisata' => $this->input->post('biaya'),
                    'alamat_tempat_wisata' => $this->input->post('alamat'),
                    // dll.
                ];
                $this->db->insert('tempat_wisata', $destinasi_data);
                $destinasi_id = $this->db->insert_id();
            }

            $admin_data = [
                'nama_ako' => $this->input->post('nama_ako'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jenis_admin' => $jenis_admin,
                'akomodasi' => $jenis_admin == 'akomodasi' ? $akomodasi_id : null,
                'event' => $jenis_admin == 'event' ? $event_id : null,
                'tempat_wisata' => $jenis_admin == 'destinasi' ? $destinasi_id : null,
            ];
            echo "Data yang dimasukkan: ";
            var_dump($admin_data);

            $this->db->insert('admin_ako', $admin_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Registrasi berhasil!</div>');
            redirect('c_authadminako/index');
        }
    }


    public function logout()
    {
        if ($this->input->is_ajax_request()) {
            $this->session->sess_destroy();
            echo json_encode(['status' => 'success']);
            exit;
        }

        $this->load->view('logout_confirmation');
    }
}

/* End of file C_AuthAdminAko.php */
