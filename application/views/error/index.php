<hr>
<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    <?php
    if (!empty( $this->msgError)) {
        echo $this->msgError;
    } else {
        echo "Message:" . $this->msg;
    }
    ?>
</div>
<hr>

