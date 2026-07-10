<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/file/store" method="POST" enctype="multipart/form-data">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">انشاء ملف</h1>

          <input type="hidden" name="week_id" value="<?= $courseFile['week_id'] ?>">

          <p class="error error-file text-danger mb-0 ms-2"><?= $errors['week_id'] ?? '' ?></p>



          <textarea 
                  class="textarea form-control" 
                  name="title"
                  placeholder="اكتب عنوان الملف" 
                  required
                  autofocus><?= old('title') ?></textarea>

            <p class="error error-file text-danger mb-0 ms-2" data-error-for="title"><?= $errors['title'] ?? '' ?></p>
 
          <input 
                 type="file"
                 name="url"
                 class="form-control"
                 required />

            <p class="error error-file text-danger mb-2 ms-2"><?= $errors['url'] ?? '' ?></p>


          <button class="sure-btn btn btn-primary mt-4 fs-5" type="submit">تأكيد</button>
          <a href="<?= previousUrl() ?>" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>
