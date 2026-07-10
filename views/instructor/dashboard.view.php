<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  

  <?php require base_path('views/partials/nav.php') ?>

  <div class="container mt-5">
    <main>
      <div class="row mb-5">
            <div class="col-lg-4 col-md-6 col-sm-12 mt-0">
                <div class="card text-center">
                    <div class="card-header fw-bold fs-5  text-white" style="background-color: rgb(255, 180, 100);">
                        الاختبارات
                    </div>
                     <div class="card-body d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-clipboard-list fa-xl" style="color: rgb(255, 180, 100);"></i>
                        <p class="card-text fw-bold fs-4 ms-4"><?= $examCount ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-0">
                <div class="card text-center">
                    <div class="card-header fw-bold fs-5 text-white" style="background-color: rgb(99, 230, 190);">

                        عدد الطلاب
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users fa-xl" style="color: rgb(99, 230, 190);"></i>
                        <p class="card-text fw-bold fs-4 ms-4"><?= $studentCount ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-0">
                <div class="card text-center">
                    <div class="card-header fw-bold fs-5 text-white" style="background-color: rgb(116, 192, 252);">

                        عدد المساقات
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book-open fa-xl" style="color: rgb(116, 192, 252);"></i>
                        <p class="card-text fw-bold fs-4 ms-4"><?= $courseCount ?></p>
                    </div>
                </div>
            </div>
      </div>
      <div class="mb-5">
        <h3 class="p-3 fw-bold text-black-50 border-bottom border-top">مساقاتي</h3>
      </div>  
      <div class="row justify-content-center g-4">
            <?php foreach($courses as $course) : ?>
                <div class="col-lg-4 main-course-instructor" data-instructor-course="<?= $course['id']?>">
                <div class="card my-course mb-3 rounded-top rounded-bottom-0 shadow-sm position-relative">
                    <div class="card-body">
                            <h4 class="card-title border-bottom text-primary mb-3 p-2 fw-bold"><?= $course['course_name'] ?></h4>
                            <p class="p-1 "> الفصل الدراسي: <span class="fw-bold"><?= explode(' ', $course['semster_name'])[2] ?></span></p>
                            <p class="p-1"> المستوى الدراسي: <span class="fw-bold"><?= course_years()[$course['level_year']] ?></span></p>
                            <p class="p-1"> عدد الطلاب: <span class="text-primary fs-5 fw-bold"><?= $course['student_count'] ?></span></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <p class="mt-5 mx-auto d-flex justify-content-center">
                <a href="/logout"  class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">الخروج</a> 
            </p>
     </div>     
   </main>
  </div>

 <?php require base_path('views/partials/footer.php') ?>
 