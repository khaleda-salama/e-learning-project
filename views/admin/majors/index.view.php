<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
 <main>
   <div class="container py-5">
    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
     <?php foreach($majors as $major) : ?>
       <div class="col">
         <div class="major-card card overflow-hidden p-0 shadow-sm mb-4">
          <img src="/assets/imgs/<?= $major['img'] ?>" class="major-img w-100 rounded-top" alt="major-image">
          <div class="card-body">
              <h3 class="card-title mb-2 p-2 fs-5 fw-bold text-primary"><?= $major['name'] ?></h3>
              <p class="overview card-text text-black fs-6 ms-3"><?= $major['overview'] ?></p>
              <div class="d-flex justify-content-between align-items-center mt-4">
                  <a href="/major?id=<?= $major['id'] ?>"  class="btn btn-sm btn-outline-primary">عرض</a>      
                  <h6 class="collage-name card-subtitle text-black-50 text-decoration-underline"><mark><?= $major['collage_name'] ?></mark></h6>
              </div>
           </div>
          </div>
        </div>
       <?php endforeach; ?>
       </div>
       <p class="mt-5 mx-auto d-flex justify-content-center">
         <a href="/major/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">انشاء التخصص</a> 
       </p>
   </div>     

      
</main>  



<?php require base_path('views/partials/footer.php') ?>

