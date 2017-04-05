<?php
	//CRUD -
	// C=Create (insert into table_name)
	// R=Read   (select * from table_name)
	// U=Update (update table_name set name = new_name where id = $id)
	// D=Delete (delete * )

	class MY_Model extends CI_Model{
		protected $table_name = '';
		protected $primary_key = 'id';
		protected $primary_filter = 'intval';
		protected $order_by = '';
		protected $rules = array();
		protected $timestamps = FALSE;

		function __construct(){
			parent::__construct();
		}


		public function create($data){
			$this->db->set($data);
			$this->db->insert($this->table_name);
			$id = $this->db->insert_id();

			return $id;
		}

		public function read($id = NULL, $where = NULL, $fields = NULL, $single = FALSE, $sort = NULL, $limit = NULL, $offset = NULL, $like = NULL){
			$errors = array();
			$error_found = FALSE;

			if($fields){
				$this->db->select($fields);
			}
			if($id != NULL){
				$filter = $this->primary_filter;
				$id = $filter($id);
				$this->db->where($this->primary_key,$id);
				$method = 'result';
			}
			else if($where){
				$this->db->where($where);
				$method = 'result';
			}

			if($like){
				$this->db->like($like);
				$method = 'result';
			}

			if($single == TRUE){
				$method = 'result';
			}
			else{
				$method = 'result';
			}

			if($sort){
				$this->db->order_by($sort);
			}

			$this->db->order_by($this->order_by);
			return $this->db->get($this->table_name,$limit,$offset)->$method();
		}

		public function update($data, $id = NULL, $where = NULL){
			$this->db->set($data);

			if($id != NULL){
				$filter = $this->primary_filter;
				$id = $filter($id);
				$this->db->where($this->primary_key,$id);
			}
			else if($where){
				$this->db->where($where);
			}

			if($this->db->update($this->table_name)){
				return true;
			}
			else return false;
		}

		public function delete($id = NULL, $where = NULL){
			if($id || $where){
				if($id){
					$filter = $this->primary_filter;
					$id = $filter($id);

					$this->db->where($this->primary_key,$id);
				}
				else if($where){
					$this->db->where($where);
				}

				$this->db->limit(1);
				if($this->db->delete($this->table_name))
					return true;
			}
			else{
				if($this->db->empty_table($this->table_name))
					return true;
			}

			return false;
		}
	}
