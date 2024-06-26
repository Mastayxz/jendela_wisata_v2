<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tempatWisata extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getData()
    {
        $this->db->select('tempat_wisata.*, GROUP_CONCAT(kategori.nama_kategori) as kategori');
        $this->db->from('tempat_wisata');
        $this->db->join('kategori_wisata', 'tempat_wisata.id_tempat_wisata = kategori_wisata.id_tempat_wisata');
        $this->db->join('kategori', 'kategori_wisata.id_kategori = kategori.id_kategori');
        $this->db->group_by('tempat_wisata.id_tempat_wisata');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTempatWisataByName($nama_tempat_wisata)
    {
        // Mengambil data tempat wisata berdasarkan nama
        $this->db->where('nama_tempat_wisata', $nama_tempat_wisata);
        $query = $this->db->get('tempat_wisata');

        // Mengembalikan hasil query
        return $query->row();
    }

    public function insertData($data)
    {
        $this->db->insert('tempat_wisata', $data);
        return $this->db->insert_id();
    }

    public function insertTempatWisataKategori($tempat_wisata_id, $kategori_id)
    {
        $data = array(
            'id_tempat_wisata' => $tempat_wisata_id,
            'id_kategori' => $kategori_id
        );
        $this->db->insert('kategori_wisata', $data);
    }

    public function getDetail($id_tempat_wisata)
    {
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $result = $this->db->get('tempat_wisata')->result_array();
        return $result[0];
    }


    public function getKategoriByTempatWisataId($id_tempat_wisata)
    {
        $this->db->select('id_kategori');
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $result = $this->db->get('kategori_wisata')->result_array();
        $kategori_ids = array_column($result, 'id_kategori'); // Ambil hanya kolom id_kategori

        return $kategori_ids;
    }

    public function updateTempatWisata($id_tempat_wisata, $data, $kategori_ids)
    {
        // Lakukan update data tempat wisata
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $this->db->update('tempat_wisata', $data);

        // Dapatkan kategori yang sudah ada
        $existing_kategori = $this->getKategoriByTempatWisataId($id_tempat_wisata);

        // Tentukan kategori baru yang harus ditambahkan
        $new_kategori_ids = array_diff($kategori_ids, $existing_kategori);

        // Tentukan kategori yang perlu dihapus
        $kategori_to_remove = array_diff($existing_kategori, $kategori_ids);

        // Hapus kategori yang tidak terpilih
        foreach ($kategori_to_remove as $kategori_id) {
            $this->db->where('id_tempat_wisata', $id_tempat_wisata);
            $this->db->where('id_kategori', $kategori_id);
            $this->db->delete('kategori_wisata');
        }

        // Tambahkan kategori yang baru dipilih
        foreach ($new_kategori_ids as $kategori_id) {
            $kategori_data = array(
                'id_tempat_wisata' => $id_tempat_wisata,
                'id_kategori' => $kategori_id
            );
            $this->db->insert('kategori_wisata', $kategori_data);
        }
    }


    public function deleteData($id_tempat_wisata)
    {
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $this->db->delete('kategori_wisata');

        // Hapus tempat wisata
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $this->db->delete('tempat_wisata');
    }

    public function searchDestinasi($keyword)
    {
        $keyword = trim($keyword);

        $this->db->select('tempat_wisata.*, GROUP_CONCAT(kategori.nama_kategori) as kategori');
        $this->db->from('tempat_wisata');
        $this->db->join('kategori_wisata', 'tempat_wisata.id_tempat_wisata = kategori_wisata.id_tempat_wisata');
        $this->db->join('kategori', 'kategori_wisata.id_kategori = kategori.id_kategori');
        $this->db->group_by('tempat_wisata.id_tempat_wisata');
        $this->db->like('LOWER(nama_tempat_wisata)', strtolower($keyword), false);
        $this->db->or_like('alamat_tempat_wisata', $keyword);


        $query = $this->db->get();
        return $query->result();
    }

    public function filterByCategory($kategori_id, $harga_max, $harga_min, $alamat)
    {
        $this->db->select('tempat_wisata.*, GROUP_CONCAT(kategori.nama_kategori) as kategori');
        $this->db->from('tempat_wisata');
        $this->db->join('kategori_wisata', 'tempat_wisata.id_tempat_wisata = kategori_wisata.id_tempat_wisata');
        $this->db->join('kategori', 'kategori_wisata.id_kategori = kategori.id_kategori');
        $this->db->group_by('tempat_wisata.id_tempat_wisata');
        $this->db->like('tempat_wisata.alamat_tempat_wisata', $alamat);

        // Filter berdasarkan kategori
        if (!empty($kategori_id)) {
            $this->db->where('kategori.id_kategori', $kategori_id);
        }
        // Filter berdasarkan harga
        if (!empty($harga_min)) {
            $this->db->where('tempat_wisata.biaya_tempat_wisata >=', $harga_min);
        }

        if (!empty($harga_max)) {
            $this->db->where('tempat_wisata.biaya_tempat_wisata <=', $harga_max);
        }

        $query = $this->db->get();
        return $query->result();
    }
    // M_tempatWisata.php
    public function kurangiStokTiket($id_tempat_wisata, $jumlah_orang)
    {
        $this->db->set('stok_tiket', 'stok_tiket - ' . (int) $jumlah_orang, FALSE);
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        return $this->db->update('tempat_wisata');
    }

    public function getStokTiket($id_tempat_wisata)
    {
        $this->db->select('stok_tiket');
        $this->db->from('tempat_wisata');
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $query = $this->db->get();
        return $query->row_array();
    }
}

/* End of file M_tempatWisata.php */
