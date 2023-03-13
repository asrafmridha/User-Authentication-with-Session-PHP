<?php
session_start([
    'cookie_lifetime' => 300, //5 minutes
]);
$error_message = false;

if (isset($_POST['username']) && $_POST['password']) {
    if ($_POST['username'] == 'asraf35' && $_POST['password'] == 'tahmina') {
        $_SESSION['loggedin'] = true;
    } else {
        $error_message = true;
        $_SESSION['loggedin'] = false;
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['loggedin'] = false;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Authentication</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col col-60 col-offset-20">
                <h1>Simple Auth Example</h1>
            </div>
        </div>
        <div class="col col-60 col-offset-20 mt-2">
            <?php
            if (true == $_SESSION['loggedin']) { ?>

            <?php
                echo "<h5>Hello Admin Welcome</h5>";
            } else { ?>

        </div>
        <div class="col col-60 col-offset-20 mt-2">
        <?php
                echo "<h5>Hello Stranger Login Below</h5>";
            }
        ?>
        </div>
        <?php if ($error_message == true) {  ?>
            <p class="text text-danger">Username or Password doesn't Match</p>
        <?php } ?>
        <?php if ($_SESSION['loggedin'] == false) { ?>

            <div class="col col-60 col-offset-20 mt-3">
                <form method="POST" action="/ostad_php_project/login_session/auth.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        <?php } else { ?>
            <form action="/ostad_php_project/login_session/auth.php" method="POST">
                <input type="hidden" name="logout" value="1">
                <button type="submit" class="btn btn-danger">logout</button>
            </form>
        <?php } ?>


    </div>
</body>

</html>