<?php if(count($get_spc_lists)==0) die; ?>
<br>
<label>Specialty</label>
<?php
$n=1;
foreach($get_spc_lists as $row){
echo "
<div class='form-group'>
    <input type='checkbox' onclick='formSubmit()' name='Specialty$n' value='$row->id'> $row->spcialization
</div>";$n++;
}?>
<input type="hidden" name="SpecialtyCount" value="<?php echo $n;?>">