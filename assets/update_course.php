<?php
    $id = $_GET['id'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $price = $_POST['price'] ?? "";
    require('database/models/course.php');
    $item = new Course();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $item->updateCourse($id, $title, $description, $price);
        header("Location: courses.php");
    }
?>