<?php
    $id = $_GET['id'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $price = $_POST['price'] ?? "";
    require('database/models/course.php');
    $item = new Course();
    $course = $item->getCourseById($id);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $item->updateCourse($id, $title, $description, $price);
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
    <title>Update Course</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-lg-5 col-md-7 col-sm-9 col-11">
                <h1>Update Course</h1> <br>
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
    </main>
</body>
</html>