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
	
	
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
		 
		 
	<body>	 
		 <div class="outer-w3-agile mt-3">
	   <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Add Diary</b></h1></center>
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/manager_towhomdo" method="post">
                        <div class="form-row">
						<div class="form-group col-md-4">
                                
                            </div>
						  <div class="form-group col-md-4">
                                <label for="inputEmail4">To Whom Addressed</label>
                   		
							 	 <select id="whom" class="form-control" name="whom">
							 <?php
                  foreach($records as $r)
                  {
                  ?>
                                     
                                     <option value="<?php echo $r->name;?>"><?php echo $r->name;?></option>
                                   
                    <?php } ?>								   
                                </select>
						
								
                            </div>
							
						<div class="form-group col-md-4">
                                
                            </div>
                  
                        </div>
						
						
						   <div class="form-row">
						<div class="form-group col-md-4">
                                
                            </div>
						  <div class="form-group col-md-4">
                                 <label for="inputAddress">Diary Type</label>
								
							 <select id="diary_type" class="form-control" name="diary_type">
				              
                                      <option value="">Select Diary Type</option>
									   <?php
    foreach($country as $row)
    {
     echo '<option value="'.$row->diarytype_name.'">'.$row->diarytype_name.'</option>';
    }
    ?>
									  
									
                    					   
                                </select>
						
								
                            </div>
							
						<div class="form-group col-md-4">
                                
                            </div>
                  
                        </div>
					  
                       <center> <button type="submit" class="btn btn-primary">Proceed</button></center>
                    </form>
                </div>
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
		
			
			</body>
</html>			
