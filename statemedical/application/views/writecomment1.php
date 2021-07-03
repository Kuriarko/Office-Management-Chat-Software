         <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Write a Comment</h4>
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/commentsubmit1/<?php echo $records->diary_no;?>" method="post">
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
						
						<?php foreach($records1 as $r){?>

                        <div class="form-row">

                        <div class="form-group col-md-4">

                        </div>

                        <div class="form-group col-md-4">
						
						<textarea class="form-control" name="comments" id="exampleFormControlTextarea1" placeholder="<?php echo $r->comments;?>" rows="3" readonly></textarea> 
							
                            </div>

                            <div class="form-group col-md-4">
							<h4 style="color: green; font-size: 15px;">on  <?php echo $r->date;?>  at  <?php echo $r->time;?> by <?php echo $r->whom;?><h4/>

                            </div>

                        </div>
						
						<?php } ?>
                 
						
						         <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Your Comment:</label>

                                <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3" required></textarea>
                 
								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						        <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Date:</label>

						 <input type="text" name="date" class="form-control" id="inputPassword4" value="<?php echo date("Y-m-d"); ?>"  readonly>
                 
								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
						
						      <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">Time Now:</label>

						 <input type="text" name="time" class="form-control" id="inputPassword4" 
						 
						 value="<?php 
							date_default_timezone_set('Asia/Kolkata');
							echo date("H:i "); 
							?>"


						 readonly>
                 
								
                            </div>
							<div class="form-group col-md-4">
						</div>
                         
                        </div>
						
                    <center>
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Post Comment</button>
						 </center>
                    </form>
                </div>
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>