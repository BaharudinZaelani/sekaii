
<?php  
require_once "../app/Magic.php";
session_start();
if ( !isset($_SESSION['username']) ) {
  header('Location: ../');
}
// echo  date("Y/m/d");

require_once "view/header.php";
$magic = new Magic();
$posts = $magic->getAll('posts');
if ( isset($_POST['upload']) ) {
  $judulLagu = $_POST['judulLagu'];
  $ytLink = $_POST['ytLink'];
  $lirik = htmlentities($_POST['lirik']);
  $desc = $_POST['desc'];
  
  $add = $magic->addToDb($judulLagu, $_SESSION['username'], $ytLink, $lirik, date("Y/m/d"), $desc);
}

// if ( isset($_SESSION['addToDb']) ) {
//   echo "<script>
//             alert('Masukan link YT yang benar !')
//           </script>";
//   $_SESSION['addToDb'] = false;
// }
if ( isset($_POST['zawSatu']) ) {
  $_SESSION['addToDb'] = false;
  // echo"zaw";
}
if ( isset($_POST['zawDua']) ) {
  $_SESSION['duplicate_item'] = false;
  // echo"zaw";
}
// var_dump($_SESSION['addToDb']);


?>
<div class="row dashboard">
  <div class="col-2 sidebar bg-dark" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <!-- head -->
    <nav class="navbar shadow navbar-dark bg-dark">
      <div class="container-fluid">
        <span class="navbar-brand m-auto mb-0 h1" style="text-transform: uppercase;"><?= $_SESSION['username']; ?></span>
      </div>
    </nav>

    <!-- profil litle info -->

    <div class="list-tools">
      <div class="list-group list-group-flush">
        <a href="#" data-bs-toggle="modal" data-bs-target="#uploadlirik" class="list-group-item list-group-item-action">Upload Lirik</a>
        <!-- <a href="#" class="list-group-item list-group-item-action">Add Group</a> -->
      </div>
    </div>
  </div>
  <div class="col">
    <!-- nav kanan -->
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        
        <div class="" id="navbarNavAltMarkup">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item navBtn" style="display: none;">
              <button class="btn btn-outline-secondary btn-sm"  aria-controls="offcanvasExample" data-bs-target="#offcanvasExample" data-bs-toggle="offcanvas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg></button>
            </li>
            <li class="nav-item dropdown profile-setting">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Drop me
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profile Setting</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>


      </div>
    </nav>
    <!-- content -->
    <div class="p-2"></div>
    <div class="isi container-fluid">
      <!-- atas -->
      <div class="row">
        <div class="col-md">
          <h4>Dashboard</h4>
          <hr>
          <!-- content -->
          <?php foreach ($posts as $row): ?>
            
          <div class="card mt-3">
            <div class="card-header">
              <?= $row['judulLagu'] ?>
            </div>
            <div class="card-body">
              <button id="<?= $row['thumb_id']; ?>" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#post" show="<?= $row['thumb_id']; ?>" judul="<?= $row['judulLagu'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
              </button>
              <button data-hapus-titile="<?= $row['judulLagu']; ?>" data-bs-toggle="modal" data-bs-target="#hapusModal" name="hapus" class="btn btn-light btn-sm" id="hapus<?= $row['thumb_id'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </button>
              
            </div>
          </div>

          <script type="text/javascript">
            $('#<?= $row['thumb_id'] ?>').click(function(){
              // Ambil data
              var ambilVal = $(this).attr('show');
              var ambilTitle = $(this).attr('judul');

              // DOM
              $('#frameShow').html('<iframe style="width: 100%; height: 100vh;" src="http://localhost/akulirik/v/?post=' + ambilVal + '&dashboard=<?= $_SESSION['username']; ?>"></iframe>');
              $('#titleShow').html(ambilTitle);
            });

            $('#hapus<?= $row['thumb_id']; ?>').click(function(){
              // Ambil data Element.setAttribute(name, value);
              var titleHapus = $(this).attr('data-hapus-titile');
              document.getElementById("hapusTitle").innerHTML = titleHapus;
              document.getElementById("buttonHapus").setAttribute('href', 'hapus.php?id=<?= $row['id'] ?>');
              // DOM
              // $('#frameShow').html('<iframe style="width: 100%; height: 100vh;" src="http://localhost/akulirik/v/?post=' + ambilVal + '&dashboard=<?= $_SESSION['username']; ?>"></iframe>');
            });            
          </script>

          <?php endforeach ?>

          

        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="label bg-light" style="border-bottom: 1px solid grey;">
              <div class="judulL card-body" style="padding-bottom: 0;">
                <h5>ALERT !</h5>
              </div>
            </div>
            <?php if ( isset($_SESSION['addToDb']) ): ?>
              <?php if ( $_SESSION['addToDb'] == true ): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <div>
                    <strong>Upload Lirik gagal :</strong> link salah !
                  </div>
                  <form method="post">
                  <button type="submit" name="zawSatu" class="btn-close" aria-label="Close"></button>
                  </form>
                </div>
              <?php endif ?>
            <?php endif ?>

            <?php if ( isset($_SESSION['duplicate_item']) ): ?>
              <?php if ( $_SESSION['duplicate_item'] == true ): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <div>
                    <strong>Upload Lirik gagal :</strong> Duplicate Item !
                  </div>
                  <form method="post">
                  <button type="submit" name="zawDua" class="btn-close" aria-label="Close"></button>
                  </form>
                </div>
              <?php endif ?>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- upload lirik modal -->
<div class="modal fade" id="uploadlirik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Upload Lirik</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md">
              <div class="form-floating mb-3">
                <input name="judulLagu" type="text" class="form-control" id="floatingInput" placeholder="Nama Lagu">
                <label for="floatingInput">Judul Lagu</label>
              </div>
            </div>

            <div class="col-md">
              <div class="form-floating mb-3">
                <input type="text" name="ytLink" class="form-control" id="ytlink" placeholder="Nama Lagu">
                <label for="ytlink">Youtube Link</label>
              </div>
            </div>

            <div class="col-md">
              <div class="form-floating mb-3">
                <input type="text" name="desc" class="form-control" id="desc" placeholder="Nama Lagu">
                <label for="desc">Deskripsi</label>
              </div>
            </div>
          </div>
          <hr>
          <div>
            pisahkan setiap paragraf lirik dengan " , " !
          </div>
          <div class="form-floating">
            <textarea style="height: 30vh;" class="form-control" name="lirik" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Lirik</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="upload" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- lihat posts -->
<div class="modal fade" id="post" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Show : <span id="titleShow"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="height: auto;">
        <div id="frameShow"></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<!-- hapus -->
<div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">Yakin ingin menghapus item " <span id="hapusTitle"></span> " ?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a id="buttonHapus" class="btn btn-danger">OKE HAPUS AJA !</a>
      </div>
    </div>
  </div>
</div>
<?php require_once "view/footer.php"; ?>