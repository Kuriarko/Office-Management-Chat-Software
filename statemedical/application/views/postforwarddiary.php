         <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Forward</h4>
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/workforward" method="post">
					          <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Diary No:</label>
                  <input type="text" name="diary_no" class="form-control" id="inputPassword4" value="<?php echo $records1->diary_no;?>" required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
                        <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Forward To: </label>
                     <input type="text" name="name" class="form-control" id="inputPassword4" value="<?php echo $records->name;?>" required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						        <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Contact No:</label>
                  <input type="text" name="phone" class="form-control" id="inputPassword4" value="<?php echo $records->phone;?>" required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						         <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Forward Time:</label>
                  <input type="text" name="forward_time" class="form-control" id="inputPassword4" value="<?php date_default_timezone_set('Asia/Kolkata');
							echo date("H:i "); ?>" required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
							         <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Forward Date:</label>
                  <input type="text" name="forward_date" class="form-control" id="inputPassword4" value="<?php echo date("Y-m-d"); ?>
							 " required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						
						
						         <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Comments:</label>
                 
				  
				  <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3" required></textarea>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
                    <center>
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Forward</button>
						 </center>
                    </form>
                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>