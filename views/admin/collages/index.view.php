<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
        <main>
            <div class="album py-5">
              <div class="container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
                   <?php foreach($collages as $collage) : ?>
                    <div class="col mb-4">
                      <div class="card collages-box overflow-hidden">
                        <img class="w-100 rounded-top" src="assets/imgs/<?= $collage['img'] ?>" alt="collage-image">
                        <div class="card-body"> 
                            <h3 class="lh-base fs-6 fw-bold text-primary"><?= $collage['name'] ?></h3>
                            <div class="mt-4 d-flex justify-content-between align-items-center">
                              <div class="btn-group"> 
                                <a href="/collage?id=<?= $collage['id'] ?>" class="btn btn-sm btn-outline-primary">عرض</a> 
                              </div> 
                              <small class="date text-body-secondary"><?= date("Y/m/j", strtotime($collage['created_at'])) ?></small> 
                            </div> 
                        </div> 
                      </div> 
                    </div>  
                      <?php endforeach ?>
                    </div>  
                    <p class="mt-5 mx-auto d-flex justify-content-center">
                       <a href="/collage/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">انشاء كلية</a> 
                    </p>
              </div> 
            </div> 
        </main>  

<?php require base_path('views/partials/footer.php') ?>





