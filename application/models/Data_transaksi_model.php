<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_transaksi_model extends CI_Model
{

    public $table = 'detail_transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {

		return $this->db->query('select * from detail_transaksi, transaksi where transaksi.id='.$id.' and transaksi.id = detail_transaksi.id_transaksi')->row();
 
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('sub_total', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) { 
 
return $this->db->query('select * from detail_transaksi, transaksi where transaksi.id = detail_transaksi.id_transaksi')->result();
 
 
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

} 
