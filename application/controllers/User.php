<?php

class User extends CI_Controller {


	public function __construct() {
		date_default_timezone_set("Asia/Jakarta");
  		parent::__construct();
  		$this->load->helper(array('form', 'url','file'));
		$this->load->library('session');

	}

	public function index() {

		$this->load->model('User_model','slider');
		$t['slide'] = $this->slider->getallslideshows();
		$t['product'] = $this->slider->getallproducts();
		$a['header'] =  $this->load->view('frontend/layout/header',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer',null, true);
		$a['content'] =  $this->load->view('frontend/home/content',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}

	public function detail_product() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','detail');
		$t['detail'] = $this->detail->select_product($id);
		$t['img_product'] = $this->detail->image_product($id);
		$t['product'] = $this->detail->getallproducts();
		$t['desc'] = $this->detail->get_description($id);
		$a['header'] =  $this->load->view('frontend/layout/header_detail',$t, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_detail',null, true);
		$a['content'] =  $this->load->view('frontend/detail/content',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}


	public function product() {

		$this->load->model('User_model','product');
		$this->load->library('pagination');
		$config['base_url'] = base_url('user/product');
		$config['total_rows'] = $this->product->gettotalproducts();
		$config['per_page'] = 10;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<ul id="pagination">';
		$config['full_tag_close']   = '</ul> ';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active">';
		$config['cur_tag_close']    = '</li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '&raquo;</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = 'Next</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['product'] = $this->product->getallproduct($d['page'],$config["per_page"])->result_array();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/content',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}


	public function category_product() {

		$id = $this->uri->segment(3);
		$this->load->model('User_model','product');
		$this->load->library('pagination');
		$config['base_url'] = base_url('user/category_product/'.$id.'/');
		$config['total_rows'] = $this->product->gettotalcategory($id);
		$config['per_page'] = 10;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<ul id="pagination">';
		$config['full_tag_close']   = '</ul> ';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active">';
		$config['cur_tag_close']    = '</li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '&raquo;</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = 'Next</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$t['product'] = $this->product->product_category($id, $d['page'],$config["per_page"])->result_array();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/product_category',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}

	public function productsale() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->getallproductsale();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/sale',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}




	
	public function howto() {
		$a['header'] =  $this->load->view('frontend/layout/header',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer',null, true);
		$a['content'] =  $this->load->view('frontend/howto/content',null, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
	}

	public function return() {
		$a['header'] =  $this->load->view('frontend/layout/header',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer',null, true);
		$a['content'] =  $this->load->view('frontend/return/content',null, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
	}

	public function shipping() {
		$a['header'] =  $this->load->view('frontend/layout/header',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer',null, true);
		$a['content'] =  $this->load->view('frontend/shipping/content',null, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
	}




	
	public function sale_top() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->sale_top();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/sale_top',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}



	public function sale_bottom() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->sale_buttom();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/sale_bottom',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}



	public function sale_accessories() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->sale_left();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/sale_accessories',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}


	public function product_top() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','product');
		$t['product'] = $this->product->product_top($id);
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/product_top',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}


	public function product_bottom() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','product');
		$t['product'] = $this->product->product_buttom($id);
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/product_bottom',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}

	public function product_accessories() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','product');
		$t['product'] = $this->product->product_left($id);
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/product/product_accessories',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}


	public function contact() {
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/contact/contact',null, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}




	public function sort_date() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->sort_date();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/combo/sort_date',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}



	public function popular() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->popular();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/combo/popular',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}



	public function low_high() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->low_high();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/combo/low_high',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}



	public function high_low() {
		$this->load->model('User_model','product');
		$t['product'] = $this->product->high_low();
		$a['header'] =  $this->load->view('frontend/layout/header_product',null, true);
		$a['footer'] =  $this->load->view('frontend/layout/footer_product',null, true);
		$a['content'] =  $this->load->view('frontend/combo/high_low',$t, true);
		$page = $this->load->view('frontend/layout_frontend',$a);
		return $page;
		
	}

}
