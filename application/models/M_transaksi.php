<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_transaksi', $data);
        return $this->db->insert_id();
    }

    public function get_transaksi_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_transaksi');
        return $query->row_array();
    }

    public function getTransaksiDestinasi()
    {
        $this->db->select('tbl_transaksi.*, user.nama');
        $this->db->from('tbl_transaksi');
        $this->db->join('user', 'tbl_transaksi.id_user= user.id_user');
        $this->db->where('tbl_transaksi.id_pemesanan_destinasi IS NOT NULL', null, false);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getTransaksiEvent()
    {
        $this->db->select('tbl_transaksi.*, user.nama');
        $this->db->from('tbl_transaksi');
        $this->db->join('user', 'tbl_transaksi.id_user= user.id_user');
        $this->db->where('tbl_transaksi.id_pemesanan_event IS NOT NULL', null, false);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getTransaksiAkomodasi()
    {
        $this->db->select('tbl_transaksi.*, user.nama');
        $this->db->from('tbl_transaksi');
        $this->db->join('user', 'tbl_transaksi.id_user= user.id_user');
        $this->db->where('tbl_transaksi.id_pemesanan_akomodasi IS NOT NULL', null, false);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_monthly_pemesanan_destinasi($id_destinasi, $year)
    {
        $this->db->select('MONTH(tanggal_pemesanan) as month, COUNT(*) as total');
        $this->db->from('pemesanan_destinasi');
        $this->db->where('id_tempat_wisata', $id_destinasi);
        $this->db->where('YEAR(tanggal_pemesanan)', $year);
        $this->db->group_by('MONTH(tanggal_pemesanan)');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_monthly_pemesanan_akomodasi($id_akomodasi, $year)
    {
        $this->db->select('MONTH(check_in) as month, COUNT(id_pemesanan) as count');
        $this->db->from('pemesanan_akomodasi');
        $this->db->where('id_akomodasi', $id_akomodasi);
        $this->db->where('YEAR(check_in)', $year);
        $this->db->group_by('MONTH(check_in)');
        $this->db->order_by('MONTH(check_in)', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_monthly_pemesanan_event($id_event, $year)
    {
        $this->db->select('MONTH(tanggal_pemesanan) as month, COUNT(*) as total');
        $this->db->from('pemesanan_event');
        $this->db->where('id_event', $id_event);
        $this->db->where('YEAR(tanggal_pemesanan)', $year);
        $this->db->group_by('MONTH(tanggal_pemesanan)');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_years_destinasi()
    {
        $this->db->select('DISTINCT YEAR(tanggal_pemesanan) as year', FALSE);
        $this->db->from('pemesanan_destinasi');
        $this->db->order_by('year', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_years_event()
    {
        $this->db->select('DISTINCT YEAR(tanggal_pemesanan) as year', FALSE);
        $this->db->from('pemesanan_event');
        $this->db->order_by('year', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_years_akomodasi()
    {
        $this->db->select('DISTINCT YEAR(check_in) as year', FALSE);
        $this->db->from('pemesanan_akomodasi');
        $this->db->order_by('year', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file M_transaksi.php */
