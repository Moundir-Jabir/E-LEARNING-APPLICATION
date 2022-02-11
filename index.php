<?php
    session_start();
    $status = "";
    $cookieEmail = $_COOKIE['email'] ?? "";
    $cookiePassword = $_COOKIE['password'] ?? "";
?>

<?php
    require('session/library.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = htmlspecialchars($_POST['email']) ?? "";
        $password = htmlspecialchars($_POST['password']) ?? "";
        $check = $_POST['check'] ?? "";
        if(authenticate($email,$password)){
            if($check == "on"){
                setcookie("email", $email, time()+3600*48);
                setcookie("password", $password, time()+3600*48);
            }else{
                setcookie("email"); //effacer la cookie
                setcookie("password");
            }
            header("Location: assets/home.php");
        }else{
            $status = "email ou mot de passe incorect !!";
        }
    }

    redirection_admin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Sign in</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-lg-5 col-md-7 col-sm-9 col-11">
                <h1>E-classe</h1>
                <p id="sign-in">SIGN IN</p>
                <p id="enter">Enter your credentials to access your account</p>
                <?php if($status != ""){ ?>
                    <div class="alert alert-danger">
                        <?php echo $status; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" required class="form-control form-control-lg" value="<?php echo $cookieEmail; ?>" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" required class="form-control form-control-lg" value="<?php echo $cookiePassword; ?>" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked name="check" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Enregistrer les informations de connexion</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit">SIGN IN</button>
                    </div>
                </form>
                <p>Forgot your password? <a href="#">Reset Password</a></p>
            </div>
        </div>
    </main>
</body>
</html>