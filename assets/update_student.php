<?php
    $id = $_GET['id'] ?? "";
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $solde = $_POST['solde'] ?? "";
    require('database/models/student.php');
    $item = new Student();
    $student = $item->getStudentById($id);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $item->updateStudent($id, $name, $email, $phone, $solde);
        header("Location: students.php");
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
    <title>Update Student</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-lg-5 col-md-7 col-sm-9 col-11">
                <h1>Update Student</h1> <br>
                <form action="update_student.php?id=<?php echo $id ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name :</label>
                        <input type="text" id="name" required class="form-control form-control-lg" placeholder="name" name="name" value="<?php echo $student->name; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">E-mail :</label>
                        <input type="email" id="email" required class="form-control form-control-lg" placeholder="e-mail" name="email" value="<?php echo $student->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone :</label>
                        <input type="text" id="phone" required class="form-control form-control-lg" placeholder="phone" name="phone" value="<?php echo $student->phone; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="solde">Solde :</label>
                        <input type="number" id="solde" required class="form-control form-control-lg" placeholder="solde" name="solde" value="<?php echo $student->solde; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>