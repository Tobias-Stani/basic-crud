<?php
include('db.php');

// Definir variables para evitar errores si no están inicializadas
$title = $subtitle = $description = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);  // Obtener la fila de la consulta
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', subtitle = '$subtitle', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: index.php");
}


?>

<?php
include("includes/header.php")
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title?>" class="form-control" placeholder="update title">
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="subtitle" rows="2" class="form-control" placeholder="update subtitle"><?php echo $subtitle?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="update description"><?php echo $description?></textarea>
                    </div>
                    
                    <button class="btn btn-success mt-3" name="update">
                        UPDATE
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php")
?>
