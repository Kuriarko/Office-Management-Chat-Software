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
 
                <!-- table3 -->
                <div class="outer-w3-agile mt-3">
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>All Users</b></h1></center>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">uid</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
								<th scope="col">Department</th>
								<th scope="col">Phone</th>
								<th scope="col">Actions</th>
                            </tr>
                        </thead>
						<?php
                  foreach($records as $r)
                  {
                  ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $r->uid;?></th>
                                <td><?php echo $r->name;?></td>
                                <td><?php echo $r->email;?></td>
                                <td><?php echo $r->password;?></td>
								<td><?php echo $r->department;?></td>
								<td><?php echo $r->phone;?></td>
								<td>
								<button type="button" class="btn btn-primary"><a href="<?php echo base_url();?>Mycontroller/mgr_userupdate/<?php echo $r->uid;?>">Update</a></button>
								<button type="button" class="btn btn-danger"><a onclick="return checkdelete()" href="<?php echo base_url();?>Mycontroller/ITcelluserdelete/<?php echo $r->uid;?>">Delete</a></button>
								
								</td>
                            </tr>
                            
                        </tbody>
				  <?php } ?>
                    </table>

                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
                <!--// table3 -->
  		 <script>
    function checkdelete(){
      return confirm('Do you want to delete this?');
    }
  </script>
 </body>
</html>