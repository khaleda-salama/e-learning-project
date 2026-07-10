<?php $selectedinstructors = old('user_id', $instructor['user_id']);?>
<?php $selectedMajor       = old('major_id', $instructor['major_id']);?>

<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   
   <main>
     <form action="/instructor/update" method="POST">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="id" value="<?= $instructor['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تسجيل المدرس</h1>

          <div class="col-12">
            
              <label class="form-label ms-2 select-label" for="instructors_name">اسم المدرس:</label>
              <select name="user_id" class="select form-select" id="instructors_name" required>
                <?php foreach($user_id  as $user): ?>
                  <option value="<?= $user['id'] ?>" <?= $selectedinstructors == $user['id'] ? 'selected' : '' ?> ><?= $user['full_name'] ?></option>
                <?php endforeach; ?>
                </select>
                
                <p class="error error-instructor text-danger mb-0 ms-2" data-error-for='user_id'><?= $errors['user_id'] ?? '' ?></p>
            </div>


            <div class="col-12">
              <label class="form-label ms-2 select-label" for="major">التخصص:</label>
              <select name="major_id" class="select form-select" id="major" required>
                <option disabled selected></option>
                <?php foreach($major_id as $major): ?>
                  <option value="<?= $major['id'] ?>"
                  <?= $selectedMajor == $major['id'] ? 'selected' : '' ?>>
                  <?= $major['name'] ?>
                </option>
                <?php endforeach; ?>  
              </select>

              <p class="error error-instructor text-danger mb-0 ms-2" data-error-for="major_id"><?= $errors['major_id'] ?? '' ?></p>
            </div>



          <button class="btn btn-primary mt-4 fs-5" type="submit">تأكيد</button>
          <a href="/instructors" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>