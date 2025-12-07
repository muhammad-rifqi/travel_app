<?php

class Admin_model extends CI_Model {


public function __construct()
{
	parent::__construct();
	$this->load->helper(array('form', 'url','file'));
}


public function login($email,$password)
	{
		$sql = $this->db->query("select * from user where email='".$email."' and password='".$password."'");
		$data = $sql->result_array();
		
		return $data;
	}

//Slideshow

public function getallslideshows()
{
	$sql = $this->db->query("select * from slideshow")->result_array();
	return $sql;

}

public function proses_add_slideshows(){

	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/slider/'.$foto);
	if(!empty($foto)) {
		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/slider/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'title'=>$this->input->post('title'),
			'foto'=>$url,
			'description'=>$this->input->post('description'),
			'link'=>$this->input->post('link'),
			'publish'=>$this->input->post('publish')
		);
		$this->db->insert('slideshow',$data);

	}else{

		$data = array(
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'link'=>$this->input->post('link'),
			'publish'=>$this->input->post('publish')
		);
		$this->db->insert('slideshow',$data);

	}

}

public function proses_edit_slideshows(){
	$id = $this->input->post('id');
	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/slider/'.$foto);
	if(!empty($foto)) {
		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/slider/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'title'=>$this->input->post('title'),
			'foto'=>$url,
			'description'=>$this->input->post('description'),
			'link'=>$this->input->post('link'),
			'publish'=>$this->input->post('publish')
		);
		$this->db->where('id',$id);
		$this->db->update('slideshow',$data);
	}else{
		$data = array(
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'link'=>$this->input->post('link'),
			'publish'=>$this->input->post('publish')
		);
		$this->db->where('id',$id);
		$this->db->update('slideshow',$data);
	}
}

public function select_slideshow($id)
{
	$sql = $this->db->query("select * from slideshow where id = '".$id."'");
	$data = $sql->result_array();
	return $data;

}

public function delete_slideshows($id)
{
	$sql = $this->db->query("delete from slideshow where id = '".$id."'");
	return $sql;

}




public function getallproducts()
{
	$sql = $this->db->query("select * from product")->result_array();
	return $sql;

}


public function proses_add_products(){

	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/product/'.$foto);
	if(!empty($foto)) {
		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/product/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'name'=>$this->input->post('name'),
			'foto'=>$url,
			'price'=>$this->input->post('price'),
			'id_categori'=>$this->input->post('id_categori'),
			'created_at' => date('Y-m-d H:i:s'),
			'description' => $this->input->post('description')
		);
		$this->db->insert('product',$data);

	}else{

		$data = array(
			'name'=>$this->input->post('name'),
			'price'=>$this->input->post('price'),
			'id_categori'=>$this->input->post('id_categori'),
			'created_at' => date('Y-m-d H:i:s'),
			'description' => $this->input->post('description')
		);
		$this->db->insert('product',$data);

	}

}



public function proses_edit_products(){
	$id = $this->input->post('id');
	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/product/'.$foto);
	if(!empty($foto)) {
		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/product/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'name'=>$this->input->post('name'),
			'price'=>$this->input->post('price'),
			'id_categori'=>$this->input->post('id_categori'),
			'foto'=>$url,
			'created_at' => date('Y-m-d H:i:s'),
			'description' => $this->input->post('description')
		);
		$this->db->where('id_product',$id);
		$this->db->update('product',$data);
	}else{
		$data = array(
			'name'=>$this->input->post('name'),
			'price'=>$this->input->post('price'),
			'id_categori'=>$this->input->post('id_categori'),
			'created_at' => date('Y-m-d H:i:s'),
			'description' => $this->input->post('description')
		);
		$this->db->where('id_product',$id);
		$this->db->update('product',$data);
	}
}

public function select_products($id)
{
	$sql = $this->db->query("select * from product where id_product = '".$id."'");
	$data = $sql->result_array();
	return $data;

}

public function delete_products($id)
{
	$sql = $this->db->query("delete from product where id_product = '".$id."'");
	return $sql;

}




public function getallfotos()
{
	$sql = $this->db->query("select * from image_product")->result_array();
	return $sql;

}



public function proses_add_foto(){

	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/foto/'.$foto);

		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/foto/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'id_product'=>$this->input->post('id_product'),
			'foto'=>$url
		);
		$this->db->insert('image_product',$data);
}


public function select_foto($id)
{
	$sql = $this->db->query("select * from image_product where id_product = '".$id."'")->result_array();
	return $sql;

}


public function delete_foto($id)
{
	$sql = $this->db->query("delete from image_product where id = '".$id."'");
	return $sql;

}

public function product_buttom(){

	$sql = $this->db->query("select * from product where sale < 2 ")->result_array();
	return $sql;

}



public function product_top(){

	$sql = $this->db->query("select * from product where sale > 2 ")->result_array();
	return $sql;

}


public function product_left(){

	$sql = $this->db->query("select * from product where sale != 0 ")->result_array();
	return $sql;

}



public function proses_add_desc(){

	$foto = str_replace(" ","_",$_FILES['foto']['name']);
	$url = base_url('assets/backend/upload/description/'.$foto);

		$tujuan_file = realpath(APPPATH.'../assets/backend/upload/description/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg|png|bmp|JPG',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => $foto
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$this->upload->data();

		$data = array(
			'id_product'=>$this->input->post('id_product'),
			'foto'=>$url,
			'size'=> $this->input->post('size')
		);
		$this->db->insert('description',$data);
}


public function get_description($id){

	$sql = $this->db->query("select * from description where id_product = '".$id."'")->result_array();
	return $sql;

}


public function delete_description($id)
{
	$sql = $this->db->query("delete from description where id = '".$id."'");
	return $sql;

}


} ?>
