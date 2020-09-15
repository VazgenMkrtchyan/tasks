<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--    <script src="/public/scripts/form.js"></script>-->

    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/public/styles/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="/public/styles/main.css" rel="stylesheet">
    <link href="/public/styles/alertify.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <?php
        if (isset($_SESSION['account']['id'])) {
        ?>
            <a class="navbar-brand" href="/account/profile">Приложение-задачник</a>
        <?php
        }else{
        ?>
            <a class="navbar-brand" href="/">Приложение-задачник</a>
        <?php }?>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/task/create">Создать задачу</a>
                </li>
                <?php if (isset($_SESSION['account']['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/account/logout">Выход</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/account/login">Вход Админ</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php echo $content; ?>


<script src="/public/scripts/jquery-3.5.1.js"></script>
<script src="/public/scripts/jquery.dataTables.min.js"></script>
<script src="/public/scripts/dataTables.bootstrap4.min.js"></script>
<script src="/public/scripts/dataTables.responsive.min.js"></script>
<script src="/public/scripts/responsive.bootstrap4.min.js"></script>
<script src="/public/scripts/alertify.min.js"></script>
<script src="/public/scripts/main.js"></script>

<?php require 'alertify.php'?>

</body>
</html>