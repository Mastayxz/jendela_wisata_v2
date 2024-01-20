 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class m_admin extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
            //Do your magic here
        }
        public function getadmin()
        {
            $result = $this->db->get('admin');
            return $result->result();
        }
        public function insertadmin()
        {
            // Validasi apakah email sudah ada
            $existingEmail = $this->db->get_where('admin', array('email' => $this->input->post('email')))->row();

            if ($existingEmail) {
                // Email sudah ada, kembalikan pesan kesalahan atau lakukan tindakan yang sesuai
                return false;
            }

            // Email belum ada, lakukan operasi insert
            $insert = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_admin' => $this->input->post('nama_admin')
            );

            $result = $this->db->insert('admin', $insert);
            return $result;
        }

        public function editAdmin()
        {
            // Di awal fungsi editAdmin
            $id_admin = $this->input->post('id_admin');
            $password = $this->input->post('password');
            $query = $this->db->get_where('admin', array('id_admin' => $id_admin));
            $row = $query->row_array();
            if (!($row['password'] == $password)) {
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $edit = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'nama_admin' => $this->input->post('nama_admin'),
                'password' => $password
            );



            $this->db->where('id_admin', $this->input->post('id_admin'));
            $result = $this->db->update('admin', $edit);



            return $result;
        }




        public function deleteadmin($id)
        {
            $this->db->where('id_admin', $id);
            $result = $this->db->delete('admin');
            return $result;
        }
        public function detailadmin($id)
        {
            $this->db->where('id_admin', $id);
            $result = $this->db->get('admin')->result_array();
            return $result[0];
        }
        // File: application/models/M_admin.php

        public function searchAdmin($keyword)
        {
            $this->db->like('LOWER(username)', $keyword, false);
            $this->db->or_like('LOWER(nama_admin)', strtolower($keyword), false);
            $this->db->or_like('LOWER(email)', strtolower($keyword), false);

            $query = $this->db->get('admin');
            return $query->result();
        }
    }

/* End of file m_admin.php */
