         <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Do you really want to Submit?</h4>
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/manager_worksubmitted" method="post">
					          <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Diary No:</label>
                  <input type="text" name="diary_no" class="form-control" id="inputPassword4" value="<?php echo $records->diary_no;?>" required readonly>

								
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
							date_default_timezone_set('Asia/Kolkata');
							echo date("H:i "); 
							?>"  required readonly>
								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						    <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Submission Date:</label>
								   <input type="text" name="submission_date" class="form-control" id="inputAddress" value="<?php 
							 $date=date("Y-m-d");
							 echo $date;
							?>"  required readonly>

								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
               
                    <center>
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Submit</button>
						 </center>
                    </form>
                </div>
				
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>