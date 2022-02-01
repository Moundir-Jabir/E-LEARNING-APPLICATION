<?php
    include ('data/library.php');
    $students = get_students();

    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $enroll = random_int(0,100000);
    $date = date("F j, Y");
    $new = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "enroll_number" => $enroll,
        "date_admission" => $date
    ];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        add_student($new);
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
    <script src="https://kit.fontawesome.com/3514a06926.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/students.css">
    <title>Students</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <main>
        <div id="head">
            <div>
                <h2>Students List</h2>
            </div>
            <div>
                <img src="image/fleches.svg" alt="deux-fleche">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span id="add">ADD NEW STUDENT</span><i id="plus" class="fas fa-user-plus"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">ADD NEW STUDENT</h3>
                            </div>
                            <div class="modal-body">
                                <form action="students.php" method="POST">
                                    <div class="mb-3">
                                        <input type="text" required class="form-control form-control-lg" placeholder="name" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" required class="form-control form-control-lg" placeholder="e-mail" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" required class="form-control form-control-lg" placeholder="phone" name="phone">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <hr>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Enroll Number</th>
                        <th colspan="2" scope="col">Date of admission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student){ ?>
                        <tr>
                            <td><img src="image/classe.svg" alt="icone-classe"></td>
                            <?php foreach ($student as $key => $value){ ?>
                                <td> <?php echo $value; ?> </td>
                            <?php } ?>
                            <td>
                                <a href="update_student.php?id=<?php echo $student['enroll_number'] ?>"><img class="crayon" src="image/crayon.svg" alt="icone-modifier"></a>
                                <a href="delete_student.php?id=<?php echo $student['enroll_number'] ?>"><img src="image/poubelle.svg" alt="icone-supprimer"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>