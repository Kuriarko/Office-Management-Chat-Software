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
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Update User</b></h1></center>
					
                    <form action="<?php echo base_url();?>Mycontroller/userupdatedo" method="post">
                        <?php foreach($records as $r){ ?>
						<div class="form-group">
                            
                            <input type="hidden" name="uid" class="form-control" id="inputAddress" value="<?php echo $r->uid;?>" required readonly>
                        </div>
						<div class="form-row">
						 
						 <div class="form-group col-md-4">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4" value="<?php echo $r->name;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php echo $r->email;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="<?php echo $r->password;?>" required><span><i class="fa fa-eye" id="eye"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Department</label>
                            <input type="text" name="department" class="form-control" id="inputAddress" value="<?php echo $r->department;?>" required>
                        </div>
						
						 <div class="form-group">
                            <label for="inputAddress">Phone</label>
                            <input type="text" name="phone" class="form-control" id="inputAddress" value="<?php echo $r->phone;?>" required>
                        </div>
                      
						<?php } ?>
                       
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
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