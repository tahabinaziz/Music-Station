<?php
include './header/nav.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Music Station</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <?php
        include './header/sidebar.php';
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4" style="text-align:center; ">MUSIC</h1>
                    <!-- <img src="./assets/img/logo.png" height="100px" text-align="center" /> -->

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Music</li>
                    </ol>

                    <?php
                    $status = "";
                    if (isset($_POST['submit'])) {

                        include("db.php");
                        $status = 'Inserted Successfully';


                        $category = $_POST['categoryId'];
                        $singer = $_POST['singer'];
                        $name = $_POST['name'];

                            $dir='uploads/';
                            $audio_path=$dir.basename($_FILES['audioFile']['name']);
                            if (move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path)){
                                $query = mysqli_query($connect, "INSERT INTO music (music,singer,categoryId,name) VALUES ('$audio_path','$singer','$category','$name')") or die("mysqli_error");;

                                $status = "Record Insert Successfully. </br></br>
                                <a href='viewMusic.php'>View Record</a>";
                                echo '<p style="color:#FF0000;">' . $status . '</p>';
                            }


                        
                        
                    }
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                        <label for="inputState">Category</label>
                                        <select type="text" name="categoryId" class="form-control" >
                                            <option  selected>Select Category</option>
                                            <?php
                                            include("db.php");
                                            $records = mysqli_query($connect, "SELECT * From category");
                                            while ($data = mysqli_fetch_array($records)) {
                                                echo "<option   value='" . $data['id'] . "'>" . strtoupper($data['category']) . "</option>";  // displaying data in option menu
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                <label>Singer</label> <input type="text" name="singer" class="form-control" placeholder="Singer" required>
                            </div>
                            <div class="col-md">
                                <label>Name</label> <input type="text" name="name" class="form-control"  required>
                            </div>
                            <div class="col-md">
                                <label>Music</label> <input type="file" name="audioFile" class="form-control"  required>
                            </div>
                            <span class="col-md-1">
                                <br>
                                <label></label>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </span>
                        </div>

                    </form>

                </div>
            </main>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
