<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $data = array();

	public function __construct()
	{
		parent::__Construct();
	}

	public function index()
	{
		$this->data['title'] = "Virtual Exposition Application";
		$this->load->view('template/header_view',$this->data);
		$this->load->view('home/main_view');
		$this->load->view('template/footer_view');
	}

	public function json_get_events()
	{
		$this->data['events'] = $this->events_model->read();
		if($this->data['events'])
		{
			for($x=0;$x<count($this->data['events']);$x++)
			{
				$this->data['events'][$x]->start_date = $this->format_date($this->data['events'][$x]->start_date);
				$this->data['events'][$x]->end_date = $this->format_date($this->data['events'][$x]->end_date);
			}
		}
		echo json_encode($this->data['events']);
	}

	public function format_date($date)
	{
		return date('d F Y, H:i',strtotime($date));
	}
}
