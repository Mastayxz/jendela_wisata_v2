<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_data')) {
			// Redirect ke halaman login jika tidak login
			redirect('c_authadmin/index');
		}
		$this->load->model('M_wisata');
	}

	public function index()
	{
		$data['admin_name'] = $this->session->userdata('admin_name');
		$data['page_title'] = 'Dashboard';
		$data['wisata'] = $this->M_wisata->getJumlahTempatWisata();
		$data['akomodasi'] = $this->M_wisata->getJumlahAkomodasi();
		$data['event'] = $this->M_wisata->getJumlahEvent();
		$data['member'] = $this->M_wisata->getJumlahMember();


		$this->load->view('admin/dashboard/index', $data);
	}
}
