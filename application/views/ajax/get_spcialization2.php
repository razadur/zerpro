<select name="spcialization" class="form-control" data-width="auto">
						  <option value="">Select Sub-Category</option>
<?php foreach($get_spcializations as $get_spcialization){ ?>
<option value="<?php echo $get_spcialization->spcialization; ?>"><?php echo $get_spcialization->spcialization; ?></option>
						  
						



<?php } ?>
</select> 