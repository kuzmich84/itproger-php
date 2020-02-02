<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="img/iconphp.ico">
    <link rel="stylesheet" href="css/main.css">
    <title>PHP Blog</title>
</head>
<body class="d-flex flex-column h-100">

<?php
require_once 'blocks/header.php';


?>

<main role="main" class="container mt-5">
<div class="row">
    <div class="col-md-8">
Основная часть
    </div>
    <?php require_once 'blocks/aside.php'; ?>

</div>
</main>


<?php require_once 'blocks/footer.php'; ?>
</body>
</html>
