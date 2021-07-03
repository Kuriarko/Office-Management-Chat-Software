        <div class="outer-w3-agile mt-3">
	    <h4 class="tittle-w3-agileits mb-4">Diary Forward Trail and Actions</h4>
        <div class="container-fluid">
		<div class="row">
		        <table class="table col-xl mr-xl-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Forwarded_to</th>
                                        <th scope="col">Forward_time</th>
                                        <th scope="col">Forward_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                


                                   			 <?php
                  foreach($records as $r)
                  {
                  ?>
                                    <tr class="table-success">
                                        <th scope="row"><?php echo $r->forwarded_to;?></th>
                                        <td><?php echo $r->forward_time;?></td>
                                        <td><?php echo $r->forward_date;?></td>
                                    </tr>
									
				  <?php } ?>
                                    
                                </tbody>
                            </table>
							
							
							
								        <table class="table col-xl mr-xl-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Actions</th>
										<th scope="col">From</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
								                  			 <?php
                  foreach($records1 as $r)
                  {
                  ?>
                                    <tr class="table-active">
                                        <th scope="row"><?php echo $r->comments;?></th>
										 <th scope="row"><?php echo $r->whom;?></th>
                                        
                                    </tr>
									
									<?php } ?>
                             
                                </tbody>
                            </table>
		</div>
		</div>
		</div>
		
		
			<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>