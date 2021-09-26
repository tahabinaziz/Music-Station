<?php
include './header/nav.php';
include("db.php");
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT tbl_enquiry.id,tbl_enquiry.prnNo , tbl_enquiry.name, tbl_enquiry.courseId,tbl_enquiry.cellNo,tbl_courses.course FROM tbl_enquiry inner join tbl_courses on tbl_enquiry.courseId = tbl_courses.id where tbl_enquiry.name LIKE '%" . $valueToSearch . "%' and tbl_enquiry.prnNo != ''    ";
    $search_result = filterTable($query);

} else {
    $query = "SELECT tbl_enquiry.id, tbl_enquiry.prnNo ,tbl_enquiry.name, tbl_enquiry.courseId,tbl_enquiry.cellNo,tbl_courses.course FROM tbl_enquiry inner join tbl_courses on tbl_enquiry.courseId = tbl_courses.id  where tbl_enquiry.prnNo != ''   ORDER BY tbl_enquiry.id DESC";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    include("connection.php");
    $filterResult = mysqli_query($connect, $query);
    return $filterResult;
}
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
                    <h1 class="mt-4" style="text-align:center; ">Dashboard</h1>
                   
                    <div class="form-group">
                    <form class="" action="eFormcsv.php" method="post" >
                                
                                </form>

                        <form method="POST" action="voucherList.php">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="valueToSearch" class="form-control" id="prn" placeholder="Name">
                                </div>
                                <span class="col-md-3">
                                    
                                    <button type="submit" id="prnButton" name="search" class="btn btn-primary">Search</button>
                                </span>
                                
                            </div>

                            

                    </div>
                    <div className="card mb-4">
                        <div className="card-header">
                            <i className="fa fa-home mr-3"></i>

                        </div>
                        
                        <div class="container" id="box">
                            <div className="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Categroy</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Singer</th>
                                                <th scope="col">Music</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>




                                            <?php

                                            include("connection.php");
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($search_result)) : ?>
                                                <?php $no = $no + 1;?>
                                                <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo strtoupper($row['prnNo']); ?></td> 
                                                    <td><?php echo strtoupper($row['name']); ?></td>
                                                    <td><?php echo strtoupper($row['course']); ?></td>
                                                    <td><?php echo $row['cellNo']; ?></td>
                                                   
                                                    <td><a <?php echo 'href="viewEnquiryPrintForm.php?id=' . $row["id"] . '"' ?> title="View" data-toggle="tooltip"><i class="fas fa-file-pdf" style="color:#CD113B"></i></a> |
                                                        <a <?php echo 'href="editEform.php?id=' . $row["id"] . '"' ?> title="Edit" data-toggle="tooltip"><i class="fas fa-pen" style="color:orange"></i></a> |
                                                        <a <?php echo ' href="challan.php?id=' . $row["id"] . '"' ?> title="Edit Status" data-toggle="tooltip"><i class="fas fa-receipt" style="color:#B2B1B9 "></i></a> |
                                                        <!-- <a <?php echo ' href="deleteEform.php?id=' . $row["id"] . '"' ?> title="Delete" data-toggle="tooltip"><i class="fa fa-trash" style="color:red"></i></a> -->

                                                    </td>

                                                </tr>
                                            <?php endwhile; ?>
                                           
                                    </table>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

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
    <script>
        function myFunction() {
            var x = document.getElementById("button");
            var xInput = document.getElementById("prn");
            var yButton = document.getElementById("prnButton");
            var csv = document.getElementById("csv");
            
            if (x.style.display === "none" && xInput.style.display === "none" && yButton.style.display === "none") {
                x.style.display = "block";
                yButton.style.display = "block";
                csv.style.display = "block";
                xInput.style.display = "block";
               
            } else {
                x.style.display = "none";
                csv.style.display = "none";
                xInput.style.display = "none";
                yButton.style.display = "none";
                
            }
            window.print();
        }
    </script>
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