<?php
class M_kamar_akomodasi extends CI_Model
{
    public function getKamarByAkomodasi($id_akomodasi)
    {
        $this->db->where('id_akomodasi', $id_akomodasi);
        return $this->db->get('kamar_akomodasi')->result();
    }
    public function getDetail($id_kamar)
    {
        return $this->db->get_where('kamar_akomodasi', ['id_kamar' => $id_kamar])->result_array();
    }

    public function create($data)
    {
        return $this->db->insert('kamar_akomodasi', $data);
    }

    public function update($id_kamar, $data)
    {
        return $this->db->where('id_kamar', $id_kamar)->update('kamar_akomodasi', $data);
    }

    public function delete($id_kamar)
    {
        return $this->db->where('id_kamar', $id_kamar)->delete('kamar_akomodasi');
    }
    public function get_all_kamar($id)
    {
        $this->db->where('id_akomodasi', $id);
        $query = $this->db->get('kamar_akomodasi')->result_array();
        return $query[0];
    }

    public function getHarga($id_akomodasi)
    {
        $this->db->select('harga');
        $this->db->from('kamar_akomodasi');
        $this->db->where('id_akomodasi', $id_akomodasi);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_harga_kamar($id,$id_kamar){
        $this->db->select('harga');
        $this->db->from('kamar_akomodasi');
        $this->db->where('id_akomodasi', $id);
        $this->db->where('id_kamar', $id_kamar);        
        $query = $this->db->get();
        return $query ->row();
           
    }
    public function getJumlahKamar($id_kamar) {
        $this->db->select('jumlah');
        $this->db->from('kamar_akomodasi');
        $this->db->where('id_kamar', $id_kamar);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function kurangiJumlahKamar($id_kamar, $jumlah)
    {
        $this->db->set('jumlah', 'jumlah - ' . (int)$jumlah, FALSE);
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar_akomodasi');
    }
    public function tambahJumlahKamar($id_kamar, $jumlah)
    {
        $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah, FALSE);
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar_akomodasi');
    }
}