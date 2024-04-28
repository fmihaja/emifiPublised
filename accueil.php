<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="./assets/js/color-modes.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Font-Awesome-Offline-Quick-Icon-Search-master/css/all.min.css" rel="stylesheet">
    <link href="./bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="list-groups.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    
    <!-- initiation svg logo reseaux sociaux -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Bootstrap</title>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
      </symbol>
      <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
      </symbol>
      <symbol id="instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
      </symbol>
      <symbol id="twitter" viewBox="0 0 16 16">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
      </symbol>
    </svg>
    <!-- fin initiation svg logo asina icone -->
    <nav class="navbar bg-body-tertiary navSticky" aria-label="Light offcanvas navbar">
        <div class="container-fluid">
          <a class="navbar-brand">
            <span class="h3 e">E</span><span class="h5 mifi">MIFI</span><span class="h3" style="margin-left:5px"><i class="fas fa-headphones-alt"></i></span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">Menus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item listMenu">
                  <a class="nav-link active" aria-current="page" href="#"><span class="h3" style="margin-right:5px"><i class="far fa-user-circle"></i></span><?=$_SESSION["user"]["nom"]?></a>
                </li>
                <li class="nav-item listMenu">
                  <span class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">Liste Music</span>
                </li>
                <li class="nav-item dropdown listMenu">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reglage
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Modifier profil</a></li>
                    <li><a class="dropdown-item" href="#">Envoyez un feedback</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Deconnexion</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- footer -->
              <div class="b-example-divider"></div>
              <div class="container">
                <h3>Contact us:</h3>
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                  <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2024 emifi, Inc</span>
                  </div>
                  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                  </ul>
                </footer>
              </div>
              <div class="b-example-divider"></div>
            <!-- fin footer -->
          </div>
        </div>
      </nav>
    <p class="display-4 titre">Chansons récente:</p>
    <div class="container">
        <div class="row containerMusic" id="affichageChansons">
            
        </div>
    </div>
    <p class="display-4 titre">Chansons adorer:</p>
    <div class="container">
        <div class="row containerMusic">
            <div class="col">
              <div class="card">
                <img src="./icone/audio.svg" alt="" class="bd-placeholder-img card-img-top posMargIcoMusic" width="100%" height="180" >
                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> -->
                <div class="card-body">
                  <h5 class="card-title">Titre 1</h5>
                  <div class="btn btn-primary btnLiker">
                    <img src="./icone/adore1.svg" alt="" class="tailleReaction">
                  </div>
                  <!-- <div class="btn btn-primary btnDisliker">Go somewhere</div> -->

                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="./icone/audio.svg" alt="" class="bd-placeholder-img card-img-top posMargIcoMusic" width="100%" height="180" >
                <div class="card-body">
                  <h5 class="card-title">Titre 2</h5>
                  <div class="btn btn-primary btnLiker">
                    <img src="./icone/adore1.svg" alt="" class="tailleReaction">
                  </div>
                  <!-- <div class="btn btn-primary btnDisliker">Go somewhere</div> -->

                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="./icone/audio.svg" alt="" class="bd-placeholder-img card-img-top posMargIcoMusic" width="100%" height="180" >
                <div class="card-body">
                  <h5 class="card-title titre">Titre 3</h5>
                  <div class="btn btn-primary btnLiker">
                    <img src="./icone/adore1.svg" alt="" class="tailleReaction">
                  </div>
                  <!-- <div class="btn btn-primary btnDisliker">Go somewhere</div> -->

                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="./icone/audio.svg" alt="" class="bd-placeholder-img card-img-top posMargIcoMusic" width="100%" height="180" >
                <div class="card-body">
                  <h5 class="card-title">Titre 4</h5>
                  <div class="btn btn-primary btnLiker">
                    <img src="./icone/adore1.svg" alt="" class="tailleReaction">
                  </div>
                  <!-- <div class="btn btn-primary btnDisliker">Go somewhere</div> -->

                </div>
              </div>
            </div>
        </div>
    </div>
    <br>
    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Liste music</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="container">
                <div class="row">
                    <form class="col-md-8" role="search">
                      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
                    <div class="col-md-2">
                      <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Filtrage
                        </button>
                        <ul class="dropdown-menu">
                          <li><h6 class="dropdown-header">Choisir filtre</h6></li>
                          <li><a class="dropdown-item" href="#">Adorer</a></li>
                          <li><a class="dropdown-item" href="#">Aucun</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
              </div>
              <div class="container infosMusic">
                <div class="row">
                  <p class="h3 titreMusicLecture">Titre 1</p>
                </div>
                <div class="row">
                    <input type="range" class="form-range" name="" id="">
                </div>
                <div class="row controlMusic">
                  <div class="col-md-2">
                    <img src="./icone/preview.svg" alt="" class="tailleControl">
                  </div>
                  <div class="col-md-2">
                    <img src="./icone/play.svg" alt="" class="tailleControl">
                  </div>
                  <div class="col-md-2">
                    <img src="./icone/next.svg" alt="" class="tailleControl">
                  </div>
                </div>
              </div>   
              <div class="row">
                <div class="col">
                  <div class="list-group list-group-checkable d-grid gap-2 border-0">
                    <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios1" value="" checked>
                    <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">
                      First radio
                      <span class="d-block small opacity-50">With support text underneath to add more detail</span>
                    </label>
                
                    <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios2" value="">
                    <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios2">
                      Second radio
                      <span class="d-block small opacity-50">Some other text goes here</span>
                    </label>
                
                    <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios4" value="">
                    <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios4">
                      Third radio
                      <span class="d-block small opacity-50">And we end with another snippet of text</span>
                    </label>
                
                    <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios5" value="">
                    <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios5">
                      Third radio
                      <span class="d-block small opacity-50">And we end with another snippet of text</span>
                    </label>
                    <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios6" value="">
                    <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios6">
                      Third radio
                      <span class="d-block small opacity-50">And we end with another snippet of text</span>
                    </label>
                  </div>
                </div>

          </div>
            </div>
          </div>
          <div class="container">
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div> 
  <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/jquery-3.7.1.js"></script>
  <script type="module" src="./js/A_affichageMusic.js"></script>
</body>
</html>