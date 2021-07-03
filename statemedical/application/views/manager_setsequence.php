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
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Set New Receiving Sequence</b></h1></center>
					
                    <form action="<?php echo base_url();?>Mycontroller/manager_setsequencedo" method="post">
                        <div class="form-row">
						<div class="form-group col-md-4">
                                
                            </div>
						 <div class="form-group col-md-4">
                                <input type="text" name="sequence" class="form-control" id="inputEmail4" value="" required >
                            </div>
							
							<div class="form-group col-md-4">
                                <p style="color: green;">Last modified on: <?php echo $bb->modified_on;?></p>
                            </div>
                  
                        </div>
						 
						 <div class="form-row">
						<div class="form-group col-md-4">
                                
                            </div>
						 <div class="form-group col-md-4">
					        <label for="inputEmail4">Today's Date</label>

                                <input type="text" name="date" class="form-control" id="inputEmail4" value="<?php echo date("d/m/Y"); ?>" required readonly>
                            </div>
							
							<div class="form-group col-md-4">
                                
                            </div>
                  
                        </div>
                 
                       
                       <center> <button type="submit" class="btn btn-primary" onclick="myFunction()">Set Sequence</button></center>
                    </form>
                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
				
				<script>
				function myFunction()
				{
					alert('Do you really want to set new sequence?');
				}
				</script>
			</body>
</html>			
