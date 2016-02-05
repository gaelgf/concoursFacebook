<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'bootstrap.min.css'; ?> >
    <link rel="stylesheet" type="text/css" href=<?php echo CSS_DIRECTORY_URL . 'style.css'; ?> >
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'jquery.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'bootstrap.min.js'; ?> ></script>
    <script type="text/javascript" src=<?php echo JS_DIRECTORY_URL . 'selection_album.js'; ?> ></script>
</head>

<body>
<header>
    <img src=<?php echo IMG_DIRECTORY_URL . 'campagnes/1/logo.png'; ?> alt="">
    - Concours photos
</header>

<?php include $this->view; ?>

</body>
</html>
