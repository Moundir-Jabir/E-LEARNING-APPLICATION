<?php
    $id = $_GET['id'] ?? "";
    $deleteId = $_GET['delete'] ?? "";
    if($deleteId == "")
        $displayD = "none";
    else
        $displayD = "block";
    if($id == "")
        $display = "none";
    else
        $display = "block";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $price = $_POST['price'] ?? "";
    require('database/models/course.php');
    $list = new Course();
    $course = $list->getCourseById($id);

    session_start();
    require ('../session/library.php');
    redirection_login();
    
    $courses = $list->getCourses();

    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $price = $_POST['price'] ?? "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $list->addCourse($title, $description, $price);
        header("Location: courses.php");
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
    <link rel="stylesheet" href="css/courses.css">
    <title>Courses</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <main>
        <div id="head">
            <div>
                <h2>Courses List</h2>
            </div>
            <div>
                <img src="image/fleches.svg" alt="deux-fleche">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span id="add">ADD NEW COURSE</span><i id="plus" class="fas fa-plus-circle"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">ADD NEW COURSE</h3>
                            </div>
                            <div class="modal-body">
                                <form action="courses.php" method="POST">
                                    <div class="mb-3">
                                        <input type="text" required class="form-control form-control-lg" placeholder="title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" required class="form-control form-control-lg" placeholder="description" name="description">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" required class="form-control form-control-lg" placeholder="price" name="price">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <hr>
        <div class="modal fade <?php echo $display; ?>" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="row justify-content-center">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel2">UPDATE COURSE</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="update_course.php?id=<?php echo $id ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title :</label>
                                    <input type="text" id="title" required class="form-control form-control-lg" placeholder="title" name="title" value="<?php echo $course->title; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description :</label>
                                    <input type="text" id="description" required class="form-control form-control-lg" placeholder="description" name="description" value="<?php echo $course->description; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Price :</label>
                                    <input type="number" id="price" required class="form-control form-control-lg" placeholder="price" name="price" value="<?php echo $course->price; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Course Number</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th colspan="2" scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($courses as $course){ ?>
                        <tr>
                            <td><?php echo $course->course_number; ?></td>
                            <td><?php echo $course->title; ?></td>
                            <td><?php echo $course->description; ?></td>
                            <td>DHS <?php echo $course->price; ?></td>
                            <td>
                                <a href="courses.php?id=<?php echo $course->course_number; ?>"><img class="crayon" src="image/crayon.svg" alt="icone-modifier"></a>
                                <a href="courses.php?delete=<?php echo $course->course_number; ?>"><img class="click" data-bs-toggle="modal" data-bs-target="#<?php echo $course->course_number; ?>" src="image/poubelle.svg" alt="icone-supprimer"></a>
                                <div class="modal fade <?php echo $displayD; ?>" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">ARE YOU SURE TO DELETE THIS COURSE</h3>
                                            </div>
                                            <div class="modal-body">
                                                <a href="delete_course.php?id=<?php echo $deleteId; ?>"><button class="btn btn-primary">Confirm</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="script/courses.js"></script>
</body>
</html>