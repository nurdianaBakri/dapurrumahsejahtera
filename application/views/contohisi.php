<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class=\"table table-bordered\" >
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
        </table>

                     
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->