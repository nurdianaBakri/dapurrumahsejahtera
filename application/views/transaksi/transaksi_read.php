<h2 style="margin-top:0px">Transaksi Read</h2>
<table class="table">
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
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
