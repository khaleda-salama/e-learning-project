<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم المساق</th>
              <th class="text-primary">اسم المساق</th>
              <th class="text-primary">اسم مدرس المساق</th>
              <th class="text-primary">عدد الساعات</th>
              <th class="text-primary">المستوى الدراسي(السنة)</th>
              <th class="text-primary">تخصص المساق</th>
              <th class="text-primary">الفصل الدراسي للمساق</th>
            </tr>
           </thead>

           <tbody>
            <?php foreach($courses as $course ) : ?>
             <tr class="table-row" data-course-id="<?= $course['id'] ?>">
               <td><?= $course['id'] ?></td>
               <td><?= $course['name'] ?></td>
               <td><?= $course['instructor_name'] ?></td>
               <td><?= $course['hour_num'] ?></td>
               <td><?= course_years()[$course['level_year']] ?></td>
               <td><?= $course['major_name'] ?></td>
               <td><?= $course['semster_name'] ?></td>
              </tr>
            <?php endforeach;  ?>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
          <a href="/course/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">انشاء المساق</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





