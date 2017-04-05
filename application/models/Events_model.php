<?php
	class Events_model extends MY_Model
	{
		protected $table_name = 'events';
		protected $primary_key = 'event_id';
		protected $primary_filter = 'intval';
		protected $rules = array();
		protected $timestamps = FALSE;
	}
