<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends MX_Controller {

public function __construct()
{
	parent::__construct();
	if (!$this->ion_auth->logged_in()) 
	{
        return redirect('auth');
    }
}
	public function index()
	{
		echo $this->ion_auth->get_user_id();
	}
}
