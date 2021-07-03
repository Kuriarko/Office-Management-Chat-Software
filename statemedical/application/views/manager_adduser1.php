         <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add New User</h4>
					<h5 style="color: green;">User added successfully!</h5>
                    <form action="<?php echo base_url();?>index.php/Mycontroller/manager_adduserdo" method="post">
                        
						
						<div class="form-group">
                            
                            <input type="hidden" name="uid" class="form-control" id="inputAddress" value="<?php echo $records->uid;?>" required readonly>
                        </div>
						<div class="form-row">
						 <div class="form-group col-md-4">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Department</label>
                            <input type="text" name="department" class="form-control" id="inputAddress" placeholder="" required>
                        </div>
						
						 <div class="form-group">
                            <label for="inputAddress">Phone</label>
                            <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="" required>
                        </div>
                      
              
                       
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>