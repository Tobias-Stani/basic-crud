<?php include("db.php"); include("includes/header.php");?>


    <div class="container p-2">
        <div class="row">

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible" role="alert">
                        <?php echo $_SESSION['message'];?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="col-md-12 mt-5">
                <div class="card card-body">
                    <form action="save-task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="titulo" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subtitle" rows="2" class="form-control mt-2" placeholder="subtitulo">
                            <input type="text" name="description" rows="2" class="form-control mt-2" placeholder="descripcion">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block mt-2" name="save-task" value="guardar"> 
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <?php
                $query = "SELECT * FROM task";
                $result_tasks = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result_tasks)) { ?>
                    <div class="card mt-4">
                        <div class="card-header">
                            <?php echo $row['title'] ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['subtitle'] ?></h5>
                            <p class="card-text"><?php echo $row['description'] ?></p>
                            <a href="edit.php?id=<?php echo $row['id']?>">Edit</a>
                            <a href="delete-task.php?id=<?php echo $row['id']?>">Delete</a>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>


<?php include("includes/footer.php");?>


