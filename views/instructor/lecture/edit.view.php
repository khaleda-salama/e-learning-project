<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/lecture/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="id" value="<?= $courseLecture['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل محاضرة</h1>

          <input type="hidden" name="week_id" value="<?= $courseLecture['week_id'] ?>">

          <p class="error error-file text-danger mb-0 ms-2"><?= $errors['week_id'] ?? '' ?></p>



          <textarea 
                  class="textarea form-control" 
                  name="title"
                  placeholder="اكتب عنوان الملف" 
                  required
                  autofocus><?= old('title', $courseLecture['title']) ?></textarea>

            <p class="error error-file text-danger mb-0 ms-2" data-error-for="title"><?= $errors['title'] ?? '' ?></p>

          <label class="form-label ms-2 select-label">ضع رابط الفيديو:</label>
          <input 
                 type="url"
                 name="url"
                 class="form-control"
                 value="<?= old('url', $courseLecture['url']) ?>"
                 required />

            <p class="error error-file text-danger mb-2 ms-2"><?= $errors['url'] ?? '' ?></p>


          <button class="sure-btn btn btn-primary mt-4 fs-5" type="submit">تعديل</button>
          <a href="<?= previousUrl() ?>" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>
