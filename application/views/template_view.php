<?php
$title = "Load File";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= (isset($title) ? $title : "FileLoad Site"); ?></title>
    <link href="<?= Route::getBaseUrl(); ?>/css/style.css" media="screen" rel="stylesheet">
    <link href="<?= Route::getBaseUrl(); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="<?= Route::getBaseUrl(); ?>/js/jqBootstrapValidation.js"></script>
    <script src="<?= Route::getBaseUrl(); ?>/js/bootstrap-collapse.js"></script>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="<?= Route::getBaseUrl(); ?>/main/index">Main</a></li>
            <?php if (!empty($data["session_useremail"])) {
                echo "<li class='active'><a href=" . Route::getBaseUrl() . "/load/index>Load File</a></li>";
            }
            ?>
            <li class="active"><a
                    href=<?= Route::getBaseUrl() . (!empty($data["session_useremail"]) ? "/main/logout>Log out" : "/main/login>Log in") ?></a>
            </li>

        </ul>
        <?php if (!empty($data["session_useremail"])) {
            echo "<h3 class='text-muted'>Hello, <span>" . $data['session_useremail'] . "</span> ^_^</h3>";
        }
        ?>
    </div>
    <div>
        <br/>
        <br/>
        <?php  if (!empty($this->msgError)) {
            include 'application/views/error/index.php';
        }
        if (!empty($this->msg)) {
           echo "<div class='alert alert-info'>";
            echo "<h4 class='alert-heading'>Message:</h4>". $this->msg;
            echo "</div>";
        }
        ?>
    </div>
    <?php if (!empty($content_view)) {
        include 'application/views/' . $content_view;
    } ?>
</div>
</body>
<footer>
    © 2016 Kate Rozhkova
</footer>
</html>