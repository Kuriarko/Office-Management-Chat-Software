 <!DOCTYPE html>
<html lang="en">

<head>
    <title>smfwb</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
 <body>
          
        <section class="tables-section">
                <!-- table1 -->
                <div class="outer-w3-agile mt-3">
	   <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Receiving Diary Table</b></h1></center>
					
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 20px;">
  <a href="<?php echo base_url();?>index.php/Mycontroller/diarystatus"><button type="button" class="btn btn-success">Receiving Diaries</button></a>
  <a href="<?php echo base_url();?>index.php/Mycontroller/newdiarystatus"><button type="button" class="btn btn-secondary">Despatch Diaries</button></a>
  
</div>


       
					
					
                    <table class="table table-bordered table-striped table-hover" id="book-table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Diary_No</th>
								<th scope="col">File_No</th>
                                <th scope="col">Diary_Name</th>
                                <th scope="col">Currently_Under</th>
								<th scope="col">Diary_Status</th>
								
								<th scope="col">Rec_Cat.</th>
								<th scope="col">Receive_Mode</th>
								<th scope="col">Assignment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                    </table>
					
					<div><center><a href="<?php echo base_url();?>index.php/Mycontroller/get_excel_report/"><button type="button" class="btn btn-primary">Export To Excel</button></a></center></div>

                </div>
				
				</section>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
  
<script type="text/javascript">
$(document).ready(function() {
    $('#book-table').DataTable({
        'processing': true,
          'serverSide': true,
          'serverMethod': 'post',

        "ajax": {
            'url':'<?=base_url()?>index.php/Mycontroller/diaries_page'
           
            
        },

        'columns': [
             { data: 'diary_no',
             
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='<?php echo base_url();?>index.php/Mycontroller/clickeddiaries/"+oData.diary_no+"'>"+oData.diary_no+"</a>");
			            $(nTd).css("color", "blue");
						
						

        }
             
             
              },
			 { data: 'file_no' },
             { data: 'subject' },
             { data: 'whom' },
             { data: 'diary_status',
			 
			            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

if(oData.diary_status == "Closed")			           
					   $(nTd).css("color", "red");
					   
					   if(oData.diary_status == "in_progress"){			           
					   $(nTd).css("color", "#B8860B");
					  
					   
					   }
					   
					     if(oData.diary_status == "Open"){			           
					   $(nTd).css("color", "#6495ED");
					    $(nTd).css("font-weight", "bold");
					 
					   
					   }
					  

        }

			 },
            
			 { data: 'receiving_category' },
             { data: 'receive_mode' },
             { data: 'assignment_date' },
          ]

    });
});
</script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
 </body>
</html>