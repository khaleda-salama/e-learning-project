<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/semster/update" method="POST">
        <input type='hidden' name="__method" value="PATCH">
        <input type='hidden' name="id" value="<?= $semster['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل الفصل الدراسي</h1>
          <textarea 
                  class="textarea form-control fw-bold"
                  name="name"
                  placeholder="تعديل اسم الفصل..." 
                  required
                  autofocus><?= old('name', $semster['name']) ?></textarea>

            <p class="error error-semster text-danger mb-2 ms-2" data-error-for="name"><?= $errors['semsterName'] ?? '' ?></p>

          <input 
                type="date"
                min="2026-01-01"
                max="2028-12-31"
                name="created_at"
                value="<?= old('created_at', $semster['created_at']) ?>" 
                class="date form-control"
                required />

            <p class="error error-semster text-danger ms-2 mb-1"><?= $errors['semsterDate'] ?? '' ?></p>
               


          <button class="btn btn-primary mt-2 fs-5" type="submit">تحديث</button>
          <a href="/semster" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>
























