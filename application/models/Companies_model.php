<?php
	class Companies_model extends MY_Model
	{
		protected $table_name = 'companies';
		protected $primary_key = 'company_id';
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
