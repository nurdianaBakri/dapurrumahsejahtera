<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        $this->load->model('Data_transaksi_model');

    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/';
            $config['first_url'] = base_url() . 'transaksi/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'content' => 'transaksi/transaksi_list',
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sb-admin', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tgl_order' => $row->tgl_order,
		'id' => $row->id,
		'status_pelunasan' => $row->status_pelunasan,
		'tgl_pembayaran' => $row->tgl_pembayaran,
	    );
            $data['content'] = 'transaksi/transaksi_read';

            $this->load->view('sb-admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'content' => 'transaksi/transaksi_form', 
            'action' => site_url('transaksi/create_action'),
			'tgl_order' => set_value('tgl_order'),
			'id' => set_value('id'),
			'status_pelunasan' => set_value('status_pelunasan'),
			'tgl_pembayaran' => set_value('tgl_pembayaran'),
			'harga' => set_value('harga'),
			'jumlah' => set_value('jumlah'),
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
				'id' => '',
				'tgl_order' => $this->input->post('tgl_order',TRUE),
				'status_pelunasan' => $this->input->post('status_pelunasan',TRUE),
				'tgl_pembayaran' => $this->input->post('tgl_pembayaran',TRUE),
			);

            $insert_id= $this->Transaksi_model->insert($data);   

			//masukkan data detail
			$data = array( 
				'id_transaksi' => $insert_id,
				'harga' => $this->input->post('harga',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'sub_total' => $this->input->post('harga',TRUE)*$this->input->post('jumlah',TRUE),
			);

			$this->Data_transaksi_model->insert($data);
				
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'content' => 'transaksi/transaksi_form',  
                'action' => site_url('transaksi/update_action'),
		'tgl_order' => set_value('tgl_order', $row->tgl_order),
		'id' => set_value('id', $row->id),
		'status_pelunasan' => set_value('status_pelunasan', $row->status_pelunasan),
		'tgl_pembayaran' => set_value('tgl_pembayaran', $row->tgl_pembayaran),
	    );
            $this->load->view('sb-admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'tgl_order' => $this->input->post('tgl_order',TRUE),
			'status_pelunasan' => $this->input->post('status_pelunasan',TRUE),
			'tgl_pembayaran' => $this->input->post('tgl_pembayaran',TRUE), 
	    );

            $this->Transaksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_order', 'tgl order', 'trim|required');
	$this->form_validation->set_rules('status_pelunasan', 'status pelunasan', 'trim|required');
	$this->form_validation->set_rules('tgl_pembayaran', 'tgl pembayaran', 'trim');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

} 
