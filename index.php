<?php
session_start();
if(isset($_SESSION['login'])){
    header('location:dashboard.php');
}else{
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retail - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-secondary-subtle">
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card w-25">
            <div class="card-body">
                <div class="card-title text-center">
                    <h4>Retail Application</h4>
                    <hr>
                </div>
                <div class="text-center text-danger">
                    <?php
                        if(isset($_SESSION['pesan'])){
                            echo $_SESSION['pesan'];
                            session_unset();
                        }
                    ?>
                </div>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" name="username" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary py-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>