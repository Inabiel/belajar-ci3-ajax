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
	
	public function list_barang(){
		$this->load->database();
		$this->load->model('Barang_model');
		$data_barang = $this->Barang_model->get_barang();
		$konten = '<tr>
				   <td>nama</td>
				   <td>Deskripsi</td>
				   <td>Stok</td>
				   <td>aksi</td>
				   </tr>
		';

		foreach ($data_barang->result() as $key=>$value){
			$konten .= '<tr>
						<td>'.$value->nama_barang.'</td>
						<td>'.$value->deskripsi.'</td>		
						<td>'.$value->stok.'</td>
						<td>Read | Hapus | Edit</td>
					</tr>
			';
		}

		$data_json=array(
			'konten'=>$konten
		);

		echo json_encode($data_json);
	}
}
