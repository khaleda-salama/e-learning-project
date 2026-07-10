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
                        <a href="/student/evaluation?course_id=<?= $course['id'] ?>" class="nav-link link-course-instructor text-primary fs-6">التقييمات</a>
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
                                  <a href="/student/exam?id=<?= $exam['exam_id'] ?>" class="fw-bold fs-5"><?= $exam['title'] ?></a>
                                </div>
                              </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </div>  
              </div>
            </div>
       </div>
      <?php endforeach;  ?>
    </div>

 <?php require base_path('views/partials/footer.php') ?>   