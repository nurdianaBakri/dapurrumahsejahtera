<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('data_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_transaksi/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_transaksi/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_transaksi/';
            $config['first_url'] = base_url() . 'data_transaksi/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->data_transaksi_model->total_rows($q);
        $data_transaksi = $this->data_transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_transaksi_data' => $data_transaksi,
            'q' => $q,
            'content' => 'data_transaksi/data_transaksi_list',
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sb-admin', $data);
    }

    public function read($id) 
    {
        $row = $this->data_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'id_transaksi' => $row->id_transaksi,
			'harga' => $row->harga,
			'jumlah' => $row->jumlah,
			'sub_total' => $row->sub_total,
			'tgl_order' => $row->tgl_order, 
		'status_pelunasan' => $row->status_pelunasan,
		'tgl_pembayaran' => $row->tgl_pembayaran,
	    );
            $data['content'] = 'data_transaksi/data_transaksi_read';

            $this->load->view('sb-admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'content' => 'data_transaksi/data_transaksi_form', 
            'action' => site_url('data_transaksi/create_action'),
	    'id' => set_value('id'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'harga' => set_value('harga'),
	    'jumlah' => set_value('jumlah'),
	    'sub_total' => set_value('sub_total'),
	);
        $this->load->view('sb-admin', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'sub_total' => $this->input->post('sub_total',TRUE),
	    );

            $this->data_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->data_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'content' => 'data_transaksi/data_transaksi_form',  
                'action' => site_url('data_transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'harga' => set_value('harga', $row->harga),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'sub_total' => set_value('sub_total', $row->sub_total),
	    );
            $this->load->view('sb-admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'sub_total' => $this->input->post('sub_total',TRUE),
	    );

            $this->data_transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->data_transaksi_model->get_by_id($id);

        if ($row) {
            $this->data_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required'); 

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

} 
