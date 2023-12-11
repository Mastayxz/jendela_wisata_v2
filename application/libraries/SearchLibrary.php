<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchLibrary
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('M_akomodasi');
        $this->CI->load->model('M_tempatWisata');
    }

    public function search($keyword)
    {
        $result['akomodasi'] = $this->CI->M_akomodasi->searchAkomodasi($keyword);
        $result['tempat_wisata'] = $this->CI->M_tempatWisata->searchDestinasi($keyword);

        return $result;
    }
}
