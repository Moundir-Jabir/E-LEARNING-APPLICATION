<?php
    session_start();
    require('session/library.php');
    redirection_admin();
    require('assets/database/models/compte.php');
    $status = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = htmlspecialchars($_POST['fullname']) ?? "";
        $email = htmlspecialchars($_POST['email']) ?? "";
        $password = htmlspecialchars($_POST['password']) ?? "";
        $password = hash("md5", $password);
        $compte = new Compte();
        if($compte->addCompte($name, $email, $password) == "bien"){
            $user = new stdClass();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $_SESSION['user'] = $user;
            setcookie("email"); //effacer la cookie
            setcookie("password");
            header("Location: assets/home.php");
        }else{
            $status = "cet email est déja utilisé !!";
        }
    }
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
    <title>Create new account</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-lg-5 col-md-7 col-sm-9 col-11">
                <h1>E-classe</h1>
                <p id="sign-in">SIGN UP</p>
                <p id="enter">Enter your informations to create a new account</p>
                <?php if($status != ""){ ?>
                    <div class="alert alert-danger">
                        <?php echo $status; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label> <span id="fullname-validation"></span>
                        <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="fullname must contain letters only and between 5 and 20 characters ">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label> <span id="email-validation"></span>
                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter a validate email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label> <span id="password-validation"></span>
                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="password must contain at least 8 caracters">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirm Password</label> <span id="password2-validation"></span>
                        <input type="password" class="form-control form-control-lg" name="password2" id="password2" placeholder="confirm password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit">SIGN UP</button>
                    </div>
                </form>
                <p><a href="index.php">Already have an account? Login</a></p>
            </div>
        </div>
    </main>
    <script src="assets/script/sign-up.js"></script>
</body>
</html>