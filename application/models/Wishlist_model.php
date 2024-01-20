<?php

class Wishlist_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Do your magic here
    }


    public function add_to_wishlist($id_user, $id_akomodasi = null, $id_event = null, $id_tempat_wisata = null)
    {
        // Pastikan item belum ada di wishlist
        $existing_wishlist = $this->db->get_where('wishlist', array('id_user' => $id_user, 'id_event' => $id_event, 'id_akomodasi' => $id_akomodasi, 'id_tempat_wisata' => $id_tempat_wisata))->row();
        if ($existing_wishlist) {
            return false;
        } else if (!$existing_wishlist) {
            // Tambahkan item ke wishlist
            $data = array(
                'id_user' => $id_user,
                'id_event' => $id_event,
                'id_akomodasi' => $id_akomodasi,
                'id_tempat_wisata' => $id_tempat_wisata
            );
            $this->db->insert('wishlist', $data);
            return true;
        }
    }

    // Wishlist_model.php
    // Wishlist_model.php
    public function get_user_wishlist($id_user)
    {
        $this->db->select('wishlist.*, event.gambar_event, event.nama_event, akomodasi.gambar_akomodasi1, akomodasi.nama_akomodasi, tempat_wisata.gambar1, tempat_wisata.nama_tempat_wisata');
        $this->db->from('wishlist');
        $this->db->where('wishlist.id_user', $id_user);
        $this->db->join('event', 'wishlist.id_event = event.id_event', 'left');
        $this->db->join('akomodasi', 'wishlist.id_akomodasi = akomodasi.id_akomodasi', 'left');
        $this->db->join('tempat_wisata', 'wishlist.id_tempat_wisata = tempat_wisata.id_tempat_wisata', 'left');
        return $this->db->get()->result();
    }

    // public function add_to_wishlist($id_user, $id_item = null, $item_type = null)
    // {
    //     // Pastikan item belum ada di wishlist
    //     $existing_wishlist = $this->db->get_where('wish', array('id_user' => $id_user, 'id_item' => $id_item))->row();

    //     if (!$existing_wishlist) {
    //         // Tambahkan item ke wishlist
    //         $data = array(
    //             'id_user' => $id_user,
    //             'id_item' => $id_item,
    //             'item_type' => $item_type
    //         );

    //         $this->db->insert('wish', $data);
    //     }
    // }

    // public function get_user_wishlist($id_user)
    // {
    //     // Ambil daftar wishlist pengguna
    //     $this->db->select('wish.*, event.nama_event, akomodasi.nama_akomodasi, tempat_wisata.nama_tempat_wisata');
    //     $this->db->from('wish');
    //     $this->db->where('id_user', $id_user);
    //     $this->db->join('event', 'wish.item_type = "event" AND wish.id_item = event.id_event', 'left');
    //     $this->db->join('akomodasi', 'wish.item_type = "akomodasi" AND wish.id_item = akomodasi.id_akomodasi', 'left');
    //     $this->db->join('tempat_wisata', 'wish.item_type = "tempat_wisata" AND wish.id_item = tempat_wisata.id_tempat_wisata', 'left');
    //     return $this->db->get()->result();
    // }

    // Wishlist_model.php (model)
    public function delete_wishlist_item($id_wishlist)
    {
        $this->db->where('id_wishlist', $id_wishlist);
        $this->db->delete('wishlist');
        return true;
    }



    // Fungsi lainnya sesuai kebutuhan
}


    // Fungsi lainnya sesuai kebutuhan
