<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
      body {
        min-height: 1000px;
      }
      .jumbotron {
        padding-top: 10rem;
        background-color: rgb(197, 215, 231);
      }
      #contact {
        background-color: rgb(197, 215, 231);
      }
      footer a {
        text-decoration: none;
      }
      footer a,
      a:visited {
        text-shadow: 2rem;
      }
      .content {
        padding-top: 12rem;
      }
      footer {
        padding-bottom: 0;
      }

    </style>

    <title>Introduce</title>
  </head>
  <body id="home">
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark shadow bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logounibba.png" alt="unibba" width="35" /> | unibba</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#galery">Galery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#home">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->

    <!-- Jumbotron (bagian logo tengah) -->
    <div class="jumbotron text-center">
      <img src="img/ftiunibba.png" alt="unibba" width="150" />
      <h1 class="display">Fakultas Teknologi Informasi <br>Universitas Bale Bandung</h1>
      <p class="lead">Menejemen ruangan | Aplikasi Web</p><br><br>

      <!-- button -->
      <a class="btn btn-outline-primary"  role="button" href="user/index.php">Mulai</a>

      <!-- end button -->

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,96L48,128C96,160,192,224,288,229.3C384,235,480,181,576,144C672,107,768,85,864,90.7C960,96,1056,128,1152,122.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </div>
    <!-- end Jumbotron -->

    <center>
      <div class="container"><br>
        <img src="img/iroom.png" alt="iroom" width="160px">
      </div>
    </center><br><br>

    <!-- about -->
    <div class="content" id="about">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-4 mb-3">
            <p>
              Aplikasi ini adalah aplikasi yang berguna untuk mempermudah dosen atau mahasiswa dalam mengakses informasi ketersediaan ruang kelas untuk dipakai aktivitas perkuliahan. 
            </p>
          </div>
          <div class="col-md-4 mb-3">
            <p>
              Terbatasnya ketersediaan ruang kelas dengan jumlah kelas yang cukup banyak menjadi pemicu kurang efisiennya waktu yang digunakan oleh dosen ataupun mahasiswa disebabkan terpotong untuk mencari ruang kelas yang kosong.
            </p>
          </div>
        </div>
      </div>
      <br><br>
    </div>
      
      <!-- card image -->
      <div class="content" id="galery">
        <div class="container">
          <div class="row text-center mb-4">
            <div class="col">
              <h2>Galery</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="img/ruangan1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Lab komputer Teknik Informatika</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="img/ruangan1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Lab komputer Teknik Informatika</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="img/ruangan1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Lab komputer Teknik Informatika</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- end card image -->


    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,96L60,85.3C120,75,240,53,360,80C480,107,600,181,720,192C840,203,960,149,1080,128C1200,107,1320,117,1380,122.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

    <!-- footer -->
    <footer class="bg-primary text-white text-center pb-3">
      <p>Our Media: <br>
        <a href="https://fti.unibba.ac.id/" class="text-white fw-bold">
          www.fti.unibba.ac.id | 
        </a>
        <a href="fti@unibba.ac.id" class="text-white fw-bold"><i class="bi bi-envelope-paper"></i> fti@unibba.ac.id |</a>
        <a href="tel:0225943106" class="text-white fw-bold"><i class="bi bi-telephone"></i> 0225943106</a>
      <br><br>
      Created by: 
      <a href="https://www.instagram.com/aires_140/?hl=id"class="text-white fw-bold">Airesnawati</a>
    </p>
      
    </footer>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

