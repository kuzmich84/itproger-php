<body class="d-flex flex-column h-100">

<?php
$website_title = 'Список пользователей';
require_once 'blocks/header.php';
require_once 'mysql_connect.php';

$sql = 'SELECT `name`,`login` FROM `users` ORDER BY `id`';
$query = $pdo->prepare($sql);
$query->execute();

$name = $query->fetchAll(PDO::FETCH_OBJ);


?>

<main role="main" class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Список пользователей</h4>
            <?php foreach ($name as $item) {?>
                <p class="name-list"><span><b>Имя: </b> <?php echo $item->name;?>, <b>логин: </b> <span class="login"><?php echo $item->login ?></span></span>
                <button type="button" class="btn btn-danger btn-user" id="<?=$item->login  ?>" >Удалить</button>
                </p>
            <?php } ?>


        </div>


    </div>
</main>


<?php require_once 'blocks/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $('.btn-user').click(function () {
        let login = this.id;
        $.ajax({
            url: '/task4/ajax/delete.php',
            type: 'POST',
            cache: false,
            data: {'login': login},
            dataType: 'html',
            success: function (data) {
                document.location.reload(true);
            }
        })

    });


</script>
</body>
</html>
