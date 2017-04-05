<?php
	class Reservations_model extends MY_Model
	{
		protected $table_name = 'reservations';
		protected $primary_key = array("stand_id","company_id");
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
