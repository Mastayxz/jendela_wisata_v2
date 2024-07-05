<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_akomodasi extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getData()
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJenisAkomodasi()
    {
        $this->db->select('*');
        $this->db->from('jenis_akomodasi');
        $this->db->order_by('id_jenis_akomodasi', 'asc');
        return $this->db->get()->result();
    }

    public function insertData($insert)
    {
        // Cek apakah nama_akomodasi sudah ada di database
        $existingData = $this->db->get_where(
            'akomodasi',
            [
                'nama_akomodasi' => $insert['nama_akomodasi']
            ]
        );

        if ($existingData->num_rows() > 0) {
            // Jika data sudah ada, return false
            log_message('error', 'Data sudah ada!');
            return false;
        } else {
            // Jika data belum ada, lanjutkan dengan proses insert
            $this->db->insert('akomodasi', $insert);

            // Periksa apakah proses insert berhasil
            return $this->db->affected_rows() > 0;
        }
    }

    public function getDetail($id)
    {
        $this->db->where('id_akomodasi', $id);
        $result = $this->db->get('akomodasi')->result_array();
        return $result[0];
    }

    public function updateData($edit, $id_akomodasi)
    {

        // Jika data belum ada, lanjutkan dengan proses insert
        $this->db->where('id_akomodasi', $id_akomodasi);
        $this->db->update('akomodasi', $edit);


        // $this->db->update('akomodasi', $edit);
    }
    public function deleteData($id_akomodasi)
    {
        $this->db->where('id_akomodasi', $id_akomodasi);
        $this->db->delete('akomodasi');
    }

    public function searchAkomodasi($keyword, $price)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        $keyword = strtolower($keyword);

        $this->db->group_start();
        $this->db->like('LOWER(akomodasi.nama_akomodasi)', $keyword, false);
        $this->db->or_like('LOWER(tempat_wisata.nama_tempat_wisata)', $keyword);
        // Tambahkan kondisi pencarian lainnya sesuai kebutuhan
        $this->db->group_end();
        if ($price) {
            $this->db->where_in('harga_akomodasi <=', $price);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function filterByJenisAkomodasi($id_jenis_akomodasi)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        if (!empty($id_jenis_akomodasi)) {
            $this->db->where('jenis_akomodasi.id_jenis_akomodasi', $id_jenis_akomodasi);  // Fix the typo
        }

        $query = $this->db->get();
        return $query->result();
    }

    // M_akomodasi.php

    public function filterByJenisDanHarga($id_jenis_akomodasi, $harga_min, $harga_max, $alamat)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        $this->db->group_start(); // Group start for OR condition
        $this->db->like('akomodasi.alamat_akomodasi', $alamat);
        $this->db->or_like('tempat_wisata.nama_tempat_wisata', $alamat);
        $this->db->group_end(); // Group end for OR condition

        if (!empty($id_jenis_akomodasi) && $id_jenis_akomodasi != "semua") {
            $this->db->where('jenis_akomodasi.id_jenis_akomodasi', $id_jenis_akomodasi);
        }

        // Filter berdasarkan harga
        if (!empty($harga_min)) {
            $this->db->where('akomodasi.harga_akomodasi >=', $harga_min);
        }

        if (!empty($harga_max)) {
            $this->db->where('akomodasi.harga_akomodasi <=', $harga_max);
        }

        $query = $this->db->get();
        return $query->result();
    }
    public function getAkomodasiByDestination($destination_id)
    {
        // Assuming you have a table named 'akomodasi' in your database
        $this->db->where('id_tempat_wisata', $destination_id);
        $query = $this->db->get('akomodasi');

        return $query->result_array();
    }

    public function get_id_kamar($id,$id_kamar ){
        $this->db->select('*');
        $this->db->from('kamar_akomodasi');
        $this->db->where('id_akomodasi',$id);
        $this->db->where('id_kamar', $id_kamar);
        
        $qeury = $this->db->get();
        return $qeury->row();
        
    }
    /* End of file M_akomodasi.php */
}
