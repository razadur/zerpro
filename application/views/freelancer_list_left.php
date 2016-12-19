<aside class="col-md-2 col-sm-3">
    <form id="jobFilterList" method="post">
    <div class="sidebar-search">
        <input class="form-control" name="search" type="text" onkeyup="formSubmit()" placeholder="search">
    </div>
    <div class="filter">

        <div class="filter-group specialty-filter">
            <div class="filter-group specialty-filter">
                <select id="state" class="form-control" onchange="ctgToSpe()">
                    <option value="" >Select Category</option>
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
                var jobList = $('#frelancerList').html(data);
            }
        });
    }
    function ctgToSpe(){
        var ctg = $('#state').val();
        var datas = 'ctg='+ctg;
        $.ajax({
            url: '<?php echo base_url();?>index.php/job_list/filteredSpe',
            data: datas,
            type:'POST',
            success:function(data){
                $('#spe').html(data);
            }
        });
    }
</script>