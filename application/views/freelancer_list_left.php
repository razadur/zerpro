<aside class="col-md-2 col-sm-3">
    <form id="jobFilterList" method="post">
    <div class="sidebar-search">
        <input class="form-control" name="search" type="text" onkeyup="formSubmit()" placeholder="search">
    </div>
    <div class="filter">

        <div class="filter-group specialty-filter">
            <label>Specialty</label>
            <?php
            $this->db->from('spcialization');
            $query = $this->db->get();
            $n=1;
            foreach($query->result() as $row){
            echo "
            <div class='form-group'>
                <input type='checkbox' onclick='formSubmit()' name='Specialty$n' value='$row->id'> $row->spcialization
            </div>";$n++;
            }?>
            <input type="hidden" name="SpecialtyCount" value="<?php echo $n;?>">
        </div>
<!--<button class="btn btn-block btn-primary">Submit</button>-->
    </div>
    </form>
</aside>

<script>
    function formSubmit(){
        var jobList = $('#jobList').html('');
        var sendData = $('#jobFilterList').serialize();
        $.ajax({
            url: '<?php echo base_url();?>index.php/withoutLogin_jobList/frelancer_list_filter',
            data: sendData,
            type:'POST',
            success:function(data){
                //alert(data);
                var jobList = $('#frelancerList').html(data);
            }
        });

    }
</script>