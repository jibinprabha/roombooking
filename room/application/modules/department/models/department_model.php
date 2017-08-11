<?php 

/**
* 
*/
class department_model extends CI_model
{
	
	function __construct()
	{
		# code...
	}
	public function get_currency()
	{
		$currency=$this->db->get('tbl_currency')->result_array();
		return $currency;
	}
	public function save_hotel($data='')
	{
		if(!$data=='')
		{
			$data['dt_date_time']=date('y-m-d h:i:s');
			$this->db->insert('tbl_hotels',$data);
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_services()
	{
		$hid="";
		$hid=$this->session->userdata('hotel_id');
		$this->db->where("hotel_id",$hid);
		$data=$this->db->get("tbl_hotel_service")->result_array();
		return $data;
	}
	public function add_department($services,$dep_data)
	{
		$this->db->insert('tbl_department',$dep_data);
		$dp_id=$this->db->insert_id();
		$hid=$this->session->userdata('hotel_id');
		foreach ($services[0] as $key => $value) 
		{
			$array_serv=array('fk_int_service_id'=>$value,'fk_int_dep_id'=>$dp_id,'fk_int_hotel_id'=>$hid);
			$this->db->insert('tbl_department_services',$array_serv);
		
		}
		return true;
		
	}


}

 ?>