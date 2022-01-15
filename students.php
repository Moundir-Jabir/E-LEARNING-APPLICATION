<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="students.css">
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
                <button>ADD NEW STUDENT</button>
            </div>
        </div> <hr>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Enroll Number</th>
                        <th scope="col">Date of admission</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="image/classe.svg" alt="icone-classe"></td>
                        <td>username</td>
                        <td>user@email.com</td>
                        <td>7305477760</td>
                        <td>1234567305477760</td>
                        <td>08-Dec, 2021</td>
                        <td>
                            <img class="crayon" src="image/crayon.svg" alt="icone-modifier">
                            <img src="image/poubelle.svg" alt="icone-supprimer">
                        </td>
                    </tr>
                    <tr>
                        <td><img src="image/classe.svg" alt="icone-classe"></td>
                        <td>username</td>
                        <td>user@email.com</td>
                        <td>7305477760</td>
                        <td>1234567305477760</td>
                        <td>08-Dec, 2021</td>
                        <td>
                            <img class="crayon" src="image/crayon.svg" alt="icone-modifier">
                            <img src="image/poubelle.svg" alt="icone-supprimer">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>