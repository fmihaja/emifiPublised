<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="./assets/js/color-modes.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Font-Awesome-Offline-Quick-Icon-Search-master/css/all.min.css" rel="stylesheet">
    <link href="./bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="list-groups.css" rel="stylesheet"> -->
    <link href="./style.css" rel="stylesheet">
    <title>Document</title>
</head>
    <body>
      <div class="container">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Bienvenu sur <span class="display-2 fw-bold lh-1 mb-3 e">E</span><span class="display-4 fw-bold lh-1 mb-3 mifi">MIFI</span><span class="display-3" style="margin-left:5px"><i class="fas fa-headphones-alt"></i></span></h1>
            
            <p class="col-lg-10 fs-4">
              <img src="./img/inscription.jpg" alt="" class="tailleImg">
            </p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <!-- <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="post" action=""> -->
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" id="signUp" method="post" action="./accueil.php">
              <div class="form-floating mb-3">
                <input type="text" maxlength="25" id="nom" class="form-control" name="nom" id="floatingName" placeholder="Nom">
                <label for="floatingName">Nom</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" maxlength="10"  id="iTel" name="iTel" class="form-control" id="floatingInput" placeholder="Entrez votre téléphone">
                <label for="floatingInput">Numero téléphone</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" maxlength="50" id="iEmail" name="iEmail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="iMdp" name="iMdp" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                <label for="floatingPassword">Mot de passe</label>
              </div>
              <button id="btnSubmit" class="w-100 btn btn-lg btn-primary" type="">
                <span id="valueBtnSubmit">S'inscrire</span>
                <div class="spinner-border text-light" role="status" id="loadSignUp">
                    <span class="visually-hidden">Loading...</span>
                </div>
              </button>
              <a href="#" id="switchLogin">Se connecter</a>
              <hr class="my-4">
              <small class="text-body-secondary">On appuyant sur s'inscrire vous acceptez nos termes et conditions</small>
            </form>
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" id="login"  method="post" action="./accueil.php">
              <div class="form-floating mb-3">
                <input type="email" maxlength="50" id="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email ou téléphone</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="mdp" name="mdp" class="form-control" id="floatingPassword" placeholder="Entrez votre mot de passe">
                <label for="floatingPassword">Mot de passe</label>
              </div>
              <button id="btnSubmitLogin" class="w-100 btn btn-lg btn-primary" type="">
                <span id="valueBtnSubmitLogin">Se connecter</span>
                <div class="spinner-border text-light" role="status" id="loadLogin">
                    <span class="visually-hidden">Loading...</span>
                </div>
              </button>
              <a href="#" id="switchSignUp">S'inscrire</a>
              <hr class="my-4">
              <small class="text-body-secondary">On appuyant sur se connecter vous acceptez nos termes et conditions</small>
            </form>
          </div>
        </div>
      </div>
    <script src="./js/jquery-3.7.1.js"></script>
    <script type="module" src="./js/A_verificationInscription.js"></script>  
    <!-- <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> -->
    </body>
</html>