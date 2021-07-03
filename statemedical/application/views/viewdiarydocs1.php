<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
                <!-- table2 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"><?php echo $this->session->flashdata('diary_no');?></h4>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                
                                <th scope="col">Associated Documents</th>
								
								<th scope="col">Uploaded On</th>
								
								<th scope="col">Uploaded By</th>
								
								
                            </tr>
							
                        </thead>
                        <tbody>
						<?php foreach($records as $r) { ?>
                            <tr>
                                
                                <td><?php if($r->file_name != null){ ?><a href="<?php echo base_url();?>uploads/<?php echo $r->file_name;?>" target="_blank"><?php echo $r->file_name;?><a style="float:right;" onclick="return checkdelete()" href="<?php echo base_url();?>index.php/Mycontroller/deletedocs/<?php echo $this->session->flashdata('diary_no');?>/<?php echo $r->file_name;?>"><i class="fa fa-trash" style="font-size:24px"></a></i></a><?php } ?></td>
                          <td><?php if($r->file_name != null){?><?php echo $r->date;?>  at  <?php echo $r->time; ?><?php } ?> </td>
						  <td><?php if($r->file_name != null){?><?php echo $r->uploaded_by;?> <?php } ?> </td>
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
				
				 <script>
    function checkdelete(){
      return confirm('Do you want to delete this?');
    }
  </script>
				</body>
				</html>
                <!--// table2 -->