<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>


    <div class="container mt-5">
       <div class="text-left mb-3">
         <h3 class="mb-5 fw-bold"><?= $exam['course_name'] ?></h3>
       </div>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 fw-bold p-2 text-primary text-center"><?= $exam['title'] ?></h4>
            </div>
            <div class="card-body">
                <p class="card-text fw-bold fs-5 text-primary ms-2">التعليمات : </p>
                <p class="card-text border-bottom pb-3 lh-lg ms-3"><?=nl2br(htmlspecialchars($exam['description'])) ?></p>
                <p class="card-text text-muted ms-3"><strong>تاريخ البدء:</strong>    <bdi> <?= date_create($exam['start_at'])->format('j F Y, g:i A') ?></bdi></p>
                <p class="card-text text-muted ms-3"><strong>تاريخ الانتهاء:</strong>  <bdi> <?= date_create($exam['end_at'])->format('j F Y, g:i A') ?></bdi></p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="<?= $exam['url'] ?>" class="btn btn-primary" target="_blank">فتح الاختبار</a>
            <div class="d-flex align-items-center gap-1">
                <a href="/exam/edit?id=<?= $exam['exam_id'] ?>" class="btn btn-sm btn-outline-primary ">تعديل</a>
                <form action="/exam/delete" method="POST">
                    <input  type="hidden" name="__method" value="DELETE"> 
                    <input  type="hidden" name="course_id" value="<?= $exam['course_id'] ?>"> 
                    <input  type="hidden" name="id" value="<?= $exam['exam_id'] ?>"> 
                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button> 
                </form> 
            </div>
        </div>
    </div>   















<?php require base_path('views/partials/footer.php') ?>