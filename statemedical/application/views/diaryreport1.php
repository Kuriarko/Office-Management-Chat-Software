<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">

<script src="<?php echo base_url();?>assets/js/pdf.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js" integrity="sha512-ICHkAOXzVDEkL5xkXjAWRV/hx6Bq4ID/uhRcnj9zS7QCdCbhVtfgjwt/vTfUBtW1wzBkErImU0huK3LDVeEr8g==" crossorigin="anonymous"></script>
</head>
<body>       
	   <div class="outer-w3-agile mt-3" id="invoice">
	   <center> <h1 style="margin-bottom: 30px; font-family: 'Overpass', sans-serif; color: #6495ED;"><b>Entire Diary Report</b></h1></center>
		<div class="row">
		<div class="col-md-6">
		<h5 style="margin-bottom: 30px; font-family: 'Work Sans', sans-serif;">Generation Number:<span style="color: #3CB371; margin-left: 10px;">  <?php echo $records4->diary_no;?></span> </h5>
		</div>
		
		<div class="col-md-6">
		<h5 style="margin-bottom: 30px; font-family: 'Work Sans', sans-serif;">File Number:<span style="color: #3CB371; margin-left: 10px;">  <?php echo $records4->file_no;?></span> </h5>
		</div>
		
		</div>
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
                                        <th scope="col">Assignment Date</th>
										<th scope="col">Submission Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
								                  			 <?php
                  foreach($records3 as $r)
                  {
                  ?>
                                    <tr class="table-danger">
                                        <th scope="row"><?php echo $r->assignment_date;?></th>
										 <th scope="row"><?php echo $r->submission_date;?></th>
                                        
                                    </tr>
									
									<?php } ?>
                             
                                </tbody>
                            </table>
		</div>
		
		
				<div class="row">
		        <table class="table col-xl mr-xl-3">
                                <thead>
                                    <tr>
                                        <th scope="col">File_name</th>
                                        <th scope="col">Upload Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                


                                   			 <?php
                  foreach($records2 as $r)
                  {
                  ?>
				  <?php if($r->file_name != null){ ?>
                                    <tr class="table-warning">
                                       
                                        <td><a href="<?php echo base_url();?>uploads/<?php echo $r->file_name;?>" target="_blank"><?php echo $r->file_name;?></a></td>
                                        <td><?php echo $r->date;?> at  <?php echo $r->time;?></td>
                                    </tr>
									<?php } ?>
									
				  <?php } ?>
                                    
                                </tbody>
                            </table>
							
							
							
		</div>
		<div class="row">
			        <table class="table col-xl mr-xl-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Comments</th>
										<th scope="col">Username</th>
                                        
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
		<div><center><button type="button" id="download" class="btn btn-primary">Save as Pdf</button></center></div>
		</div>
		
			<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>
		</body>
		</html>