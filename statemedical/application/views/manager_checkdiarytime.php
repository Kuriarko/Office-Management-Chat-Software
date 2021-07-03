         <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Diary No: <?php echo $records->diary_no;?> Time Tracker</h4>
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/manager_workhourscalculation" method="post">
					          <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Submitted By:</label>
                  <input type="text" name="email" class="form-control" id="inputPassword4" value="<?php echo $records->email;?>" required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Assigned on:</label>
   <input type="text" name="assignment_date" class="form-control" id="inputAddress" value="<?php echo $records->assignment_date; ?>"  required readonly>
								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Assignment Time:</label>
								   <input type="text" name="start_time" class="form-control" id="inputAddress" value="<?php 
							 echo $records->incoming_time;
							?>"  required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Submitted on:</label>
								   <input type="text" name="submission_date" class="form-control" id="inputAddress" value="<?php 
							 echo $records->submission_date;
							?>"  required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Submission Time:</label>
								   <input type="text" name="end_time" class="form-control" id="inputAddress" value="<?php 
							 echo $records->end_time;
							?>"  required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						
               
                    <center>
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Check Time Elapsed</button>
						 </center>
                    </form>
                </div>
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>