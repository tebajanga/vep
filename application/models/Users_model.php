<?php
	class Users_model extends MY_Model
	{
		protected $table_name = 'users';
		protected $primary_key = 'user_id';
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
