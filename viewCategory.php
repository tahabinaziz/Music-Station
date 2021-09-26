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
                    <h1 class="mt-4" style="text-align:center; ">View Category</h1>
                    <!-- <img src="./assets/img/logo.png" height="100px" text-align="center" /> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Category List</li>
                    </ol>


                    <div className="card mb-4">
                        <div className="card-header">
                            <i className="fa fa-home mr-3"></i>

                        </div>
                        <div className="card-body">
                            <div className="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category</th>
                                            
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                       

                                        $data = "SELECT * FROM category ORDER BY id DESC";

                                        $rs =  $connect->query($data);
                                        if ($rs->num_rows > 0) {
                                            $no = 0;
                                            while ($row = $rs->fetch_assoc()) {
                                                $no = $no + 1;
                                                echo '<tr>
                            <td>' . $no . '</td>
                            <td>' . strtoupper($row["category"]) . '</td>
                            
                            <td>
                            <a  href="editCategory.php?id='.$row["id"].'" title="Edit" data-toggle="tooltip"><i class="fas fa-pen" style="color:orange"></i></a> |
                            <a href="deleteCategory.php?id='.$row["id"].'" title="Delete" data-toggle="tooltip"><i class="fa fa-trash" style="color:red"></i></a>
                            </td>
                            </tr>
                            </tbody>';
                                            }
                                        }

                                        ?>
                                </table>


                            </div>
                        </div>
                    </div>

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