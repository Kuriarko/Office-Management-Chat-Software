            <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Verify Documents</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th scope="col">Diary No.</th>
                                <th scope="col">Documents</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                             
                                <td><?php echo $records->diary_no;?></td>
                                <td><a href="<?php echo base_url();?>uploads/<?php echo $records->file_name;?>" target="_blank"><?php echo $records->file_name;?></a></td>
                                
                            </tr>
                         
                        
                        </tbody>
                    </table>
                </div>
				
				
					<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="margin-top: 100px;">
                <p>©SMFWB 2021 . All Rights Reserved | Developed by
                    <a href="https://tridentdigitech.com/"> Trident Digitech </a>
                </p>
            </div>