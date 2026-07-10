<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">

  <?php require base_path('views/partials/nav.php') ?>
 <main>
   <div class="container py-5">
      <h5 class="mb-5 fs-3 text-black-50 border-bottom pb-3 px-1">استعراض مساقتي الدراسية</h5>
    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
     <?php foreach($myCourses as $Mycourse) : ?>
       <div class="col">
         <div class="card overflow-hidden p-0 shadow-sm mb-4">
          <img src="/assets/imgs/course-background.svg" class="major-img w-100 rounded-top"  style="height: 250px;" alt="course-image">
          <div class="card-body">
              <h3 class="card-title mb-2 p-2 fs-5 fw-bold text-primary"><?= $Mycourse['name'] ?></h3>
              <h3 class="card-title mb-2 p-2 fs-5 fw-bold text-black-50"><?= $Mycourse['major_name'] ?></h3>
              <div class="d-flex justify-content-end align-items-center mt-4">
                  <a href="/student/my/courses?id=<?= $Mycourse['course_id'] ?>"  class="btn btn-sm btn-outline-primary">عرض</a>      
              </div>
           </div>
          </div>
        </div>
       <?php endforeach; ?>
       </div>
       <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
         <a href="/student/courses/major" class="btn btn-primary fs-6"> تسجيل المساقات</a>
         <a href="/logout"  class="btn btn-secondary btn-sm m-3 fs-6 fw-bold">الخروج</a> 
       </div>
   </div>     

      
</main>  



<?php require base_path('views/partials/footer.php') ?>

