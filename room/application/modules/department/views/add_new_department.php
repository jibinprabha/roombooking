<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('department/add_new');?>
<table>
	<tr><td><?= lang('department_name'); ?></td><td><?= form_input($dept_name); ?></td></tr>
	<tr><td><?= lang('phone'); ?></td><td><?= form_input($phone_no); ?></td></tr>
	<tr><td><?= lang('contact_person'); ?></td><td><?= form_input($contact_person); ?></td></tr>
	<input type="hidden" name="group_id" value="3">
	<input type="hidden" name="hotel_id" value="<?= $this->session->userdata('hotel_id');?>">
	<?php 

	if($services)
	{
		foreach ($services as $serv) {
			
	 ?>
	<input type="checkbox" name="services[]" value="<?= $serv['id'];?>"><?= $serv['service_name'];?>
	<?php }} else 
	echo "no services found";
	?>

</table>
      <p><?php echo form_submit('submit', lang('create_dep_submit_btn'));?></p>
<?php echo form_close();?>
