         <div class="outer-w3-agile mt-3">
                    
					
                    <form action="<?php echo base_url();?>index.php/Mycontroller/worksubmitted" method="post">
					          <div class="form-row">
						 <div class="form-group col-md-4">
						</div>
						    <div class="form-group col-md-4">
                                <label for="inputEmail4">The Diary was with <?php $records->email;?> for</label>
                  <input type="text" name="diary_no" class="form-control" id="inputPassword4" value="<?php echo $records->diary_no;?>" required readonly>

								
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