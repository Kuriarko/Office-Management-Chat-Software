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
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
 <body>
                
<section class="cards-section">
<div class="card-columns">
                 <?php
                  foreach($records as $r)
                  {
                  ?>       
       <div class="card">
	   
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $r->subject;?></h5>
                            <p class="card-text">Diary No: <?php echo $r->diary_no;?></p>
							 <p class="card-text">Diary Status: <?php echo $r->diary_status;?></p>
							 <p class="card-text">Receive Mode: <?php echo $r->receive_mode;?></p>
                            <p class="card-text">
                                <small class="text-muted">Date of Assignment: <?php echo $r->assignment_date;?> </small>
                            </p>
							<?php $status = $r->diary_status;
							if($status == "Open")
							{ ?>
					         <a href="<?php echo base_url();?>Mycontroller/startworking/<?php echo $r->id;?>" class="btn more mt-3" >Start Working</a>
							 <a href="<?php echo base_url();?>Mycontroller/forwarddiary/<?php echo $r->id;?>" class="btn more mt-3" >Forward to User</a>
							 <a href="<?php echo base_url();?>Mycontroller/forwarddiary_adminmanager/<?php echo $r->id;?>" class="btn more mt-3" >Forward to IT Division</a>
							 <a href="<?php echo base_url();?>Mycontroller/forwarddiary_admin/<?php echo $r->id;?>" class="btn more mt-3" >Forward to Secretary SMFWB</a>

                            <?php
							} 
							?>
							<?php 
                            $status = $r->diary_status;
							if($status == "in_progress"){ ?>
							<a href="<?php echo base_url();?>Mycontroller/startworking/<?php echo $r->id;?>" class="btn more mt-3" >Ongoing Work</a>
					         <a href="<?php echo base_url();?>Mycontroller/forwarddiary/<?php echo $r->id;?>" class="btn more mt-3" >Forward to User</a>
							 <a href="<?php echo base_url();?>Mycontroller/forwarddiary_adminmanager/<?php echo $r->id;?>" class="btn more mt-3" >Forward to IT Division</a>
							 <a href="<?php echo base_url();?>Mycontroller/forwarddiary_admin/<?php echo $r->id;?>" class="btn more mt-3" >Forward to Secretary SMFWB</a>

							<?php } ?>
    
                        </div>
                    </div>
					<?php } ?>	
					</div>
					</section>
					
						<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>

 		
  
 </body>
</html>