<?php $selectedSemster = old('semster_id', $course['semster_id']);?>
<?php $selectedMajor = old('major_id', $course['major_id']);?>
<?php $selectedInstructor = old('instructor_id', $course['instructor_id']);?>
<?php $selectedHour = old('hour_num', $course['hour_num']); ?>
<?php $selectedLevelYear = old('level_year', $course['level_year']); ?>

                   
<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
   
   <main>
     <form action="/course/update" method="POST">
        <input type="hidden" name="__method" value="PATCH">
        <input type="hidden" name="id" value="<?= $course['id'] ?>">
        <div class="form d-flex flex-column gap-3 px-4 py-5 bg-white rounded w-50 mx-auto mt-5">
          <h1 class="fs-4 fw-bold mb-4 align-self-center  text-primary">تعديل المساق</h1>
          <textarea 
                  class="textarea form-control fw-bold" 
                  name="name"
                  placeholder=" اسم المساق تعديله هنا..." 
                  required
                  autofocus><?= old('name', $course['name']) ?></textarea>

            <p class="error error-course error-name-course text-danger mb-0 ms-2" data-error-for="name"><?= $errors['courseName'] ?? '' ?></p>

          <div class="col-12">
            <label class="form-label ms-2 select-label" for="major">التخصص:</label>
            <select name="major_id" class="select select-major-course  form-select me-2" id="major" required>
              <?php foreach($major_id as $major): ?>
                <option value="<?= $major['id'] ?>"
                <?= $selectedMajor == $major['id'] ? 'selected' : '' ?>>
                <?= $major['name'] ?>
                </option>
              <?php endforeach; ?>  
            </select>

            <p class="error error-course text-danger mb-0 ms-2" data-error-for="major_id"><?= $errors['major_id'] ?? '' ?></p>
          </div>
            

        <div class="d-flex flex-row align-items-center mt-3 gap-2">

          <div class="col-6">
            <label class="form-label ms-2 select-label" for="instructor">اسم المدرس:</label>
            <select name="instructor_id" class="select select-instructor-course form-select" id="instructor" required>
              <option disabled selected>يجب اختيار تخصص المساق اولا</option>
              <?php foreach($instructor_id as $instructor): ?>
               <option class="instructor-major" value="<?= $instructor['id'] ?>" data-major-id="<?= $instructor['major_id'] ?>" data-instructor-name="<?= $instructor['instructor_name'] ?>" data-major-name="<?= $instructor['major_name'] ?>"
                <?= $selectedInstructor == $instructor['id'] ? 'selected' : '' ?>>
                <?= "{$instructor['instructor_name']} - {$instructor['major_name']}" ?>
              </option>
              <?php endforeach; ?>  
            </select>

            <p class="error error-course text-danger mb-0 ms-2" data-error-for="instructor_id"><?= $errors['instructor_id'] ?? $errors['courseInstructor'] ??  '' ?></p>
          </div>

          <div class="col-6">
            <label class="form-label ms-2 select-label" for="hour"> عدد الساعات:</label>
            <select name="hour_num" class="select form-select" id="hour" required>
                <?php foreach(courseHour() as $hour): ?>
                <option value="<?= $hour ?>" <?= $selectedHour == $hour ? 'selected' : '' ?> ><?= $hour ?></option>
              <?php endforeach; ?>
              </select>

              <p class="error error-course text-danger mb-0 ms-2" data-error-for='hour_num'><?= $errors['hour_num'] ?? '' ?></p>
          </div>

          
        </div>
        
        
        
        
        <div class="d-flex flex-row align-items-center my-3 gap-2">

            <div class="col-6">
                <label class="form-label ms-2 select-label" for="semster"> الفصل الراسي:</label>
                <select name="semster_id" class="select form-select" id="semster" required>
                <?php foreach($semster_id as $semster): ?>
                    <option value="<?= $semster['id'] ?>"
                      <?= $selectedSemster == $semster['id'] ? 'selected' : '' ?>>
                          <?= $semster['name'] ?>
                    </option>
                <?php endforeach; ?>
                </select>
    
                <p class="error error-course text-danger mb-0 ms-2" data-error-for="semster_id"><?= $errors['semster_id'] ?? '' ?></p>
            </div>
    
            <div class="col-6">
                <label class="form-label ms-2 select-label" for="year"> المستوى الدراسي:</label>
                <select name="level_year" class="select form-select" id="year" required>
                  <?php foreach(course_years() as $key => $year): ?>
                  <option value="<?= $key ?>" <?= $selectedLevelYear == $key ? 'selected' : '' ?> ><?= $year ?></option>
                  <?php endforeach; ?>
                </select>
    
                <p class="error error-course text-danger mb-0 ms-2" data-error-for="level_year"><?= $errors['level_year'] ?? '' ?></p>
            </div>
        
        </div> 
          

          <button class="btn btn-primary mt-4 fs-5" type="submit">تحديث</button>
          <a href="/courses" class="btn btn-secondary fs-5">الغاء</a>
        </div>
     </form>
   </main>


<?php require base_path('views/partials/footer.php') ?>