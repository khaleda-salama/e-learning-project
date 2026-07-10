<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   <main>
     <form action="/major/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="id" value="<?= $major['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل التخصص</h1>
          <textarea 
                  class="textarea form-control fw-bold" 
                  name="name"
                  placeholder="تعديل اسم التخصص" 
                  required
                  autofocus><?= old('name', $major['name']) ?></textarea>

            <p class="error error-major text-danger mb-2 ms-2" data-error-for="name"><?= $errors['majorName'] ?? '' ?></p>


          <textarea 
                  class="textarea overview form-control" 
                  name="overview"
                  placeholder="عدل نبذة التخصص" 
                  required><?= old('overview', $major['overview']) ?></textarea>

            <p class="error error-major text-danger mb-2 ms-2" data-error-for="overview"><?= $errors['majorOverview'] ?? '' ?></p>


          <input 
                 type="file"
                 name="img"
                 class="file-img form-control"
                 required />

           <p class="error error-major text-danger mb-1 ms-2"><?= $errors['majorImg'] ?? '' ?></p>

          <label class="form-label select-label m-0" for="collage">الكلية:</label>
          <select class="select select-collage-id form-select" name="collage_id" id="collage" required>
            <?php foreach ($collage_id as $collage) : ?> 
             <option value="<?= $collage['id'] ?>"
              <?= old('collage_id', $major['collage_id']) == $collage['id'] ? 'selected' : '' ?>>
               <?= $collage['name'] ?>
             </option>
            <?php endforeach; ?>
          </select>       

            <p class="error error-major text-danger ms-2 mb-1" data-error-for="collage_id"><?= $errors['collage_id'] ?? '' ?></p>


          <button class="btn  btn-primary mt-4 fs-5" type="submit">تحديث</button>
          <a href="/majors" class="btn  btn-secondary fs-5">الغاء</a>
        </div>
     </form> 
   </main>

<?php require base_path('views/partials/footer.php') ?>