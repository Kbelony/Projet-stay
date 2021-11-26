<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <title>Login</title>
</head>
<body>   
    <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/index.html">
        <img src="/images/logo (1).png" alt="" />
      </a>
    </div>
  </nav>
  <!-- Ending navbar -->
    <form action="login.php" method="post">
        <div class="modal-dialog">
      
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                    <label for="login-name" class="col-form-label">Login:</label>
                    <input type="text" class="form-control" id="login-name" name="lastname"/>
                    </div>
                    <div class="mb-3">
                    <label for="message-text" class="col-form-label">Mot de passe:</label>
                    <input type="password" class="form-control" id="login-name" name="password" />
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button submit" class="btn btn-primary">Connexion</button>
                </div>
            </div>
        </div>
    </form>
        <!-- Starting footer-->
        <footer>
      <hr>
      <center>
        <p><b> © 2021 DonkeyStay</b></p>
      </center>
      <!-- Starting legal mention modal-->
      <!-- Button trigger modal -->
      <p type="text" class="mention_légales" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Mention légales
      </p>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Mention légales</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Ces mentions légales sont à distinguer des conditions générales de vente (CGV) également obligatoires sur les sites e-commerce, mais également des conditions générales d’utilisation (CGU – conseillées mais non obligatoires) dans lesquelles elles peuvent cependant être intégrées.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </footer>
     <!-- Ending footer-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>
</html>