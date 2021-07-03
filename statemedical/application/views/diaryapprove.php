         <html>
		 <head>
		 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">
		 </head> 
		  <body>
		  <div class="outer-w3-agile mt-3">
    <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Diary Approvals</b></h1></center>

                    <table class="table">
                        <thead>
                            <tr>
                               
                                
								<th scope="col">Diary_No</th>
                                <th scope="col">Assignment_date</th>
								<th scope="col">File_No</th>
                                <th scope="col">To_whom</th>
								<th scope="col">Subject</th>
								<th scope="col">From_whom</th>
								
							
								<th scope="col">Diary_Type</th>
								
								<th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
									 <?php
                  foreach($records as $r)
                  {
                  ?>
                            <tr>
                               
                                <td><a href="<?php echo base_url();?>index.php/Mycontroller/docapprove/<?php echo $r->diary_no;?>"><?php echo $r->diary_no;?></a></td>
                                <td><?php echo $r->assignment_date;?></td>
								<td><?php echo $r->file_no;?></td>
                                <td><?php echo $r->whom;?></td>
								<td><?php echo $r->subject;?></td>
								<td><?php echo $r->from_whom;?></td>
								
								<td><?php echo $r->diary_type;?></td>
								
								<td>
								<button type="button" class="btn btn-success"><a href="<?php echo base_url();?>index.php/Mycontroller/diaryapprove/<?php echo $r->id;?>">Approve</a></button>
								<button type="button" class="btn btn-danger"><a href="<?php echo base_url();?>index.php/Mycontroller/diarydisapprove/<?php echo $r->id;?>">Disapprove</a></button>
								
								</td>
                            </tr>
				  <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
				 </body>
				 </html>