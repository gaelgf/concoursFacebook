<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'bootstrap.min.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'style.css'; ?> >
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'lib/jquery.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'lib/bootstrap.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'selection_album.js'; ?> ></script>
</head>

<body>
<div class="header">
    <img  class="main_logo" src=<?php echo IMG_DIRECTORY_URL . 'campagnes/1/logo.png'; ?> alt="">
    - Concours photos
</div>

<?php include $this->view; ?>

    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'vote.js'; ?> ></script>
</body>
</html>
