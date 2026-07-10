<?php require base_path('views/partials/head.php') ?>



<body class="bg-body-tertiary">
  <?php if(Core\Session::has('gradeExamIsRegister')): ?>
    <div class="message alert alert-success d-flex align-items-center">
      <i class="fa-solid fa-circle-check me-2"></i>
      <div>
        <?= Core\Session::get('gradeExamIsRegister') ?>
      </div>
    </div>
  <?php endif; ?>
   
  <?php if(Core\Session::has('gradeExamRegistered')): ?>
    <div class="message alert alert-primary d-flex align-items-center">
      <i class="fa-solid fa-circle-exclamation me-2"></i>
      <div>
        <?= Core\Session::get('gradeExamRegistered') ?>
      </div>
    </div>
  <?php endif; ?>
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
              <tr class="table-success">
                <th class="text-primary">الطالب</th>
                <th class="text-primary">تاريخ التسليم</th>
                <th class="text-primary">ملف الاجابة</th>
                <th class="text-primary">الدرجة</th>
              </tr>
           </thead>

           <tbody>
              <?php foreach($examsSubmissions as $examSubmissions) : ?>
                <tr class="w-25"> 
                  <td><?= $examSubmissions['full_name'] ?></td>
                  <td><bdi> <?= date_create($examSubmissions['submitted_at'])->format('j F Y, g:i A') ?></bdi></td>
                  <td>
                    <a href="<?= $examSubmissions['answer_file'] ?>" target="_blank">
                      <?= htmlspecialchars($examSubmissions['original_file_name'])?>
                    </a>
                  </td>
                  <td class="w-25 text-center">
                    <form method="POST" action="/exam/grade/store">
                        <div class="d-flex  flex-row gap-2 align-items-center">
                          <input type="hidden" name="submission_id" value="<?= $examSubmissions['submission_id'] ?>" />
                          <input type="text"   name="grade" value="<?= old('grade', $examSubmissions['grade']) ?>" class="form-control shadow-none" placeholder="ضع علامة الطالب" required />
                          <p class="error error-exam text-danger mb-0 ms-2"><?= $errors['grade'] ?? '' ?></p>
                          <button type="submit">حفظ</button>
                        </div> 
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
         </table>
              
      </div>
        <p class="mt-5 mx-auto d-flex justify-content-center">
            <a href="/exams/created?course_id=<?= $examSubmissions['course_id'] ?>"  class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">العودة</a> 
        </p>   
        


<?php require base_path('views/partials/footer.php') ?>





