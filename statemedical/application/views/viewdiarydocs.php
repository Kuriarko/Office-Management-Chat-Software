
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
                                
                                <td><a href="<?php echo base_url();?>uploads/<?php echo $r->file_name;?>" target="_blank"><?php echo $r->file_name;?></a></td>
                            <td><?php if($r->file_name != null){ ?><?php echo $r->date;?>  at  <?php echo $r->time; ?><?php } ?> </td>
							<td><?php echo $r->uploaded_by;?></td>
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
                <!--// table2 -->