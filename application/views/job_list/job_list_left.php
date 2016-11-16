<aside class="col-md-2 col-sm-3">
    <form id="jobFilterList" method="post">
    <div class="sidebar-search">
        <input class="form-control" name="search" type="text" onkeyup="formSubmit()" placeholder="search">
    </div>
    <div class="filter">
        <div class="filter-group date-filter">
            <label>Date Posted</label>
            <div class="form-group">
                <input type="radio" onclick="formSubmit()" name="hour" value=""> All
            </div>
            <div class="form-group">
                <input type="radio" onclick="formSubmit()" name="hour" value="1"> Last hour
            </div>
            <div class="form-group">
                <input type="radio" onclick="formSubmit()" name="hour" value="6"> Last 6 hour
            </div>
            <div class="form-group">
                <input type="radio" onclick="formSubmit()" name="hour" value="12"> Last 12 hour
            </div>
            <div class="form-group">
                <input type="radio" onclick="formSubmit()" name="hour" value="24"> Last 24 hour
            </div>
        </div>
        <div class="filter-group vacancy-filter">
            <label>Vacancy Type</label>
            <div class="form-group">
                <input type="radio" name="vacancyType" onclick="formSubmit()" value=""> All
            </div>
            <div class="form-group">
                <input type="radio" name="vacancyType" onclick="formSubmit()" value="f"> Freelancer
            </div>
            <div class="form-group">
                <input type="radio" name="vacancyType" onclick="formSubmit()" value="l"> Local business/Service
            </div>
        </div>

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
        var sendData = $('#jobFilterList').serialize();
        $.ajax({
            url: '<?php echo base_url();?>index.php/job_list/filteredJob',
            data: sendData,
            type:'POST',
            success:function(data){
                alert(data);
            }
        });

    }
</script>