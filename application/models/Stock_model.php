<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function add_record($data)
	{
		$this->db->insert('stock', $data);
		return $this->db->insert_id();
	}
}