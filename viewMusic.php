<?php
include './header/nav.php';
include("db.php");
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT  category.category, category.id as categoryId, music.id,music.name,music.singer,music.music from music inner join category on music.categoryId = category.id where music.name LIKE '%" . $valueToSearch . "%' ";
    $search_result = filterTable($query);
} else {
    $query = "SELECT category.category, category.id as categoryId, music.id,music.name,music.singer,music.music from music inner join category on music.categoryId = category.id   ORDER BY music.id DESC";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    include("db.php");
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
                        <form method="POST" action="">
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
                                                <th scope="col">Singer</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Music</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("db.php");
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($search_result)) : ?>
                                                <?php $no = $no + 1; ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo strtoupper($row['category']); ?></td>
                                                    <td><?php echo strtoupper($row['singer']); ?></td>
                                                    <td><?php echo strtoupper($row['name']); ?></td>
                                                    <td>
                                                        <audio controls>
                                                            <source src= <?php echo $row['music'] ?> type="audio/ogg">
                                                        </audio>
                                                    </td>
                                                    <td>
                                                        <a <?php echo ' href="deleteMusic.php?id=' . $row["id"] . '"' ?> title="Delete" data-toggle="tooltip"><i class="fa fa-trash" style="color:red"></i></a>

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