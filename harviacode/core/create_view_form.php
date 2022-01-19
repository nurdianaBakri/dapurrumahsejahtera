<?php
$string = "
<!-- Page Heading --> <h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2>
<!-- DataTales Example -->
<div class=\"card shadow mb-4\">
    <div class=\"card-header py-3\">
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
            </div>
        </div>
    </div>
    <div class=\"card-body\">
        
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
            foreach ($non_pk as $row) {
            if ($row["data_type"] == 'text' ||$row["data_type"] == 'longtext')
            {
            $string .= "\n\t    <div class=\"form-group\">
                <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>";
            }
            else if ($row["data_type"] == 'enum')
            {
            $string .= "\n\t    <div class=\"form-group\">
                <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <select class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" > </select>
        </div>";
        }
        else
        {
        $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
        }
        }
        $string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
        $string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
        $string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
    $string .= "\n\t</form>
</div>";
$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);
?>