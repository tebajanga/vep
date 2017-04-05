<?php
	class Visitors_model extends MY_Model
	{
		protected $table_name = 'visitors';
		protected $primary_key = array("stand_id","user_id");
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
