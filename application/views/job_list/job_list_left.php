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
            <select id="state" class="form-control">
                <option value="">Select Category</option>
                <?php
                $this->db->select('*');
                $this->db->from('category');
                $query = $this->db->get();
                $n=1;
                foreach($query->result() as $row){
                echo "<option value='$row->category_name'> $row->category_name</option>";
                }?>
            </select>
            <div id="spe"></div>
        </div>
    </div>
    </form>
</aside>

<script>
    function formSubmit(){
        var jobList = $('#jobList').html('');
        var sendData = $('#jobFilterList').serialize();
        $.ajax({
            url: '<?php echo base_url();?>index.php/withoutLogin_jobList',
            data: sendData,
            type:'POST',
            success:function(data){
                var jobList = $('#jobList').html(data);
            }
        });
    }

    $('#state').change(function(){
        var ctg = $(this).val();
        var datas = 'ctg='+ctg;
        $.ajax({
            url: '<?php echo base_url();?>index.php/job_list/filteredSpe',
            data: datas,
            type:'POST',
            success:function(data){
                $('#spe').html(data);
            }
        });
    });
</script>