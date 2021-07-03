            <div class="container-fluid">
                <div class="row">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
					<center><h1><?php echo $records->subject;?></h1></center>
					<center><h3 style="margin-top: 30px;"><?php echo $records->diary_no;?></h3></center>
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary" style="margin-top: 50px;">
                            <div class="s-l">
                               <a href="<?php echo base_url();?>index.php/Mycontroller/manager_viewdiarydocs/<?php echo $records->diary_no;?>"><h5>Documents Of The Project</h5></a>
                            </div>
                           
                        </div>
						
						 <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-success" style="margin-top: 50px;">
                            <div class="s-l">
                               <a href="<?php echo base_url();?>index.php/Mycontroller/IT_writecomment/<?php echo $records->diary_no;?>"><h5>Comments</h5></a>
                            </div>
                           
                        </div>
						
						 <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-warning" style="margin-top: 50px;">
                            <div class="s-l">
                                <a href="<?php echo base_url();?>index.php/Mycontroller/manager_uploaddocs/<?php echo $records->diary_no;?>"><h5>Upload New Document</h5></a>
                            </div>
                           
                        </div>
						
							 <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-secondary" style="margin-top: 50px;">
                            <div class="s-l">
                                <a href="<?php echo base_url();?>index.php/Mycontroller/manager_editfileno/<?php echo $records->diary_no;?>"><h5>Add/Edit File_No.</h5></a>
                            </div>
                            
                        </div>
                       
                    
                    
                    </div>
                    <!--// Stats -->
                   
                </div>
				<center><a href="<?php echo base_url();?>index.php/Mycontroller/manager_submitwork/<?php echo $records->id;?>"><button class="btn btn-style"  style="margin-top: 50px;">Submit Task</button></a></center>
            </div>
			
				<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>