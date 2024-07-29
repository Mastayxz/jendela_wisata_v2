<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function simpan_pesanan_destinasi($data)
    {
        $this->db->insert('pemesanan_destinasi', $data);
        return $this->db->insert_id();
    }

    public function get_detail_pesanan_destinasi($id_tempat_wisata)
    {
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $query = $this->db->get('pemesanan_destinasi');
        return $query->result_array();
    }

    public function simpan_pesanan_akomodasi($data)
    {
        $this->db->insert('pemesanan_akomodasi', $data);
        return $this->db->insert_id();
    }

    public function simpan_pesanan_event($data)
    {
        $this->db->insert('pemesanan_event', $data);
        return $this->db->insert_id();
    }

    public function cancel_pesanan_destinasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_destinasi', ['status' => 2]);
    }

    public function cancel_pesanan_akomodasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_akomodasi', ['status' => 2]);
    }

    public function get_pesanan_destinasi($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_destinasi', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function get_detailpesanan_akomodasi($akomodasi_id)
    {
        $this->db->select('pemesanan_akomodasi.*, user.nama');
        $this->db->from('pemesanan_akomodasi');
        $this->db->join('user', 'pemesanan_akomodasi.id_user = user.id_user');
        $this->db->where('pemesanan_akomodasi.id_akomodasi', $akomodasi_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pesanan_event($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_event', ['id_pemesanan' => $id_pemesanan])->row_array();
    }
    public function get_pesanan_akomodasi($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_akomodasi', ['id_pemesanan' => $id_pemesanan])->row_array();
    }



    public function cancel_pesanan_event($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_event', ['status' => 2]);
    }

    // Fungsi untuk mendapatkan detail pemesanan destinasi berdasarkan ID
    public function getDetailPesananDestinasi($tempat_wisata_id)
    {
        $this->db->select('pemesanan_destinasi.*, user.nama');
        $this->db->from('pemesanan_destinasi');
        $this->db->join('user', 'pemesanan_destinasi.id_user = user.id_user');
        $this->db->where('pemesanan_destinasi.id_tempat_wisata', $tempat_wisata_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailPesananEvent($event_id)
    {
        $this->db->select('pemesanan_event.*, user.nama');
        $this->db->from('pemesanan_event');
        $this->db->join('user', 'pemesanan_event.id_user = user.id_user');
        $this->db->where('pemesanan_event.id_event', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailPesananAkomodasi($akomodasi_id)
    {
        $this->db->select('pemesanan_akomodasi.*, user.nama, kamar_akomodasi.tipe_kamar');
        $this->db->from('pemesanan_akomodasi');
        $this->db->join('user', 'pemesanan_akomodasi.id_user = user.id_user');
        $this->db->join('kamar_akomodasi', 'pemesanan_akomodasi.id_kamar = kamar_akomodasi.id_kamar');
        $this->db->where('pemesanan_akomodasi.id_akomodasi', $akomodasi_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getDetailPesananEvent($id_event)
    // {

    //     $this->db->where('id_event', $id_event);
    //     $query = $this->db->get('pemesanan_event');
    //     return $query->result_array();
    // }


    public function get_metode_pembayaran()
    {
        return $this->db->get('metode_pembayaran')->result_array();
    }

    public function search_pesanan_akomodasi($akomodasi_id, $keyword)
    {
        $this->db->select('pemesanan_akomodasi.*, user.nama');
        $this->db->from('pemesanan_akomodasi');
        $this->db->join('user', 'pemesanan_akomodasi.id_user = user.id_user');
        $this->db->like('user.nama', $keyword);
        $this->db->or_like('user.email', $keyword);
        $this->db->where('pemesanan_akomodasi.akomodasi_id', $akomodasi_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_pesanan_event($event_id, $keyword)
    {
        $this->db->select('pemesanan_event.*, user.nama');
        $this->db->from('pemesanan_event');
        $this->db->join('user', 'pemesanan_event.id_user = user.id_user');
        $this->db->like('user.nama', $keyword);
        $this->db->or_like('user.email', $keyword);
        $this->db->where('pemesanan_event.event_id', $event_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_pesanan_destinasi($tempat_wisata_id, $keyword)
    {
        $this->db->select('pemesanan_destinasi.*, user.nama');
        $this->db->from('pemesanan_destinasi');
        $this->db->join('user', 'pemesanan_destinasi.id_user = user.id_user');
        $this->db->like('user.nama', $keyword);
        $this->db->or_like('user.email', $keyword);
        $this->db->where('pemesanan_destinasi.id_tempat_wisata', $tempat_wisata_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_tiket_destinasi($id_destinasi, $stok_tiket)
    {
        $this->db->set('stok_tiket', 'stok_tiket + ' . (int) $stok_tiket, FALSE);
        $this->db->where('id_tempat_wisata', $id_destinasi);
        $this->db->update('tempat_wisata');
    }

    public function update_tiket_event($id_event, $stok_tiket)
    {
        $this->db->set('stok_tiket', 'stok_tiket + ' . (int) $stok_tiket, FALSE);
        $this->db->where('id_event', $id_event);
        $this->db->update('event');
    }
    public function update_jumlah_kamar($id_kamar, $jumlah)
    {
        $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah, FALSE);
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar_akomodasi');

    }
    public function simpan_pemesanan_akomodasi($data)
    {
        $this->db->insert('pemesanan_akomodasi', $data);
        return $this->db->insert_id(); // Mengembalikan ID pemesanan yang baru dimasukkan
    }


    public function getPemesananEventDetail($id_pemesanan_event)
    {
        $this->db->where('id_pemesanan', $id_pemesanan_event);
        return $this->db->get('pemesanan_event')->row_array();
    }

    public function getPemesananAkomodasiDetail($id_pemesanan_akomodasi)
    {
        $this->db->where('id_pemesanan', $id_pemesanan_akomodasi);
        return $this->db->get('pemesanan_akomodasi')->row_array();
    }

    public function getPemesananDestinasiDetail($id_pemesanan_destinasi)
    {
        $this->db->where('id_pemesanan', $id_pemesanan_destinasi);
        return $this->db->get('pemesanan_destinasi')->row_array();
    }


    public function delete_pesanan_destinasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->delete('pemesanan_destinasi');
    }
    public function delete_pesanan_akomodasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->delete('pemesanan_akomodasi');
    }
    public function delete_pesanan_event($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->delete('pemesanan_event');
    }

    public function getDetailPesananAkomodasiById($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_akomodasi', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function getDetailPesananEventById($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_event', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function getDetailPesananDestinasiById($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_destinasi', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function updateStatusPesananAkomodasi($id_pemesanan, $status)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_akomodasi', ['status' => $status]);
    }

    public function updateStatusPesananEvent($id_pemesanan, $status)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_event', ['status' => $status]);
    }

    public function updateStatusPesananDestinasi($id_pemesanan, $status)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_destinasi', ['status' => $status]);
    }
}
