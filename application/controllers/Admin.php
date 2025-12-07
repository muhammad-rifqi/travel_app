<?php

class Admin extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url','file'));
		$this->load->library('session');
  }

  public function index() {
	  $this->load->view('backend/login');
  }

  public function proses_login() {
	  $this->load->library('session');
	  $email = $this->input->post('email');
	  $password = md5($this->input->post('password'));
	  $this->load->model('Admin_model','proses_login');
	  $data['log'] = $this->proses_login->login($email,$password);
	  $cek = count($data['log']);
	  if($cek > 0) {
		  $newdata = array(
			  'id_user'=> $data['log'][0]['id_user'],
			  'username' => $data['log'][0]['username'],
			  'email' => $data['log'][0]['email'],
			  'status' => $data['log'][0]['status']
		  );
		  $this->session->set_userdata($newdata);
		  redirect(base_url().'admin/dashboard');
	  } else {
		  echo"<h3 align='center'>Ulangi Login</h3>";
	  }

  }

  public function dashboard() {

	  $t['info'] = $this->session->userdata('username');
	  $a['header'] =  $this->load->view('backend/layout/header',null, true);
	  $a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	  $a['content'] =  $this->load->view('backend/dashboard/content',$t, true);
	  $page = $this->load->view('backend/layout_backend',$a);
	  return $page;
  }

  public function slider() {

	$t['info'] = $this->session->userdata('username');
	$this->load->model('Admin_model','slider');
	$t['slide'] = $this->slider->getallslideshows();
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/slider/content',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}


public function add_slider() {

	$t['info'] = $this->session->userdata('username');
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/slider/add',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}


public function edit_slider(){
	$t['info'] = $this->session->userdata('username');
	$id = $this->uri->segment(3);
	$this->load->model('Admin_model','slideshow');
	$t['detail'] = $this->slideshow->select_slideshow($id);
	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/slider/edit',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;

}

public function proses_add_slider(){

	$this->load->model('Admin_model','slideshow');
	$this->slideshow->proses_add_slideshows();
	redirect(base_url('admin/slider'));

}

public function proses_edit_slider(){

	$this->load->model('Admin_model','slideshow');
	$this->slideshow->proses_edit_slideshows();
	redirect(base_url('admin/slider'));

}

public function delete_slider($id){
	$id = $this->uri->segment(3);
	$foto = $this->uri->segment(4);
		if(!empty($foto)){
			unlink(FCPATH."assets/backend/upload/slider/".$foto);
			$this->load->model('Admin_model','slider');
			$this->slider->delete_slideshows($id);
		}else{
			$this->load->model('Admin_model','slider');
			$this->slider->delete_slideshows($id);
		}
	redirect(base_url('admin/slider'));
}


//product


public function products() {

	$t['info'] = $this->session->userdata('username');
	$this->load->model('Admin_model','slider');
	$t['product'] = $this->slider->getallproducts();
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/product/content',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}



public function add_product() {

	$t['info'] = $this->session->userdata('username');
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/product/add',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}



public function proses_add_products(){

	$this->load->model('Admin_model','product');
	$this->product->proses_add_products();
	redirect(base_url('admin/products'));

}



public function edit_product() {

	$t['info'] = $this->session->userdata('username');
	$id = $this->uri->segment(3);
	$this->load->model('Admin_model','products');
	$t['detail'] = $this->products->select_products($id);
	$t['foto'] = $this->products->select_foto($id);
	$t['desc'] = $this->products->get_description($id);
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/product/edit',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}


public function proses_edit_product(){

	$this->load->model('Admin_model','products');
	$this->products->proses_edit_products();
	redirect(base_url('admin/products'));

}

public function delete_products($id){
	$id = $this->uri->segment(3);
	$foto = $this->uri->segment(4);
		if(!empty($foto)){
			unlink(FCPATH."assets/backend/upload/product/".$foto);
			$this->load->model('Admin_model','products');
			$this->products->delete_products($id);
			$this->products->delete_foto($id);
		}else{
			$this->load->model('Admin_model','products');
			$this->products->delete_products($id);
			$this->products->delete_foto($id);
		}
	redirect(base_url('admin/products'));
}

//foto


public function add_foto() {

	$t['info'] = $this->session->userdata('username');
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/foto/add',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}



public function proses_add_foto(){

	$this->load->model('Admin_model','foto');
	$this->foto->proses_add_foto();
	redirect(base_url('admin/products'));

}



public function delete_foto($id){
	$id = $this->uri->segment(3);
	$foto = $this->uri->segment(4);
		if(!empty($foto)){
			unlink(FCPATH."assets/backend/upload/foto/".$foto);
			$this->load->model('Admin_model','foto');
			$this->foto->delete_foto($id);
		}else{
			$this->load->model('Admin_model','foto');
			$this->foto->delete_foto($id);
		}
	redirect(base_url('admin/products'));
}





public function buttom(){
   $t['info'] = $this->session->userdata('username');
   $this->load->model('Admin_model','buttom');
   $t['product'] = $this->buttom->product_buttom();
   $a['header'] =  $this->load->view('backend/layout/header',null, true);
   $a['footer'] =  $this->load->view('backend/layout/footer',null, true);
   $a['content'] =  $this->load->view('backend/display/content',$t, true);
   $page = $this->load->view('backend/layout_backend',$a);
   return $page;
}



public function top(){
	$t['info'] = $this->session->userdata('username');
	$this->load->model('Admin_model','top');
	$t['product'] = $this->top->product_top();
	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/display/top',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
 }


 public function left(){
	$t['info'] = $this->session->userdata('username');
	$this->load->model('Admin_model','left');
	$t['product'] = $this->left->product_left();
	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/display/left',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
 }



 public function add_description() {

	$t['info'] = $this->session->userdata('username');
 	$a['header'] =  $this->load->view('backend/layout/header',null, true);
	$a['footer'] =  $this->load->view('backend/layout/footer',null, true);
	$a['content'] =  $this->load->view('backend/description/add',$t, true);
	$page = $this->load->view('backend/layout_backend',$a);
	return $page;
}


public function proses_add_description(){

	$this->load->model('Admin_model','desc');
	$this->desc->proses_add_desc();
	redirect(base_url('admin/products'));

}


public function delete_description(){
	$id = $this->uri->segment(3);
	$this->load->model('Admin_model','desc');
	$this->desc->delete_description($id);
	redirect(base_url('admin/products'));
}


//logout
public function logout ()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
 


}
