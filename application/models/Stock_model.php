<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function add_record($data)
	{
		$this->db->insert('stock', $data);
		return $this->db->insert_id();
	}

	// public function get_all_stocks()
    // {
    //     return $this->db->get("stock");
    // }

	public function get_stock()
	{
		$query = 'SELECT stock.stock_qty, products.product_name FROM `products`,`stock` where stock.product_id = products.id';
		$sql = $this->db->query($query);
		return $sql->result_array();

		foreach ($sql->result() as $row)
{
        // echo $row->stock_qty;
        // echo $row->product_name;
		echo $data['stocks'] = $row->stock_qty;
}
	}

	
}
