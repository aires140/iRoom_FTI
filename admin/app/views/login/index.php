
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <!-- css style -->
    <style>
        body {
          height: 100%;
        }
        .global-container {
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #0d6efd;
        }
        .card.login-form {
          border: 0;
          width: 80%;
          padding: 25px;
          background: #ffffff;
          border-radius: 20px;
          box-shadow: 3px;
        }
        p {
          color: #73a0e2;
          border: 3px;
          text-align: center;

        }
        input[type="text"],
        input[type="password"] {
          background: rgb(197, 215, 231);
          color: #0d6efd;
          border: 2px solid;
          border-color: rgb(197, 215, 231);
          border-radius: 10px;
          margin-bottom: 15px;
        }
        .card-title {
          font-weight: 900;
          padding-top: 15px;
          align-items: center;
          color: #0d6efd;
        }
        h1,
        .card-title {
          text-decoration: underline;
        }
        .d-grid.gap-2 button{
          background: #0d6efd;
          color: #ffffff;
          font-weight: 500;
          border-width: 2px;
          border-radius: 9px;
        }
        .d-grid.gap-2 button:hover{
          background: rgb(197, 215, 231);
          color: white;
        }
        .create {
          text-align: center;
          padding-bottom: 5px;
        }
        img {
          width: 30%;
          
        }

        @media (min-width: 500px) {
          .card.login-form {
          width: 400px;
        }
        }
    </style>
    

    <title>Masuk</title>
  </head>
  <body> 
    <div class="global-container "> 
      <div class="card login-form position-absolute top-50 start-50 translate-middle shadow">
        <div class="card-body ">
          <center><img src="img/iroom.png" alt=""></center>
          <h4 class="card-title text-center" style="text-decoration: none;">iRoom</h4>
          <p>Hallo <b>Admin!</b> Silahkan isi data berikut untuk masuk</p>
        </div>     

        <div class="card-text">  
          <div style="padding-bottom: -4px">
            <?php Flasher::flash(); ?>
          </div>
          <form action="<?= BASEURL; ?>Login/log" method="post">
            <div class="md-3">
              <label for="nama" class="form-label">Username</label>
              <input type="text" class="form-control" name="nama" id="nama" required/>
            </div>
            <div class="md-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" required/>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="login" id="login" class="btn btn-light">Masuk</button>
            </div>
          </form>

        <div class="create" style="color: #73a0e2;">
          <br>Anda belum memiliki akun?<br>
          <i>Silahkan mendaftar ke admin</i>
        </div>
      </div>
    </div>

  </body>
</html>

