<?php  
require_once "app/Magic.php";
session_start();
$magic = new Magic();

// show lirik
$posts = $magic->getAll("posts");
// $posts = $posts[0];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>AkuLirik</title>
  </head>
  <body>


<!-- mulai -->
<div class="container">
  <!-- As a heading -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="">AkuLirik</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Lagu List</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="m-5"></div>
  <div class="isi row">
    <div class="col-md">
      <?php foreach ($posts as $row): ?>
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4 text-center">
              <img width="280" src="https://i.ytimg.com/vi/<?= $row['thumb_id']; ?>/hqdefault.jpg" alt="">
            </div>
            <div class="col-md-8 bg-light">
              <div class="card-body">
                <h5 class="card-title"><a href="v?post=<?= $row['thumb_id']; ?>"><?= $row['judulLagu']; ?></a></h5>
                <textarea class="form-control" readonly style="width: 100%; height: 40px;"><?= $row['description']; ?></textarea>
                <p class="card-text"><small class="text-muted">Upload By : <span class="badge bg-secondary"><a class="text-white" href="@" style="text-transform: capitalize;"><?= $row['upBy']; ?></a></span></small></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="col-md-4 side">

      <?php if ( isset($_SESSION['username']) ): ?>
        <?php  

        $zaw = $magic->get("user", "name", $_SESSION['username']);
        $zaw = $zaw[0];
        ?>
        <div class="card">
          <div class="label bg-light" style="border-bottom: 1px solid grey;">
            <div class="judulL card-body" style="padding-bottom: 0;">
              <h5>Player Info</h5>
            </div>
          </div>
          <div class="card-body" style="padding-top: 0;">
            <table class="table table-striped">
              <tr>
                <th>Nama </th>
                <td>: <span style="text-transform: capitalize;"><?= $zaw['name']; ?></span></td>
              </tr>
              <tr>
                <th>Email</th>
                <td>: <?= $zaw['email']; ?></td>
              </tr>
              <tr>
                <th>Aksi</th>
                <td>: <a href="dashboard" class="btn btn-sm btn-outline-success">DASHBOARD</a></td>
              </tr>
              <tr>
                <th style="position: absolute;">Bio</th>
                <td><textarea readonly class="form-control" style="margin: 5px 0 0 5px; width: 100%;"><?= $zaw['bio']; ?></textarea></td>
              </tr>
            </table>
          </div>
        </div>
      <?php endif ?>

      <div class="card">
        <div class="label bg-light" style="border-bottom: 1px solid grey;">
          <div class="judulL card-body" style="padding-bottom: 0;">
            <h5>Label</h5>
          </div>
        </div>
        <div class="card-body" style="padding-top: 0;">
          lorem ipsum dolor sit memet
        </div>
      </div>
    </div>
  </div>


</div>













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>