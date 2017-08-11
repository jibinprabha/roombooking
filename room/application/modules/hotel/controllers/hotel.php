<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hotel extends MX_Controller {

public function __construct()
{
	parent::__construct();
	if (!$this->ion_auth->logged_in()) 
	{
        return redirect('auth/login');
    }
    		
    		$this->load->helper(array('url','language'));
			$this->lang->load('system');
			$this->load->model('hotel_model');

}
	public function index()
	{
		echo $this->ion_auth->get_user_id();
	}
	public function register_hotel()
	{
		$this->data['title']=lang('title');
		
         $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
      
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('vchr_hotel_name', $this->lang->line('create_user_validation_hname_label'), 'required');
        	if ($this->form_validation->run() == true)
        	{
        	$email    = strtolower($this->input->post('vchr_email'));
           	$identity = strtolower($this->input->post('vchr_email'));
            $password = $this->input->post('vchr_password');
            
            $additional_data = array(
                'first_name' => $this->input->post('vchr_hotel_name'),
                'phone'      => $this->input->post('vchr_phone'),
            );
        	}
        	if ($this->form_validation->run() == true && $id=$this->ion_auth->register($identity, $password, $email, $additional_data))
        	{

        		unset($_POST['vchr_password']);
        		unset($_POST['password_confirm']);
        		unset($_POST['submit']);
        		$hotel_data=$this->input->post();
        		$hotel_data['fk_int_user_id']=$id;
        		$hid=$this->hotel_model->save_hotel($hotel_data);
                $this->hotel_model->update_hotel_udata($id,$hid);
        		
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        	}
        	else
        	{
        	
        // if($identity_column!=='vchr_email')
        // {
        //     $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['tbl_hotels'].'.'.$identity_column.']');
        //     $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        // }



			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


			$this->data['vchr_hotel_name'] = array(
                'name'  => 'vchr_hotel_name',
                'id'    => 'vchr_hotel_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_hotel_name'),
            );
          
            
            $this->data['vchr_email'] = array(
                'name'  => 'vchr_email',
                'id'    => 'vchr_email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_email'),
            );
            $this->data['vchr_address_line1'] = array(
                'name'  => 'vchr_address_line1',
                'id'    => 'vchr_address_line1',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_address_line1'),
            );

			$this->data['vchr_address_line2'] = array(
                'name'  => 'vchr_address_line2',
                'id'    => 'vchr_address_line2',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_address_line2'),
            );            
            $this->data['vchr_phone'] = array(
                'name'  => 'vchr_phone',
                'id'    => 'vchr_phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_phone'),
            );
            $this->data['password'] = array(
                'name'  => 'vchr_password',
                'id'    => 'vchr_password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('vchr_password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $this->data['vchr_pincode'] = array(
                'name'  => 'vchr_pincode',
                'id'    => 'vchr_pincode',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('vchr_pincode'),
            );
            $this->data['currency']=$this->hotel_model->get_currency();
        }
		$this->load->template('index',$this->data);
	}
	
}
