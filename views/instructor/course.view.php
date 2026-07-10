<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

  <div class="container mt-5">
       <div class="text-left mb-3">
         <h3 class="mb-3 fw-bold"><?= $course['name'] ?></h3>
       </div>
       <nav class="navbar navbar-expand-lg navbar-light border-3 border-bottom mb-5">
            <div class="collapse navbar-collapse border-0">
                <ul class="navbar-nav">
                    <li class="nav-item item-course-instructor position-relative">
                        <a href="/instructor/student/show?course_id=<?= $course['id'] ?>" class="nav-link link-course-instructor text-primary fs-6">الطلاب</a>
                    </li>
                    <li class="nav-item item-course-instructor position-relative">
                        <a href="/lecture/show?course_id=<?= $course['id'] ?>" class="nav-link link-course-instructor text-primary fs-6">المحاضرات</a>
                    </li>
                    <li class="nav-item item-course-instructor position-relative">
                        <a href="/exams/created?course_id=<?= $course['id'] ?>" class="nav-link link-course-instructor text-primary fs-6">الاختبارات</a>
                    </li>
                    <li class="nav-item item-course-instructor position-relative">
                        <a href='/week/create?course_id=<?= $course['id'] ?>' class="nav-link link-course-instructor text-primary fs-6">ادارة الاسابيع</a>
                    </li>
                </ul>
            </div> 
        </nav>
        <?php foreach($weeks as $week) :  ?>
         <div class="card mt-4 mb-3 position-relative">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex">
                <div class="icon-click ms-2 bg-light rounded-circle px-3 py-2 width-auto">
                  <i class="icon-drop-down fa-solid fa-angle-left fa-2xl text-primary"></i>
                </div>
                <p class="course-week ms-4 mb-0 p-2 fw-bold fs-5"><?=  date_create($week['start_date'])->format('j F')?>  <?=date_create($week['end_date'])->format('j - F') ?> </p>
              </div> 
                <div class="d-flex align-items-center justify-content-center">
                  <a href="/week/edit?id=<?= $week['id'] ?>"  class="btn btn-sm btn-outline-primary me-1">تعديل</a>
                  <form action="/week/delete" method="POST">
                      <input  type="hidden" name="__method" value="DELETE"> 
                      <input  type="hidden" name="id" value="<?= $week['id'] ?>"> 
                      <input  type="hidden" name="course_id" value="<?= $course['id'] ?>"> 
                      <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button> 
                  </form> 
                </div>
              </div>
              <div class="course-content overflow-hidden">
                <div class="mt-3">
                    <?php foreach($files as $file) : ?>
                      <?php if($file['week_id'] === $week['id']) : ?>
                              <div class="file-url d-flex justify-content-between border-top py-2">
                                <div class="d-flex align-items-center">
                                  <i class="fa-regular fa-file me-2 fa-xl" style="color: var(--main-color);"></i>
                                  <a href="<?= $file['url'] ?>" target="_blank" class="fw-bold fs-5"><?= $file['title'] ?></a>
                                </div>
                                <a href="/file/edit?id=<?= $file['file_id'] ?>" class="btn btn-sm btn-outline-primary">تعديل</a>
                              </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <?php foreach($lectures as $lecture) : ?>
                      <?php if($lecture['week_id'] === $week['id']) : ?>
                              <div class="file-url d-flex justify-content-between border-top py-2">
                                <div class="d-flex align-items-center">
                                  <i class="fa-solid fa-link fa-xl me-2" style="color: var(--main-color);"></i>
                                  <a href="<?= $lecture['url'] ?>" target="_blank" class="fw-bold fs-5"><?= $lecture['title'] ?></a>
                                </div>
                                <a href="/lecture/edit?id=<?= $lecture['lecture_id'] ?>" class="btn btn-sm btn-outline-primary">تعديل</a>
                              </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <?php foreach($exams as $exam) : ?>
                      <?php if($exam['week_id'] === $week['id']) : ?>
                              <div class="file-url d-flex justify-content-between border-top py-2">
                                <div class="d-flex align-items-center">
                                  <img src="/assets/imgs/exam-icon.png" alt="Exam Icon" width="35" height="35" class="me-2">
                                  <a href="/exam/show?id=<?= $exam['exam_id'] ?>" class="fw-bold fs-5"><?= $exam['title'] ?></a>
                                </div>
                              </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="p-1 mt-5">
                  <div class="plus-sign position-relative text-center mt-1" data-week-id="<?= $week['id'] ?>">
                      <span class="add-content rounded-circle">
                        <i class="fa-solid fa-plus fa-lg"></i>
                      </span>
                  </div>
                </div>   
              </div>
            </div>
       </div>
      <?php endforeach;  ?>
    </div>
        
        <div class="small-page close bg-white rounded shadow p-4">
          <small class="closed p-1 text-center"><i class="fa-solid fa-xmark"></i></small>

          <div class="main-box row">
             <div class="col-6 mb-3">
               <div class="box" data-type="lecture">
                 <i class="fa-solid fa-chalkboard-user" style="color: rgb(99, 230, 190); font-size: 50px;"></i>
                 <p class="fs-6 text-black-50 mt-3 mb-0">محاضرة</p>
               </div>
              </div>
             <div class="col-6 mb-3">
               <div class="box" data-type="file">
                 <i class="fa-solid fa-file" style="color: rgb(242, 73, 25); font-size: 50px;"></i>
                 <p class="fs-6 text-black-50 mt-3 mb-0">كتاب / سلايد </p>
               </div>
             </div>
             <div class="d-flex justify-content-center">
               <div class="box" data-type="exam">
                  <i class="fa-solid fa-pen-to-square" style="color: rgb(247, 110, 171); font-size: 50px;"></i>
                 <p class="fs-6 text-black-50 mt-3 mb-0">اختبار / واجب</p>
               </div>
              </div>
           </div>

       </div>







<?php require base_path('views/partials/footer.php') ?>
