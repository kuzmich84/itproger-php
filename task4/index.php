<body class="d-flex flex-column h-100">

<?php

$website_title = 'PHP Blog';
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
