<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/collage/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="id" value="<?= $collage['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل الكلية</h1>
          <textarea 
                  class="textarea form-control fw-bold" 
                  name="name"
                  placeholder="تعديل اسم الكلية" 
                  required
                  autofocus><?= old('name', $collage['name']) ?></textarea>

            <p class="error error-collage text-danger mb-2 ms-2" data-error-for="name"><?= $errors['collegeName'] ?? '' ?></p>

          <input 
                 type="file"
                 name="img"
                 class="file-img form-control"
                 required />

            <p class="error error-collage text-danger mb-2 ms-2"><?= $errors['collegeImg'] ?? '' ?></p>

          <input 
                type="date"
                name="created_at"
                min="2026-01-01"
                max="2028-01-30"
                value="<?=  old('created_at', $collage['created_at']) ?>"
                class="date form-control" 
                required />

            <p class="error error-collage text-danger mb-1 ms-2"><?= $errors['collegeDate'] ?? '' ?></p>

          
          <button class="btn  btn-primary mt-4 fs-5" type="submit">تحديث</button>
          <a href="/collages" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form> 
   </main>

<?php require base_path('views/partials/footer.php') ?>