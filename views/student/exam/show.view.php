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

        <?php if($examStatus === 'not_started'): ?>
            <div class="alert alert-info mt-4 w-50">
                هذا الاختبار لم يبدأ بعد. يمكنك فتحه في تاريخ البدء المحدد.
            </div>

         <?php elseif($examStatus === 'active' && !$hasSubmitted): ?>
            <div class="d-flex mt-4">
                <a href="<?= $exam['url'] ?>" class="btn btn-primary" target="_blank">فتح الاختبار</a>
            </div>
            <form action="/student/exam/submit" method="post" enctype="multipart/form-data">
                <input type="hidden" name="exam_id" value="<?= $exam['exam_id'] ?? '' ?>">
                <div class="my-5 w-50">
                <input 
                type="file"
                name="answer_file"
                class="form-control"
                required />
            
                        <p class="error error-file text-danger mb-2 ms-2"><?= $errors['answer_file'] ?? '' ?></p>
        
                        <div class="text-end mt-3">
                        <button type="submit" class="btn btn-secondary">تسليم الاجابات</button>
                        </div>
                </div>
            </form>

         <?php elseif($examStatus === 'ended'): ?>
           <div class="alert alert-warning mt-4 w-50">
             هذا الاختبار انتهى. لا يمكنك تسليم اجاباتك بعد الآن.
           </div>

         <?php elseif($hasSubmitted): ?>
            <table class="table table-responsive table-bordered border-secondary mt-5 w-50">
               <thead class="text-center">
                 <tr class="table-secondary">
                    <th>الحالة</th>
                    <th>وقت التسليم</th>
                 </tr>
                </thead>
                <tbody>
                   <tr class="table-light">
                     <td>تم التسليم بنجاح</td>
                     <td><bdi><?= date_create($hasSubmitted['submitted_at'])->format('j F Y, g:i A') ?></bdi></td>
                   </tr>
                </tbody>
            </table>

        <?php endif; ?>
    </div>    






<?php require base_path('views/partials/footer.php') ?>