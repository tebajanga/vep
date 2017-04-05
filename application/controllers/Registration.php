<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	private $data = array();

	public function __construct()
	{
		parent::__Construct();
	}

	public function index()
	{
    redirect(base_url());
	}

  public function stand($id=0)
	{
    $where = array(
      'stand_id' => $id,
      'status' => "Free"
    );

    $stand = $this->stands_model->read(NULL,$where);
    if($stand){
      $this->data['title'] = "User Registration";
			$this->data['stand'] = $stand[0];

      $this->load->view('template/header_view',$this->data);
  		$this->load->view('registration/main_view');
  		$this->load->view('template/footer_view');
    }
    else redirect(base_url());
  }

	public function add_reservation()
	{
		if($_POST & $_FILES){
			$temp_logo_path = $_FILES['logo']['tmp_name'];
			$logo_upload_path = $this->config->item("company_logo_path").$_FILES['logo']['name'];
			move_uploaded_file($temp_logo_path,$logo_upload_path);

			$temp_document_path = $_FILES['document']['tmp_name'];
			$document_upload_path = $this->config->item("company_document_path").$_FILES['document']['name'];
			move_uploaded_file($temp_document_path,$document_upload_path);

			$company_values = array(
				'name' => $_POST['name'],
				'owner' => $_POST['owner'],
				'location' => $_POST['location'],
				'phone_number' => $_POST['phonenumber'],
				'website' => $_POST['website'],
				'logo' => $_FILES['logo']['name'],
				'admin_email' => $_POST['admin_email'],
				'marketing_document' => $_FILES['document']['name']
			);

			$company = $this->companies_model->create($company_values);

			$reservation_values = array(
				'stand_id' => $_POST['stand_id'],
				'company_id' => $company
			);

			$this->reservations_model->create($reservation_values);

			$status = array(
				'status' => "Booked",
				'updated_at' => date("Y-m-d H:i:s")
			);

			$this->stands_model->update($status,$_POST['stand_id']);

			echo "Success";
		}
	}
}
