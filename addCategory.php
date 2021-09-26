<?php
include './header/nav.php';

include("db.php");
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
                    <h1 class="mt-4" style="text-align:center; ">Category</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>

                    <?php
                    $status = "";
                    if (isset($_POST['submit'])) {

                        $status = 'Inserted Successfully';

                        $category = strtolower($_POST['category']);
                        
                        $result = mysqli_query($connect, "SELECT * FROM category WHERE category='$category'");

                        if (mysqli_num_rows($result) > 0) {
                            echo "<script language='javascript' type='text/javascript'>alert('category " . $_POST['category'] . " already exist')</script>";
                        } else {
                            $query = mysqli_query($connect, "INSERT INTO category (category) VALUES ('$category')") or die("mysqli_error");;

                            $status = "Record Insert Successfully. </br></br>
                            <a href='viewCategory.php'>View Record</a>";
                            echo '<p style="color:#FF0000;">' . $status . '</p>';
                        }
                    }?>

                        <form method="POST" action="">
                        <div class="row">

                            <div class="col-md-5">
                                <label>Category</label> <input type="text" name="category" class="form-control" placeholder="category" required>
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
