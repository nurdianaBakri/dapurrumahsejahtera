
        <h2 style="margin-top:0px">Data transaksi Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Sub Total</td><td><?php echo $sub_total; ?></td></tr>
		<tr>
        <td>Tgl Order</td>
        <td><?php echo $tgl_order; ?></td>
    </tr>
    <tr>
        <td>Status Pelunasan</td>
        <td> 
            <?php 
			if($status_pelunasan==1){
				echo "Lunas";
			}
			else{
				echo "Pending"; 
			} 
			?></td>
    </tr>
    <tr>
        <td>Tgl Pembayaran</td>
        <td><?php echo $tgl_pembayaran; ?></td>
    </tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table> 
