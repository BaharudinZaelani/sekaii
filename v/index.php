<?php  
require_once "../app/Magic.php";
require_once "header.php";

if ( isset($_GET['dashboard']) ) {
  $dashboard = true;
}

$zaw = new Magic();
$v = $zaw->get("posts", "thumb_id", $_GET['post']);
$v = $v[0];
if ( !isset($_GET['post']) ) {
  header("Location: ../");
}else {
  $cek = $zaw->cek("posts", "thumb_id", $_GET['post']);
  if ( $cek == null ) {
    header("Location: ../");
  }
}
?>
<style type="text/css">
  @media ( min-width: 640px ){ 
    .container {
      max-width: 100%;
      padding: 0;
    }
    .sticky-top {
      position: unset !important;
    }
  }
</style>

<!-- mulai -->
<div class="container">
  <!-- As a heading -->
  <?php if ( !isset($dashboard) ): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="../">AkuLirik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="../">Home</a>
            <a class="nav-link" href="../list">Lagu List</a>
          </div>
        </div>
      </div>
    </nav>
  <?php endif ?>
  

  <!-- content -->
  <div class="mt-3"></div>
  <div class="row">
    <div class="col-md sticky-top">
      <div class="anime-sekai">
        <div class="content">
          <iframe class="yt-embed" src="https://www.youtube.com/embed/<?= $v['thumb_id'] ?>"></iframe>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="label bg-light" style="border-bottom: 1px solid grey;">
          <div class="judulL card-body" style="padding-bottom: 0;">
            <h5>Lirik : <?= $v['judulLagu']; ?></h5>
          </div>
        </div>
        <div class="card-body" style="padding-top: 0; height: 80vh; overflow: auto;">
          <?= $v['lirik']; ?>
        </div>
      </div>
    </div>
  </div>
</div>











<!-- Button trigger modal video -->
<!-- <span>Video preview</span><br>
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Show Video
</button> -->

<!-- video -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Video Embed Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="video-view">
          <iframe class="yt-embed" src="https://www.youtube.com/embed/f4sTRkuhUSo"></iframe>
          <div class="load">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
        <div class="v-info">
          <table class="table table-striped">
            <tr>
              <th>ID Video</th>
              <td>: f4sTRkuhUSo</td>
            </tr>
            <tr>
              <th>FP : TheZaww</th>
              <td>: Kalian engga tau kalau robin adalah vvaifu yg ara-ara</td>
            </tr>
            <tr>
              <th>Link YT</th>
              <td>: <a href="https://www.youtube.com/watch/f4sTRkuhUSo">https://www.youtube.com/watch/f4sTRkuhUSo</a></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<?php require_once "footer.php" ?>