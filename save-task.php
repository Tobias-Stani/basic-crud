<?php

include("db.php");

if(isset($_POST['save-task'])){
    
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, subtitle, description) VALUES ('$title', '$subtitle', '$description')";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Guardado';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}

?>