<?php
include './header/nav.php';
include("db.php");
$id = $_REQUEST['id'];
$query = "SELECT * from category where id='" . $id . "'";
$result = mysqli_query($connect, $query) or die("mysqli_error");
$row = mysqli_fetch_assoc($result);

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
                    <h1 class="mt-4" style="text-align:center; ">Edit Category</h1>
                    <!-- <img src="./assets/img/logo.png" height="100px" text-align="center" /> -->

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Edit Group</li>
                    </ol>

                    <?php
                    $status = "";
                    if (isset($_POST['new']) && $_POST['new'] == 1) {
                        $id = $_REQUEST['id'];
                        $category = strtolower($_REQUEST['category']);
                       
                        $update = "update category set category='" . $category . "'  where id='" . $id . "'";
                        mysqli_query($connect, $update) or die("mysqli_error");
                        $status = "Record Updated Successfully. </br></br>
                        <a href='viewCategory.php'>View Updated Record</a>";
                        echo '<p style="color:#FF0000;">' . $status . '</p>';
                       
                    } else {
                    ?>

                        <form method="POST" action="">
                            <div class="row">
                                <input type="hidden" name="new" value="1" />
                                <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                                <div class="col-md-5">
                                    <label>Category</label> <input type="text" name="category" class="form-control" placeholder="" value="<?php echo strtoupper($row['category']); ?>" required>
                                </div>
                                
                                <span class="col-md-1">
                                    <br>
                                    <label></label>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </span>
                            </div>
                        <?php } ?>
                        </form>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
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