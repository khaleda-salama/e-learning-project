<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   
   <main>
     <form action="/course/store" method="POST">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center text-primary">انشاء المساق</h1>
          <textarea 
                  class="textarea form-control" 
                  name="name"
                  placeholder="اكتب اسم المساق" 
                  required
                  autofocus><?= old('name') ?></textarea>

            <p class="error error-course error-name-course text-danger mb-0 ms-2" data-error-for="name"><?= $errors['courseName'] ?? '' ?></p>

            <div class="col-12">
              <label class="form-label ms-2 select-label" for="major">التخصص:</label>
              <select name="major_id" class="select select-major-course form-select" id="major" required>
                <option disabled selected></option>
                <?php foreach($major_id as $major): ?>
                  <option value="<?= $major['id'] ?>"
                  <?= old('major_id') == $major['id'] ? 'selected' : '' ?>>
                  <?= $major['name'] ?>
                </option>
                <?php endforeach; ?>  
              </select>

              <p class="error error-course text-danger mb-0 ms-2" data-error-for="major_id"><?= $errors['major_id'] ?? '' ?></p>
            </div>
            
            <div class="d-flex align-items-center flex-row mt-3 gap-2">

              <div class="col-6">
                <label class="form-label ms-2 select-label" for="instructor">اسم المدرس:</label>
                <select name="instructor_id" class="select select-instructor-course form-select" id="instructor" required>
                  <option disabled selected>يجب اختيار تخصص المساق اولا</option>
                  <?php foreach($instructor_id as $instructor): ?>
                    <option class="instructor-major" value="<?= $instructor['id'] ?>" data-major-id="<?= $instructor['major_id'] ?>" data-instructor-name="<?= $instructor['instructor_name'] ?>" data-major-name="<?= $instructor['major_name'] ?>"
                     <?= old('instructor_id') == $instructor['id'] ? 'selected' : '' ?>>
                     <?= "{$instructor['instructor_name']} - {$instructor['major_name']}" ?>
                    </option>
                  <?php endforeach; ?>  
                </select>
   
                <p class="error error-course text-danger mb-0 ms-2" data-error-for="instructor_id"><?= $errors['instructor_id'] ?? $errors['courseInstructor'] ?? '' ?></p>
              </div>
            
            <div class="col-6">
            
              <label class="form-label ms-2 select-label" for="hour"> عدد الساعات:</label>
              <select name="hour_num" class="select form-select" id="hour" required>
                <?php foreach(courseHour()  as $value): ?>
                  <option value="<?= $value ?>" <?= old('hour_num') == $value ? 'selected' : '' ?> ><?= $value ?></option>
                <?php endforeach; ?>
                </select>
                
                <p class="error error-course text-danger mb-0 ms-2" data-error-for='hour_num'><?= $errors['hour_num'] ?? '' ?></p>
            </div>
             
         </div>
            
          
         <div class="d-flex flex-row align-items-center gap-2 my-3">

           <div class="col-6">
             <label class="form-label ms-2 select-label" for="semster"> الفصل الراسي:</label>
             <select name="semster_id" class="select form-select" id="semster" required>
              <?php foreach($semster_id as $semster): ?>
                  <option value="<?= $semster['id'] ?>"
                   <?= old('semster_id') == $semster['id'] ? 'selected' : '' ?>>
                       <?= $semster['name'] ?>
                  </option>
              <?php endforeach; ?>
             </select>
 
             <p class="error error-course text-danger mb-0 ms-2" data-error-for="semster_id"><?= $errors['semster_id'] ?? '' ?></p>

           </div>
           
            <div class="col-6">
              <label class="form-label ms-2 select-label" for="year"> المستوى الدراسي:</label>
              <select name="level_year" class="select form-select" id="year" required>
                <?php foreach(course_years() as $key => $value): ?>
                  <option value="<?= $key ?>" 
                   <?= old('level_year') == $key  ? 'selected' : '' ?>>
                    <?= $value ?>
                  </option>
                <?php endforeach; ?>
              </select>
              
              <p class="error error-course text-danger mb-0 ms-2" data-error-for="level_year"><?= $errors['level_year'] ?? '' ?></p>
            </div>

         </div>
          


          <button class="btn btn-primary mt-4 fs-5" type="submit">تأكيد</button>
          <a href="/courses" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>