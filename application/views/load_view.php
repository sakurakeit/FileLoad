<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form class="well" action="<?= Route::getBaseUrl(); ?>/load/loadFile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Select a file to upload</label>
                    <input type="file" name="somename">
                    <p class="help-block">Only file with maximum size of 100 KB is
                        allowed.</p>
                </div>
                <input type="submit" class="btn btn-lg btn-primary" value="Upload">
            </form>
        </div>
    </div>
</div> <!-- /container -->
<h3><br/></h3>

<div class="container">
    <table class="table table-hover table-bordered" id="table" class="sortable">
        <tr style="border: solid 1px #000">
            <td align="center"><b>File_id</b></td>
            <td align="center"><b>Path</b></td>
            <td align="center"><b>Link</b></td>
            <td align="center"><b>Date load</b></td>
        </tr>
        <?php
        if (isset($data['fileTable'])) {
            foreach ($data['fileTable'] as $row) {
                echo "<tr>\n";
                echo "<td>" . $row['id'] . "</td>\n";
                echo "<td><a>" . $row['path'] . "</a></td>\n";
                echo "<td><a href='files/" . $row['path'] . "' download>download</a></td>\n";
                echo "<td>" . $row['date_load'] . "</td>\n";
                echo "</tr>\n";
            }
        }
        echo("</table>\n");
        ?>
</div>