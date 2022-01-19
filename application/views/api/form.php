 <h2 style="margin-top:0px">API</h2>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">  </div>
     <div class="card-body">

         <form action="<?php echo $action; ?>" method="post" >
           
             <div class="row">
                 <div class="col-md-6">

                     <div class="form-group"> 
                         <label for="varchar">BIN TO DEC<?php echo form_error('binToDec') ?></label>
                 <input type="text" class="form-control" name="binToDec" id="binToDec" placeholder="binToDec"
                     value="<?php echo $binToDec; ?>" />
                     </div>

                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="int">DEC TO BIN <?php echo form_error('decToBin') ?></label>
                         <input type="number" class="form-control" name="decToBin" id="decToBin" placeholder="decToBin"
                             value="<?php echo $decToBin; ?>" />
                     </div>
                 </div>
             </div>
 
             <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
             <a href="<?php echo site_url('Home') ?>" class="btn btn-warning">Cancel</a>
         </form>
     </div>
 </div> 
