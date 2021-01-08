<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Задачник</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
    <header class="header border-bottom bg-light">
    <div class="container">
        <div class="row justify-content-end py-3">
        <div class="login-container mr-5">
            <?if(isset($_SESSION["USER"]["IS_ADMIN"]) && $_SESSION["USER"]["IS_ADMIN"] == true){?>
                <p><?=$_SESSION["USER"]["NAME"]?> <a href="/login/logout">Выйти</a></p>
            <?} else {?>
                <p><a href="/login">Войти</a></p>
            <?}?>
        </div>
        </div>
    </div>
    </header>
    <main class="main py-3">
        <?include 'app/views/'.$content_view;?>
    </main>
</body>
</html>