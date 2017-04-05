<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hall_map extends CI_Controller {
	private $data = array();

	public function __construct()
	{
		parent::__Construct();
	}

	public function index()
	{
    redirect(base_url());
	}

  public function view($id=0){
		$event = $this->events_model->read($id);

		if($event)
		{
			$this->data['title'] = "Virtual Exposition Hall Map";
	    $this->data['event_id'] = $id;

	    $this->load->view('template/header_view',$this->data);
			$this->load->view('hall_map/main_view');
			$this->load->view('template/footer_view');
		}
		else redirect(base_url());
  }

  public function json_get_stands($id=0){
    $where = array(
      'event_id' => $id
    );
    $this->data['stands'] = $this->stands_model->read(NULL,$where);
    for($x=0;$x<count($this->data['stands']);$x++){
			$this->data['stands'][$x]->company = NULL;

      if($this->data['stands'][$x]->status == "Free")
			{
				$this->data['stands'][$x]->status_color = "#32936f";
			}
      else if($this->data['stands'][$x]->status == "Booked")
			{
				$this->data['stands'][$x]->status_color = "#fe5f55";
				$where = array(
					'stand_id' => $this->data['stands'][$x]->stand_id
				);
				$reservation = $this->reservations_model->read(NULL,$where);
				if($reservation)
				{
					$company = $this->companies_model->read($reservation[0]->company_id);
					$this->data['stands'][$x]->company = $company[0];
				}
			}
    }
		echo json_encode($this->data['stands']);
  }
}
