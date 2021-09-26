<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	/*
	 1. idex() is called to dislay list of materials
	 2. add_new() creates a new entry into DB
	 3. edit() to update product
	 */

	public function __construct() 
    {
        parent::__construct();     
        $this->load->library('form_validation');
        $this->load->model('Product_model');  
        $this->load->model('Stock_model');  
    }

	public function regexValidate($str)
	{
	    if (!preg_match('/^[a-zA-Z0-9\s\.]+$/', $str) )
	    {
	        $this->form_validation->set_message('regexValidate', 'The %s field must only contain letters and/or number');
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
        {		
        	$data['title'] = ucfirst('Product List Page');
        	$data['username'] = $this->session->userdata('logged_in');
        	$data['products'] = $this->Product_model->get_all_products();

			$this->load->view('layout/header', $data);				
	        $this->load->view('layout/menubar');
			$this->load->view('productList', $data);
			$this->load->view('layout/footer');	
		}
		else
		{
			redirect('Welcome');
		}
	}
	// get from DB
	public function list_a_product($id)
    {    	
		$materials = $this->Product_model->get_product_byID($id);
		echo json_encode($materials);
    }
     	
	//form to add new product
	public function add_new()
	{
		$this->form_validation->set_rules('prod_name', 'Product Name', 'trim|required|callback_regexValidate|is_unique[products.product_name]',  array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('prod_exp', 'Expiry Date', 'trim|required');
		$this->form_validation->set_rules('weight', 'Product Amount', 'trim|required|numeric');
		$this->form_validation->set_rules('price', 'Product Quantity', 'trim|required|numeric');
		
		if( $this->input->post('add_product') != NULL )
		{
			if ($this->form_validation->run() == false)
			{			
				$data['title'] = ucwords('Add new Product Page');
	        	$data['username'] = $this->session->userdata('logged_in');        	
		        $this->load->view('layout/header', $data);	       
		        $this->load->view('layout/menubar');
				$this->load->view('product_add', $data);
				$this->load->view('layout/footer');
			}
			else
			{
				// POST data
     			$postData = $this->input->post();
				$data = array(
					'product_name' => strtoupper($postData['prod_name']),
					'prod_exp' => strtoupper($postData['prod_exp']),					
					'weight' => $postData['weight'],											
					'unit_price' => $postData['price'],				
					'price' => $postData['price_total'],				
				);

				$data2 = array(
					'product_id' => $postData['id'],
					'stock_qty' => $postData['stock_q'],
					'purchase_rate' => $postData['price'],
				);
				$insert = $this->Product_model->add_product($data);
				$Store = $this->Stock_model->add_record($data2);
				if($insert > 0)
				{	
					$this->session->set_flashdata('success', 'Product added successfully.');
					redirect('Product');	
				}
				else
				{
					$this->session->set_flashdata('failed', 'Some problem occurred, please try again.');
					$this->load->view('layout/header', $data);	       
			        $this->load->view('layout/menubar');
					$this->load->view('product_add', $data);
					$this->load->view('layout/footer');
				}
			}
     	}

		elseif($this->session->userdata('logged_in'))
        {		
        	$data['title'] = ucwords('Add new Product Page');
        	$data['username'] = $this->session->userdata('logged_in');        	

	        $this->load->view('layout/header', $data);	       
	        $this->load->view('layout/menubar');
			$this->load->view('product_add', $data);
			$this->load->view('layout/footer');		
		}
		else
		{
			redirect('Welcome');
		}
	}	

	//form to UPDATE PRODUCT
	public function edit($prod_id)
	{
		$cust_data = $this->Product_model->get_product_byID($prod_id);
		if(!$this->session->userdata('logged_in'))
		{
			redirect('Welcome');
		}
		elseif( $prod_id && $this->input->post('edit_product') == NULL )
		{
			$data['title'] = ucwords('Edit Product Details');
        	$data['username'] = $this->session->userdata('logged_in');   
        	$data['prod'] = $cust_data;    	

	        $this->load->view('layout/header', $data);	       
	        $this->load->view('layout/menubar');
			$this->load->view('product_edit');
			$this->load->view('layout/footer');			
		}	


		elseif( $this->input->post('edit_product') != NULL )
		{
			// POST data
     		$postData = $this->input->post();
			
			$this->form_validation->set_rules('prod_name', 'Product Name', 'trim|required|callback_regexValidate|edit_unique[products.product_name.'.$prod_id.']');
			$this->form_validation->set_rules('prod_exp', 'Expiry Date', 'trim|required');
			$this->form_validation->set_rules('weight', 'Product Amount', 'required|numeric');
			$this->form_validation->set_rules('price', 'Product Quantity', 'required|numeric');	
     		
			if ($this->form_validation->run() == false)
			{			
				$data['title'] = ucwords('Edit Product Details');
	        	$data['username'] = $this->session->userdata('logged_in');  
	        	$data['prod'] = $cust_data; 
	        
		        $this->load->view('layout/header', $data);	       
		        $this->load->view('layout/menubar');
				$this->load->view('product_edit');
				$this->load->view('layout/footer');
			}

			else
			{
				$data = array(
					'product_name' => strtoupper($postData['prod_name']),
					'prod_exp' => strtoupper($postData['prod_exp']),						
					'weight' => $postData['weight'],											
					'unit_price' => $postData['price'],				
					'price' => $postData['price_total'],				
				);
				$prod_id = $postData['prod_id'];

				$update = $this->Product_model->update_product($data, $prod_id);
				
				if($update != -1)
				{
					$this->session->set_flashdata('success', 'Product details updated successfully.');
					redirect('Product');	
				}
				else
				{
					$this->session->set_flashdata('failed', 'Some problem occurred, please try again.');
					$data['title'] = ucwords('Edit Product Details');
		        	$data['username'] = $this->session->userdata('logged_in');  
		        	$data['cust'] = $cust_data;
					$this->load->view('layout/header', $data);	       
			        $this->load->view('layout/menubar');
					$this->load->view('product_edit');
					$this->load->view('layout/footer');
				}
			}
     	}

	}

	// Logout from admin page
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		header("location:". site_url('?status=loggedout'));
	}

	public function deleteProduct()
	{
		if($this->input->post('row_id'))
		{			
			$id = $this->input->post('row_id');
			$upd = $this->Product_model->delete_by_id($id);
			if($upd > 0)
			{
				$resp['status'] = 'passed';
				$resp['result'] = 'Product deleted successfully.';
			}
			else
			{
				$resp['status'] = 'failed';
				$resp['result'] = 'Some problem occurred, please try again';
			}
			echo json_encode($resp);						
		}
	}

}
