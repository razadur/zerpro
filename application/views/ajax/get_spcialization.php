<?php foreach($get_spcializations as $get_spcialization){ ?>
<div class="checkbox">
                            <label>
                              <input type="checkbox" value="<?php echo $get_spcialization->spcialization; ?>" name="spcialization[]"><?php echo $get_spcialization->spcialization; ?>
                            </label>
                          </div>
<?php } ?>