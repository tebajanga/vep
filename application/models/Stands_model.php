<?php
	class Stands_model extends MY_Model
	{
		protected $table_name = 'stands';
		protected $primary_key = 'stand_id';
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
