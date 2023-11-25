<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <nav class="shadow p-3 mb-5 bg-white rounded">
    <div class="nav-content" id="logo"><img src="../assets/icons/CollabSpot-removebg-preview.png" width="150px" height="150px"></div>
    <div class="nav-content" id="barre-rech"> <input class="form-control me-2" type="search" placeholder="Chercher un étudiant..." aria-label="Search" id="search_etud"></div>
    <div class="nav-content" id="icons">
    <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div><img src="../assets/icons/bell-fill.svg"></div>
          </a>
          <ul class="dropdown-menu" style="width:600px;">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
</div>


      <div><img src="../assets/icons/list.svg"></div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div><img src="../assets/icons/envelope-fill.svg"></div>
          </a>
          <ul class="dropdown-menu" style="width:600px;">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
</div>
       
    </div>
  </nav>
  <div class="friends-search ">
    <?php if (isset($friends)) :
      foreach ($friends as $key) :
    ?>
        <div class="card" style="height: 12rem;">
          <img src="<?= $key['img'] ?>">
          <span><?= $key['nom'] . ' ' . $key['prenom'] ?></span>
        </div>
    <?php
      endforeach;
    endif;
    ?>
  </div>
  <section>
    <div class="inner-section shadow p-3 mb-5 bg-white rounded" id="user">
      <img src="../assets/icons/profile1.png"><span>User name</span>
    </div>
    <div class="inner-section  shadow p-3 mb-5 bg-white rounded" id="user-section">
      <div id="amis" class="card">
        <div><img class="prfile-picture" src="../assets/icons/profile2.png"></div>
        <div><img class="prfile-picture" src="../assets/icons/profile1.png"></div>
        <div><img class="prfile-picture" src="../assets/icons/profile3.png"></div>
        <div><img class="prfile-picture" src="../assets/icons/profile4.png"></div>
        <div><img class="prfile-picture" src="../assets/icons/profile5.png"></div>
        <div><img class="prfile-picture" src="../assets/icons/profile1.png"></div>

        <img id="arrow" src="../assets/icons/arrow-right-circle.svg">
      </div>
      <div id="publication" class="card">



        <div id="page-content1">

          <img id="user-profile" class="profile-picture" width="80px" height="80px" src="../assets/icons/profile2.png">

          <div id="input">
            <input class="form-control me-2" type="search" placeholder="What's new Akram..." aria-label="Search">
          </div>
        </div>
        <div id="page-content2">
          <div class="image-profile"><img src="../assets/icons/camera-reels.svg" alt=""> <span>Video</span></div>
          <div class="image-profile"><img src="../assets/icons/images.svg" alt=""><span>Image </span></div>
          <div class="image-profile"><img src="../assets/icons/calendar-event.svg" alt="">Event<span></span></div>
        </div>




      </div>
      <div id="page" class="card">
        <div>

        </div>
        <div></div>
      </div>
    </div>
    <div class="inner-section  shadow p-3 mb-5 bg-white rounded" id="notifications">
      <span><b>Friends</b></span>
    </div>

  </section>
</body>

</html>