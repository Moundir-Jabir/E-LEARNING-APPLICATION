<?php
    session_start();
    require ('../session/library.php');
    redirection_login();
    require('database/models/count.php');
    $count = new Count();
    $nbr_student = $count->countStudent();
    $nbr_course = $count->countCourse();
    $nbr_payment = $count->countPayment();
    $nbr_user = $count->countUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div id="student" class="col-lg col-md-3 col-sm-5 col-11 case">
                    <img src="image/1.svg" alt="student">
                    <p>Students</p>
                    <h2><?php echo $nbr_student; ?></h2>
                </div>
                <div id="course" class="col-lg col-md-3 col-sm-5 col-11 case">
                    <img src="image/2.svg" alt="course">
                    <p>Course</p>
                    <h2><?php echo $nbr_course; ?></h2>
                </div>
                <div id="payment" class="col-lg col-md-3 col-sm-5 col-11 case">
                    <img src="image/3.svg" alt="payments">
                    <p>Payments</p>
                    <h2>DHS <?php echo $nbr_payment; ?></h2>
                </div>
                <div id="user" class="col-lg col-md-3 col-sm-5 col-11 case">
                    <img src="image/4.svg" alt="user">
                    <p>Users</p>
                    <h2><?php echo $nbr_user; ?></h2>
                </div>
            </div>
        </div>
    </main>
</body>
</html>