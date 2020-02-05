<body class="d-flex flex-column h-100">

<?php
$website_title = 'Authorization';
require_once 'blocks/header.php';


?>

<main role="main" class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php if ($_COOKIE['log'] == ''): ?>
                <h4>Форма авторизации</h4>
                <form action="" method="post">

                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">
                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="auth_user" class="btn btn-success mt-5">
                        Войти
                    </button>
                </form>
            <?php else: ?>
                <h2><?= $_COOKIE['log'] ?></h2>
                <button type="button" class="btn btn-danger" id="exit_btn">Выйти</button>
            <?php endif; ?>
        </div>


    </div>
</main>


<?php require_once 'blocks/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $('#exit_btn').click(function () {

        $.ajax({
            url: '/task4/ajax/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function (data) {
                document.location.reload(true);

            }
        })

    });
    $('#auth_user').click(function () {
        var login = $('#login').val();
        var pass = $('#pass').val();

        $.ajax({
            url: '/task4/ajax/auth.php',
            type: 'POST',
            cache: false,
            data: {'login': login, 'pass': pass},
            dataType: 'html',
            success: function (data) {
                if (data == "Готово") {
                    $('#auth_user').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        })

    });

</script>
</body>
</html>
