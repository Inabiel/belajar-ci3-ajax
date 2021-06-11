<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Barang extends CI_Controller {

	public function index()
	{
		$konten = $this->load->view('barang/list_barang', null, true);
		$data = array(
			'konten' => $konten,
			'titel' => 'List Data Barang'
		);

		echo json_encode($data);
	}

	// Nabiel Izzullah Pansuri - 19.01.4419
	public function form_create() {
		$data_view = array('titel'=>'Form Data Barang Baru');
		$konten = $this->load->view('barang/form_barang', $data_view, true);
		$data_json = array(
			'konten' => $konten,
			'titel' => 'Form Data Barang Baru',
		);
		echo json_encode($data_json);
	}

	public function form_edit($id_barang) {
		$data_view = array('titel'=>'Form Edit Data Barang', 'id_barang' => $id_barang);
		$konten = $this->load->view('barang/form_barang', $data_view, true);
		$data_json = array(
			'konten' => $konten,
			'titel' => 'Form Edit Data Barang',
			'id_barang' => $id_barang,
		);
		echo json_encode($data_json);
	}
}
