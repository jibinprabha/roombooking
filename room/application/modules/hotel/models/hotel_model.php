<?php 

/**
* 
*/
class hotel_model extends CI_model
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
			$hid=$this->db->insert_id();
			return $hid;
		}
		else
		{
			return false;
		}
	}
	public function update_hotel_udata($id='',$hid='')
	{
		if($id&&$hid)
		{
			$data = array(
        'fk_int_hotel_id' => $hid
		);

		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
		}
	}
}

 ?>