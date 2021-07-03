<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter Dependent Dropdown Example with demo</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
</head>


<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Select State and get bellow Related City</div>
      <div class="panel-body">


            <div class="form-group">
                <label for="title">Select Diary Type:</label>
                <select name="diarytype" class="form-control" style="width:350px">
                    <option value="">--- Select Diary Type ---</option>
                    <?php
                        foreach ($diarytype as $key => $value) {
                            echo "<option value='".$value->diarytype_id."'>".$value->diarytype_name."</option>";
                        }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="title">Select Receiving Category:</label>
                <select name="reccat" class="form-control" style="width:350px">
                </select>
            </div>


      </div>
    </div>
</div>


<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="diarytype"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="reccat"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="reccat"]').append('<option value="'+ value.reccat_id +'">'+ value.reccat_name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="reccat"]').empty();
            }
        });
    });
</script>


</body>
</html>