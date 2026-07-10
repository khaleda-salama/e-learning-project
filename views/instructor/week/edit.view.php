<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/week/update" method="POST">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="week_id" value="<?= $courseWeeks['week_id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center text-primary"> تعديل الاسبوع للمادة</h1>

          <input type="hidden" name="course_id" value="<?= $courseWeeks['id'] ?>">
          
          <p class="error error-week text-danger mb-0 ms-2"><?= $errors['course_id'] ?? '' ?></p>


          <label class="form-label ms-2 select-label">بداية الاسبوع:</label>
          <input 
                type="date"
                name="start_date"
                value="<?= old('start_date', $courseWeeks['start_date']) ?>" 
                class="date form-control"
                required />

            <p class="error error-week text-danger mb-0 ms-2"><?= $errors['start_date'] ?? $errors['overlap_weeks'][0] ?? $errors['order_weeks'][0] ?? '' ?></p>

          <label class="form-label ms-2 select-label" for="instructor">نهاية الاسبوع:</label>
          <input 
                type="date"
                name="end_date"
                value="<?= old('end_date', $courseWeeks['end_date']) ?>" 
                class="date form-control"
                required />

            <p class="error error-week text-danger mb-0 ms-2"><?= $errors['end_date'] ?? $errors['course_weeks'][0] ?? $errors['durationWeek'][0] ??'' ?></p>

          <button class="btn btn-primary mt-3 fs-5" type="submit">تعديل</button>
          <a href="<?= previousUrl()  ?>" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>