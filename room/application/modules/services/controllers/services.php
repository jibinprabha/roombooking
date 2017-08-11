<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends MX_Controller {

    public function __construct()
    {
    	parent::__construct();
    	if (!$this->ion_auth->logged_in()) 
    	{
            return redirect('auth');
        }
        		
        		$this->load->helper(array('url','language'));
    			$this->lang->load('system');
    			$this->load->model('services_model');

    }
	public function index()
	{
		echo $this->ion_auth->get_user_id();
	}
	public function add_service()
	{
		$this->data['title']=lang('title');
		
        // $tables = $this->config->item('tables','ion_auth');
        // $identity_column = $this->config->item('identity','ion_auth');
      
        // $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('service_name', $this->lang->line('create_servce_validation_sname_label'), 'required');
        	if ($this->form_validation->run() == true)
        	{
        		
        		unset($_POST['submit']);
        		$sdata=$this->input->post();
        		$this->services_model->save_service($sdata);
        		
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        	}
        	else
        	{
        	
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


			$this->data['service_name'] = array(
                'name'  => 'service_name',
                'id'    => 'service_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('service_name'),
            );
            // $this->data['hotel_id'] = array(
            //     'name'  => 'hotel_id',
            //     'id'    => 'hotel_id',
            //     'type'  => 'text',
            //     'value' => '2',
            //     'hidden'=> 'hidden',
            // );
            
            $this->data['contact_name'] = array(
                'name'  => 'contact_name',
                'id'    => 'contact_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('contact_name'),
            );
            $this->data['contact_no'] = array(
                'name'  => 'contact_no',
                'id'    => 'contact_no',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('contact_no'),
            );

			$this->data['rate'] = array(
                'name'  => 'rate',
                'id'    => 'rate',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('rate'),
            );            
            $this->data['delivery_time'] = array(
                'name'  => 'delivery_time',
                'id'    => 'delivery_time',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('delivery_time'),
            );
            
            
        }
		$this->load->template('index',$this->data);
	}
}
