<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   
   <main>
     <form action="/student/store" method="POST">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تسجيل طالب/ة</h1>

          <div class="col-12">
            
              <label class="form-label ms-2 select-label" for="students_name">اسم الطالب/ة:</label>
              <select name="user_id" class="select form-select" id="students_name" required>
                <?php foreach($user_id  as $user): ?>
                  <option value="<?= $user['id'] ?>" <?= old('user_id') == $user['id'] ? 'selected' : '' ?> ><?= $user['full_name'] ?></option>
                <?php endforeach; ?>
              </select>
                
                <p class="error error-student text-danger mb-0 ms-2" data-error-for='user_id'><?= $errors['user_id'] ?? '' ?></p>
            </div>

         <div class="d-flex align-items-center flex-row mt-3 gap-2">

            <div class="col-6">
              <label class="form-label ms-2 select-label" for="major">التخصص:</label>
              <select name="major_id" class="select form-select" id="major" required>
                <option disabled selected></option>
                <?php foreach($major_id as $major): ?>
                  <option value="<?= $major['id'] ?>"
                  <?= old('major_id') == $major['id'] ? 'selected' : '' ?>>
                  <?= $major['name'] ?>
                </option>
                <?php endforeach; ?>  
              </select>

              <p class="error error-student text-danger mb-0 ms-2" data-error-for="major_id"><?= $errors['major_id'] ?? '' ?></p>
            </div>


                       
            <div class="col-6">
              <label class="form-label ms-2 select-label" for="year"> المستوى الدراسي:</label>
              <select name="academic_year" class="select form-select" id="year" required>
                <?php foreach(course_years() as $key => $value): ?>
                  <option value="<?= $key ?>" 
                   <?= old('academic_year') == $key  ? 'selected' : '' ?>>
                    <?= $value ?>
                  </option>
                <?php endforeach; ?>
              </select>
              
              <p class="error error-student text-danger mb-0 ms-2" data-error-for="academic_year"><?= $errors['academic_year'] ?? '' ?></p>
            </div>
            

             
         </div>
            
         


          <button class="btn btn-primary mt-4 fs-5" type="submit">تأكيد</button>
          <a href="/students" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>