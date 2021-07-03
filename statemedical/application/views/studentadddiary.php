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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
		 
		 
	<body>	 
		 <div class="outer-w3-agile mt-3">
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Add New Diary</b></h1></center>
					
					
					
                    <form action="<?php echo base_url();?>Mycontroller/adddiarydo1" method="post" enctype="multipart/form-data">
                        <div class="form-row">
						 <div class="form-group col-md-4">
                                <label for="inputEmail4">Date</label>
                                <input type="text" name="date" class="form-control" id="inputEmail4" value="<?php echo date("Y-m-d"); ?>" required readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">To Whom Addressed</label>
                   			<input type="text" name="whom" class="form-control" id="whom" value="<?php echo $records->name;?>" required readonly>
								
                            </div>
							
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Subject</label>
                                <input type="text" name="subject" class="form-control" id="inputPassword4" placeholder="" required>
                            </div>
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
                                <label for="inputEmail4">From whom</label>
                                <input type="text" name="from_whom" class="form-control" id="inputEmail4" value="<?php echo $bb->name;?>" required readonly>
                            </div>
                      
							
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Phone No.</label>
                                 <input type="text" name="phone" class="form-control" id="inputPassword4" value="<?php echo $records->phone;?>" required readonly>
                            </div>
							
							 <div class="form-group col-md-4">
                                <label for="inputPassword4">email</label>
                                <input type="text" name="email" class="form-control" id="inputPassword4" value="<?php echo $records->email;?>" required readonly>
                            </div>
                        </div>
						
						  <div class="form-group">
                            <label for="inputAddress">Receive Mode</label>
								
							 <select id="inputState" class="form-control" name="receive_mode">
				              
                                     <option value="By Person">By Person</option>
									 <option value="By Post">By Post</option>
									 <option value="By Email">By Email</option>
									 <option value="By Email">By Phone/Whatsapp</option>
                    					   
                                </select>
				  
                        </div>
						
						<?php if($records1->type == "Receiving"){ ?>
						  <div class="form-group">
                            <label for="inputAddress">Receiving Category</label>
								
							 <select id="inputState" class="form-control" name="receiving_category">
				              
                                     <option value="Query">Query</option>
									 <option value="Complain">Complain</option>
									 <option value="Correction">Correction</option>
									 <option value="Documents Submission">Documents Submission</option>
									 <option value="Documents Submission">Others</option>
									
                    					   
                                </select>
				  
                        </div>
						<?php } ?>
						
						
						<div class="form-row">
						  <div class="form-group col-md-6">
                            <label for="inputAddress">Diary Type</label>
								
						 <input type="text" name="diary_type" class="form-control" id="inputPassword4" value="<?php echo $records1->type;?>" required readonly>
				  
                        </div>
						<?php if($records1->type == "Despatch"){?>
						<div class="form-group col-md-6">
						 <label for="inputAddress">Reference Receiving No.</label>
						 <input type="text" name="ref_rec_no" class="form-control" id="ref_rec_no" value="">
						
						</div>
						<?php } ?>
						</div>
						
						
						 <div class="form-group">
                            <label for="inputAddress">Comments </label>
						   <textarea class="form-control" id="exampleFormControlTextarea1" name="comments" rows="3" required></textarea>

                        </div>
						
						<div class="form-row">
							 <div class="form-group col-md-6">
                            <label for="inputAddress">Diary No.</label>
							<?php if($records1->type == "Receiving"){ ?>
                            <input type="text" name="diary_no" class="form-control" id="inputAddress" value="<?php 
                             $sequence= $records1->sequence_no; 
							echo "R_".$sequence."_".date("d-m-y");
							?>"  required readonly>
							<?php } ?>
							
							<?php if($records1->type == "Despatch"){ ?>
							<input type="text" name="diary_no" class="form-control" id="inputAddress" value="<?php 
                             $sequence= $records1->sequence_no; 
							echo "D_".$sequence."_".date("d-m-y");
							?>"  required readonly>
							<?php } ?>
                        </div>
						
						<div class="form-group col-md-6">
						<label for="inputAddress">File No.</label>
						<input type="text" name="file_no" class="form-control" id="inputAddress" value="" > 
						
						</div>
						</div>
						
						 <div class="form-group">
                            <label for="inputAddress">Generation Time</label>
                            <input type="text" name="incoming_time" class="form-control" id="inputAddress" value="<?php 
							date_default_timezone_set('Asia/Kolkata');
							echo date("H:i "); 
							?>"  required readonly>
                        </div>
						
						  <div class="form-group ">
                          <label for="inputAddress">Upload Documents: </label>
						  <input type = "file" name = "userfile"  />
                          </div>
					
                      
              <br>
                        <button type="submit" class="btn btn-primary">Add Diary</button>
                    </form>
                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
			</body>
</html>			
