<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <main>
              <div class="container py-5">
                      <div class="collage-card my-0 mx-auto card shadow-sm overflow-hidden">
                        <img class="w-100 rounded-top" src="assets/imgs/<?= $collage['img'] ?>" alt="">
                        <div class="card-body"> 
                            <h3 class="mb-4 lh-base fs-5 fw-bold text-primary"> <?= $collage['name'] ?></h3>
                            <div class="d-flex justify-content-between align-items-center">
                               <div class="btn-group"> 
                                 <a href="/collages" class="btn btn-sm btn-outline-secondary">العودة</a> 
                                 <a href="/collage/edit?id=<?= $collage['id'] ?>" class="btn btn-sm btn-outline-primary">تعديل</a> 
                                </div> 
                                <small class="text-body-secondary ms-3"><?= date("Y/m/j", strtotime($collage['created_at'])) ?></small> 
                            </div> 
                        </div> 
                      </div>   
                </div> 
              
        </main> 


<?php require base_path('views/partials/footer.php') ?>