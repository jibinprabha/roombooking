<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('hotel/register_hotel');?>
<table>
	<tr><td><?= lang('name_of_hotel'); ?></td><td><?= form_input($vchr_hotel_name); ?></td></tr>
	<tr><td><?= lang('email'); ?></td><td><?= form_input($vchr_email); ?></td></tr>
	<tr><td><?= lang('password'); ?></td><td><?= form_input($password); ?></td></tr>
<tr><td><?= lang('confirm_password'); ?></td><td><?= form_input($password_confirm); ?></td></tr>
	<tr><td><?= lang('phone'); ?></td><td><?=form_input($vchr_phone); ?></td></tr>
	<tr><td><?= lang('address_line_1') ?></td><td><?= form_input($vchr_address_line1); ?></td></tr>
	<tr><td><?= lang('address_line_2') ?></td><td><?= form_input($vchr_address_line2); ?></td></tr>
	<tr><td><?= lang('pincode') ?></td><td><?= form_input($vchr_pincode); ?></td></tr>
	<tr><td><?= lang('state') ?></td><td><select name="vchr_state" class="form-control select_box" style="width: 100%">
	 <option value="Kerala" title="Kerala">Kerala</option>

    <option value="Karnataka" title="Karnataka">Karnataka</option>
	   

</select></td></tr>
	<tr><td><?= lang('district') ?></td><td><select name="vchr_district" class="form-control select_box" style="width: 100%">
	 <option value="Kozhikode" title="Kozhikode">Kozhikode</option>

    <option value="Kannur" title="Kannur">Kannur</option>
	   

</select></td></tr>
	<tr><td><?= lang('country') ?></td><td><select name="vchr_country" class="form-control select_box" style="width: 100%">
	   
    <option value="India" title="India">India</option>

    <option value="Afghanistan" title="Afghanistan">Afghanistan</option>
    <option value="Åland Islands" title="Åland Islands">Åland Islands</option>
    <option value="Albania" title="Albania">Albania</option>
    <option value="Algeria" title="Algeria">Algeria</option>
    <option value="American Samoa" title="American Samoa">American Samoa</option>
    <option value="Andorra" title="Andorra">Andorra</option>
    <option value="Angola" title="Angola">Angola</option>
    <option value="Anguilla" title="Anguilla">Anguilla</option>
    <option value="Antarctica" title="Antarctica">Antarctica</option>
    

</select></td></tr>
	<tr><td><?= lang('currency');  ?></td><td>
		<input type="hidden" name="fk_int_group_id" value="2">

	<select name="fk_int_currency_id">
	<?php if($currency)
	{ 
		foreach ($currency as $row) {
		
		?>
		<option value="<?= $row['pk_int_currency_id']; ?>"><?= $row['vchr_name']; ?></option>
		<?php }} else {?>
		<option>d</option>
		<?php } ?>
	</select>
	</td></tr>

</table>
      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
