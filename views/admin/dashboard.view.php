<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  
  <?php if(Core\Session::has('userRegistered')): ?>
    <div class="message alert alert-success d-flex align-items-center">
      <i class="fa-solid fa-circle-check me-2"></i>
      <div>
        <?= Core\Session::get('userRegistered') ?>
      </div>
    </div>
  <?php endif; ?>
   
  <?php if(Core\Session::has('userExist')): ?>
    <div class="message alert alert-primary d-flex align-items-center">
      <i class="fa-solid fa-circle-exclamation me-2"></i>
      <div>
        <?= Core\Session::get('userExist') ?>
      </div>
    </div>
  <?php endif; ?>

  <?php require base_path('views/partials/nav.php') ?>

  <div class="container-fluid mt-5">
    <div class="row">
      <aside class="col-md-3 pe-4">
        <div class="card sidebar">
          <div class="card-body">
            <h5 class="card-title text-primary mb-2 py-2 px-0 fw-bold">القائمة</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item py-3 px-2 list-item" data-link="/admin/dashboard">
                <a class="list btn border-0 p-0" href="/admin/dashboard">لوحة</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/collages">
                <a class="list btn border-0 p-0" href="/collages">الكليات</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/majors">
                <a class="list btn border-0 p-0" href="/majors">التخصصات</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/courses">
                <a class="list btn border-0 p-0" href="/courses">المساقات</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/students">
                <a class="list btn border-0 p-0" href="/students">الطلاب</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/instructors">
                <a class="list btn border-0 p-0" href="/instructors">المدرسين</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/semster">
                <a class="list btn border-0 p-0" href="/semster">الفصول الدراسية</a>
              </li>      
              <li class="list-group-item py-3 px-2 list-item" data-link="/register/user">
                <a class="list btn border-0 p-0" href="/register/user">تسجيل مستخدم جديد</a>
              </li>           
              <li class="list-group-item py-3 px-2 list-item" data-link="/logout">
                <a class="list btn border-0 p-0" href="/logout"> الخروج</a>
              </li>      
            </ul>
          </div>
        </div>
      </aside>
      <!-- الشريط الجانبي -->

      <!-- المحتوى الرئيسي -->
      <main class="main-content row g-3 col-md-9 mt-0 mw-100 rounded-3 bg-white">
        <h4 class="mb-3 mt-0 mx-0 py-2 px-3 text-primary fw-bold w-100">احصائيات النظام</h4>
          <div class="col-lg-3 col-md-6 col-sm-12 mt-0">
            <div class="card student-card main-card  position-relative d-flex flex-row align-items-center" data-page="/students">
              <div class="card-body">
                <h5 class="card-title text-black-50 fs-6">طالب/ة </h5>
                <p class="card-text fw-bold fs-5"><?= $students ?></p>
              </div>
              <div class="me-3">
                <i class="card-icon fa-solid fa-user-graduate fa-2xl" style="color: rgb(116, 192, 252);"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mt-0">
            <div class="card instructor-card main-card position-relative d-flex flex-row align-items-center" data-page="/instructors">
              <div class="card-body">
                <h5 class="card-title text-black-50 fs-6">مدرس</h5>
                <p class="card-text fw-bold fs-5"><?= $instructors ?></p>
              </div>
              <div class="me-3">
                <i class="card-icon fa-solid fa-user-tie fa-2xl" style="color: rgb(99, 230, 190);"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mt-0">
            <div class="card collage-num-card main-card position-relative d-flex flex-row align-items-center" data-page="/collages">
              <div class="card-body">
                <h5 class="card-title text-black-50 fs-6">كلية</h5>
                <p class="card-text fw-bold fs-5"><?= $collages ?></p>
              </div>
              <div class="me-3">
                <i class="card-icon fa-solid fa-school fa-2xl" style="color: rgb(177, 151, 252);"></i>     
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mt-0">
            <div class="card major-num-card main-card position-relative d-flex flex-row align-items-center" data-page="/majors">
              <div class="card-body">
                <h5 class="card-title text-black-50 fs-6">تخصص</h5>
                <p class="card-text fw-bold fs-5"><?= $majors ?></p>
              </div>
              <div class="me-3">
                <i class="card-icon fa-solid fa-layer-group fa-2xl" style="color: rgb(255, 180, 100);"></i>
              </div>
            </div>
          </div>
        </main>
      </div>
  </div>

 <?php require base_path('views/partials/footer.php') ?>
 