 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Detail transaksi List</h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">

         <div class="row" style="margin-bottom: 10px">
             <div class="col-md-4">
             </div>
             <div class="col-md-4 text-center">
                 <div style="margin-top: 8px" id="message">
                     <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                 </div>
             </div>
             <div class="col-md-1 text-right">
             </div>
             <div class="col-md-3 text-right">
                 <form action="<?php echo site_url('data_transaksi/index'); ?>" class="form-inline" method="get">
                     <div class="input-group">
                         <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                         <span class="input-group-btn">
                             <?php 
                                                if ($q <> '')
                                                {
                                                    ?>
                             <a href="<?php echo site_url('data_transaksi'); ?>" class="btn btn-default">Reset</a>
                             <?php
                                                }
                                            ?>
                             <button class="btn btn-primary" type="submit">Search</button>
                         </span>
                     </div>
                 </form>
             </div>
         </div>

     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <tr> 
                     <th>Id</th>
                     <th>Tgl Order</th>
                     <th>Status Pelunasan</th>
                     <th>Tgl Pembayaran</th>
                     <th>Sub Total</th>
                     <th>Jumlah</th>
                     <th>Action</th>
                 </tr><?php
 
				foreach ($data_transaksi_data as $detail_transaksi)
				{
					?>
                 <tr> 
                     <td><?php echo $detail_transaksi->id ?></td>
					 <td><?php echo $detail_transaksi->tgl_order ?></td>
                     <td><?php 
						if($detail_transaksi->status_pelunasan==1){
							echo "Lunas";
						}
						else{
							echo "Pending"; 
						} 
						
						?></td>
                     <td><?php echo $detail_transaksi->tgl_pembayaran ?></td> 
                     <td><?php echo $detail_transaksi->sub_total ?></td>

                     <td><?php echo $detail_transaksi->jumlah ?></td>
                     <td style="text-align:center" width="200px">
                         <?php 
				echo anchor(site_url('data_transaksi/read/'.$detail_transaksi->id_transaksi),'<button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>'); 
				?>
                     </td>
                 </tr>
                 <?php
                                                }
                                                ?>
             </table>


             <div class="row">
                 <div class="col-md-6">
                     <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                 </div>
                 <div class="col-md-6 text-right">
                     <?php echo $pagination ?>
                 </div>
             </div>


         </div>
     </div>
 </div>
