<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('services/add_service');?>
<table>
	<tr><td><?= lang('name_of_service'); ?></td><td><?= form_input($service_name); ?></td></tr>
<!-- 	<tr><td><?= lang('hotel_id'); ?></td><td><?= form_input($hotel_id); ?></td></tr> -->
<input type="hidden" name="hotel_id" value="<?= $this->session->userdata('hotel_id');?>">
	<tr><td><?= lang('contact_name'); ?></td><td><?= form_input($contact_name); ?></td></tr>
	<tr><td><?= lang('contact_no'); ?></td><td><?= form_input($contact_no); ?></td></tr>
	<tr><td><?= lang('rate'); ?></td><td><?=form_input($rate); ?></td></tr>
	<tr><td><?= lang('delivery_time') ?></td><td><?= form_input($delivery_time); ?></td></tr>

	
</table>
      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
