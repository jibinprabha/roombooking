<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class department extends MX_Controller {

public function __construct()
{
	parent::__construct();
	if (!$this->ion_auth->logged_in()) 
	{
        return redirect('auth/login');
    }
    		
    		$this->load->helper(array('url','language'));
			$this->lang->load('system');
			$this->load->model('department_model');

}
	public function index()
	{
		echo $this->ion_auth->get_user_id();
	}
	public function add_new()
	{
		$this->data['title']=lang('title_department');
	    	
      
        
        // validate form input
        $this->form_validation->set_rules('dept_name', $this->lang->line('create_dept_name'), 'required');
        $this->form_validation->set_rules('phone_no', $this->lang->line('phone_required'), 'required');
        $this->form_validation->set_rules('contact_person', $this->lang->line('contact_person_required'), 'required');
        	if ($this->form_validation->run() == true)
        	{
        	unset($_POST['submit']);
            $services[]=$this->input->post('services');
            unset($_POST['services']);
            $dep_data=$this->input->post();
            $this->department_model->add_department($services,$dep_data);
            redirect('department/add_new');
        	}
        	
        	else
        	{

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


			$this->data['dept_name'] = array(
                'name'  => 'dept_name',
                'id'    => 'dept_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('dept_name'),
            );
          
            
            $this->data['phone_no'] = array(
                'name'  => 'phone_no',
                'id'    => 'phone_no',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone_no'),
            );
            $this->data['contact_person'] = array(
                'name'  => 'contact_person',
                'id'    => 'contact_person',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('contact_person'),
            );
            $this->data['services']=$this->department_model->get_services();

        }
		$this->load->template('add_new_department',$this->data);
	}
}
