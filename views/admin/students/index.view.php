<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم طالب/ة</th>
              <th class="text-primary">اسم الطالب/ة</th>
              <th class="text-primary">الكلية</th>
              <th class="text-primary">التخصص</th>
              <th class="text-primary">السنة الدراسية</th>
            </tr>
           </thead>

           <tbody>
            <?php foreach($students as $student ) : ?>
             <tr class="table-row-student" data-student-id="<?= $student['id'] ?>">
               <td><?= $student['id'] ?></td>
               <td><?= $student['full_name'] ?></td>
               <td><?= $student['collage_name'] ?></td>
               <td><?= $student['major_name'] ?></td>
               <td><?= course_years()[$student['academic_year']]?></td>
             <tr>
            <?php endforeach;  ?>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
        <a href="/student/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">تسجيل طالب جديد</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





