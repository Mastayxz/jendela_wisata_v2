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
        return $this->db->get_where('kamar_akomodasi', ['id_kamar' => $id_kamar])->row();
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
}
