<?php require base_path('views/partials/head.php') ?>

 <body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
       <form action="/exam/update" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="__method" value="PATCH">
          <input type="hidden" name="id" value="<?= $courseExam['id'] ?>">
         <div class="form d-flex flex-column gap-3 px-4 py-4 bg-white rounded w-50 mx-auto mt-5">

            <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل الاختبار </h1>
            <input type="hidden" name="week_id" value="<?= $courseExam['week_id'] ?>">

            <p class="error error-exam text-danger mb-0 ms-2"><?= $errors['week_id'] ?? '' ?></p>
            <div class="col-12">
                <input type="text" name="title" value="<?= old('title', $courseExam['title']) ?>" class="form-control input mb-2" placeholder="عنوان الاختبار" required>

                <p class="error error-exam text-danger mb-0 ms-2" data-error-for="title"><?= $errors['title'] ?? '' ?></p>

            </div>

            <div class="col-12">
                <textarea type="text" name="description" class="form-control textarea" placeholder="الوصف او تعليمات الاختبار"required><?= old('description', $courseExam['description']) ?></textarea>

                <p class="error error-exam text-danger mb-0 ms-2" data-error-for="description"><?= $errors['description'] ?? '' ?></p>
            </div>

            <label for="url" class="form-label text-primary fw-bold mb-0">ملف الاختبار</label>
            <input 
                 type="file"
                 name="url"
                 class="form-control"
                 required />

            <p class="error error-exam text-danger mb-2 ms-2"><?= $errors['url'] ?? '' ?></p>

            <label class="form-label text-primary fw-bold mb-0">الدرجة الكاملة للاختبار</label>
            <input 
                 type="text"
                 name="total_grade"
                 class="form-control"
                 value="<?= old('total_grade', $courseExam['total_grade']) ?>"
                 placeholder="علامة الطالب / الدرجة الكاملة  مثال:80/(100)"
                 required />

            <p class="error error-exam text-danger mb-0 ms-2"><?= $errors['total_grade'] ?? '' ?></p>

            <div class="d-flex flex-row gap-2 my-3">
                <div class="col-md-6">
                    <label for="start_at" class="form-label text-primary fw-bold">وقت البدء</label>
                    <input type="datetime-local" value="<?= old('start_at', $courseExam['start_at']) ?>" name="start_at" class="form-control" id="start_at" required>

                    <p class="error error-exam text-danger mb-0 ms-2" data-error-for="start_at"><?= $errors['start_at'] ?? $errors['exam_TimeInsideWeek'][0] ?? $errors['exam_StartGreaterEnd'][0] ?? '' ?></p>
                </div>
                <div class="col-md-6">
                    <label for="end_at" class="form-label text-primary fw-bold">وقت الانتهاء</label>
                    <input type="datetime-local" value="<?= old('end_at', $courseExam['end_at']) ?>" name="end_at" class="form-control" id="end_at" required>

                    <p class="error error-exam text-danger mb-0 ms-2" data-error-for="end_at"><?= $errors['end_at'] ?? $errors['exam_EndAfterStart'][0] ?? $errors['exam_NotPast'][0] ??'' ?></p>

                </div>
            </div> 
            <button class="sure-btn btn btn-primary mt-4 fs-5" type="submit">تأكيد</button>
            <a href="<?= previousUrl() ?>" class="btn btn-secondary fs-5">الغاء</a>
         </div>
      </form>
   </main>



<?php require base_path('views/partials/footer.php') ?>  