<?php
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

<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assetsMusic/css/material-kit.css?v=2.0.7" rel="stylesheet" />
</head>
<body>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assetsMusic/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Music Station</h1>
            <img src="assetsMusic/img/headphone.png" height="150px" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <form method="POST" action="">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-4">
              <input type="text" name="valueToSearch" class="form-control" id="prn" placeholder="Search">
            </div>
            <span class="col-md-3">
              <button type="submit" id="prnButton" name="search" class="btn btn-primary">Search</button>
            </span>
          </div>
        </form>
        <div class="row">
          <div class="col-md-3 text-center">
            <u>
              <h3>Name</h3>
            </u>
          </div>
          <div class="col-md-2 text-center">
            <u>
              <h3>Singer</h3>
            </u>
          </div>
          <div class="col-md-5 text-center">
            <u>
              <h3>Music</h3>
            </u>
          </div>
          <div class="col-md-2 text-center">
            <u>
              <h3>Download</h3>
            </u>
          </div>
        </div>
        <?php
        include("db.php");
        while ($row = mysqli_fetch_array($search_result)) : ?>
          <div class="row mb-1">
            <div class="col-md-3 text-center">

              <p><?php echo strtoupper($row['name']); ?></p>
            </div>
            <div class="col-md-2 text-center">

              <p><?php echo strtoupper($row['singer']); ?></p>
            </div>
            <div class="col-md-5 text-center">
              <audio controls>
                <source src=<?php echo $row['music'] ?> type="audio/ogg">
              </audio>
            </div>
            <div class="col-md-2 text-center">
              <a download="<?php echo $row['music'] ?>" href="<?php echo $row['music'] ?>"> <img src="assetsMusic/img/download.png" height="20px" /></a>
            </div>
          </div>
          </br>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</body>
</html>