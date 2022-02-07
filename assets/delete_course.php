<?php
    $id = $_GET['id'] ?? "";
    require('database/models/course.php');
    $item = new Course();
    $item->deleteCourse($id);
    header("Location: courses.php");
?>