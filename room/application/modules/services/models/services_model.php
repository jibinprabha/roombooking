<?php 

/**
* 
*/
class services_model extends CI_model
{
	
	function __construct()
	{
		# code...
	}

	public function save_service($data='')
	{
		if(!$data=='')
		{
			
			$this->db->insert('tbl_hotel_service',$data);
			return true;
		}
		else
		{
			return false;
		}
	}
}

 ?>