<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('query_model');
	}

	public function index()
	{
		echo 'Not Found 404';
	}

    public function authentication($number){ //เช็คล็อคอิน     
        $this->query_model->system_user($number);
    }


    public function usermail($number){ //เช็คล็อคอิน     
        $this->query_model->virtual_users($number);
    }

	public function department($type){
		if(isset($_SESSION['bbp_token'])){
			if($type == 'view'){
				$this->query_model->system_department(1);
			}
		}
	}

	//start api outside
	public function employee($type){
		if(isset($_SESSION['bbp_token'])){
			if($type == 'personel'){
				$this->query_model->system_employee(1);
			}elseif($type == 'local'){
				$this->query_model->system_employee(2);
			}elseif($type == 'depart'){
				$this->query_model->system_employee(3);
			}else{
				echo json_encode(array('status' => false));
			}
		}else{
			echo json_encode(array('status' => false));
		}
	}


	//end api outside


	//ไม่เกี่ยวกับโปรเจ็ค
	public function insertLoop(){
		for($i=1; $i<=5556; $i++){
			$name = array(
				'Surawut',
				'Ponpituk',
				'Sahawat',
				'Prayut',
				'Tirawat',
				'Dang',
				'Dom',
				'White'
			);

			$last = array(
				'Saijai',
				'Frog',
				'Payao',
				'Saengow',
				'Prapun',
				'SangSom',
				'Jebmaijum',
				'lnwza'
			);

			$depart = array(
				'Sales',
				'Programmer',
				'Acoounting',
				'Manager'
			);
			$rand = rand(0,3);
			$rand2 = rand(0,7);
			$rand3 = rand(0,7);

			$array = array(
				'name' => $name[$rand2].' '.$last[$rand3],
				'department' => $depart[$rand],
				'salary' => rand(23000,200000),
			);
			$this->db->insert('test', $array);
		}
	}

	public function serverside(){
		header('Access-Control-Allow-Origin: *');
		$this->db->select('
			id,
			name,
			department,
			salary
		');
		$this->db->from('test');
		$this->db->order_by('id','asc');
		$this->db->limit(10);
		$query = $this->db->get();

		$array = array();
		foreach($query->result() as $row){
			$array[] = array(
				'id' => $row->id,
				'name' => $row->name,
				'department' => $row->department,
				'salary' => $row->salary
			);
		}
		echo json_encode($array);


	}

	public function serverside2(){
		header('Access-Control-Allow-Origin: *');

		$request=$_REQUEST;
		$_order = $this->input->get('order');

		$col =array(
			0   =>  'id',
			1   =>  'name',
			2   =>  'department',
			3   =>  'salary'
		);  
		
		$this->db->select('
			id,
			name,
			department,
			salary
		');
		$this->db->from('test');
		$query = $this->db->get();

		$totalData= $query->num_rows();

		$totalFilter=$totalData;

		$this->db->start_cache();
		$this->db->select('
			id,
			name,
			department,
			salary
		');
		$this->db->from('test');
		$this->db->like('name',$request['search']['value'],'right');
		$this->db->or_like('department',$request['search']['value'],'right');
		if(intval($request['search']['value'])){
			$this->db->or_where('salary >=',$request['search']['value'],'right');
		}
		
		$query = $this->db->get();

		$totalData= $query->num_rows();
		$totalFilter=$totalData;
		
		if(isset($_order) && $_order!=NULL){
            // จัดรูปแบบการจัดเรียงข้อมูลจากค่าที่ส่งมา
            $_orderColumn = $_order['0']['column'];
            $_orderSort = $_order['0']['dir'];
            $this->db->order_by($col[$_orderColumn+1], $_orderSort);
        }else{ 
            $order = array('id' => 'asc');
            $this->db->order_by(key($order), $order[key($order)]);            
        }
		
		$this->db->limit($request['length'],$request['start']);
		$query = $this->db->get();
		$this->db->flush_cache();



		$data = array();

		foreach($query->result() as $row){
			$data[] = array(
				'id' => $row->id,
				'name' => $row->name,
				'depart' => $row->department,
				'salary' => $row->salary
			);
		}
		


		$json_data =array(
			"draw"              =>  intval($request['draw']),
			"recordsTotal"      =>  intval($totalData),
			"recordsFiltered"   =>  intval($totalFilter),
			"data"              =>  $data
		);

		echo json_encode($json_data);


	}


}
