<?php
    $students = [
        ["name" => "Moundir", "email" => "mondirjabir@gmail.com", "phone" => "0623674588", "enroll_number" => 1234567305477760, "date_admission" => "08-Dec, 2021"],
        ["name" => "Said", "email" => "said@gmail.com", "phone" => "0623994588", "enroll_number" => 1233405477760, "date_admission" => "08-Nov, 2021"],
        ["name" => "Yassin", "email" => "yasin@gmail.com", "phone" => "0629999588", "enroll_number" => 344645477760, "date_admission" => "08-Dec, 2020"],
        ["name" => "Hamza", "email" => "hamza@gmail.com", "phone" => "0699884588", "enroll_number" => 1567305477760, "date_admission" => "18-Dec, 2021"],
        ["name" => "Ahmed", "email" => "ahmed@gmail.com", "phone" => "0623674008", "enroll_number" => 123456730560, "date_admission" => "08-Jan, 2021"]
    ];
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
                <button><span id="add">ADD NEW STUDENT</span><i id="plus" class="fas fa-user-plus"></i></button>
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
                                <img class="crayon" src="image/crayon.svg" alt="icone-modifier">
                                <img src="image/poubelle.svg" alt="icone-supprimer">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>