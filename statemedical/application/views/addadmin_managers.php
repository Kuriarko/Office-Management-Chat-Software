<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  span{
	  position: absolute;
	  right: 15px;
	  transform: translate(0,-50%);
	  top: 50%;
	  cursor: pointer;
  }

</style>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">
</head>
<body>
		<div class="outer-w3-agile mt-3">
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Add New Admin-Manager</b></h1></center>
					
                    <form action="<?php echo base_url();?>Mycontroller/addadmin_managersdo" method="post">
                        
						
						<div class="form-row">
						 
						 <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter Email" required>
                            </div>
                            
                        </div>
						
						<div class="form-row">
						
						<div class="form-group col-md-6">
                                <label for="inputPassword4">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone No." required>
							</div>
						<div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required><span><i class="fa fa-eye" id="eye"></i></span>
                            </div>
						</div>
						
                    
                        <button type="submit" class="btn btn-primary">Add Admin Manager</button>
                    </form>
                </div>
				
				
				<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>??SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
				
				
				
				  <script>
 $(document).ready(function(){
	 const password = $('#password');
	 $('#eye').click(function(){
		 if(password.prop('type')=='password'){
			 $(this).addClass('fa fa-eye-slash');
			 password.attr('type','text')
		 }
		 else{
			 $(this).removeClass('fa-eye-slash');
			 password.attr('type','password');
		 }
	 })
	 
 })
</script>
				</body>
				</html>