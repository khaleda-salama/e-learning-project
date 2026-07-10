<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
 <main>
   <div class="container py-5">
         <div class="major-card card my-0 mx-auto overflow-hidden p-0 shadow-sm">
          <img src="assets/imgs/<?= $major['img'] ?>" class="w-100 rounded-top" alt="major-image">
          <div class="card-body">
              <h3 class="card-title mb-2 p-2 fs-5 fw-bold text-primary"><?= $major['name'] ?></h3>
              <p class="card-text text-black lh-base"><?= $major['overview'] ?></p>
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="btn-group"> 
                   <a href="/majors" class="btn btn-sm btn-outline-secondary">العودة</a> 
                   <a href="/major/edit?id=<?= $major['id'] ?>"  class="btn btn-sm btn-outline-primary">تعديل</a> 
                 </div> 
                 <h6 class="card-subtitle text-black-50 text-decoration-underline"><mark><?= $major['collage_name'] ?></mark></h6>
              </div>
           </div>
          </div>
   </div>          
</main>  



<?php require base_path('views/partials/footer.php') ?>