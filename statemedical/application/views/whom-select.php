	 <select id="whom" class="form-control" name="whom">
							 <?php
                  foreach($records as $r)
                  {
                  ?>
                                     
                                     <option value="<?php echo $r->uid;?>"><?php echo $r->name;?></option>
                                   
                    <?php } ?>								   
                                
								<?php if(!empty($whom)) {
									foreach($whom as $wh){
										?>
										<option value="<?php echo $whom['uid'];?>"><?php echo $whom['name'];?></option>
										<?php
									}
								}?>
								</select>
								
								
									<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>