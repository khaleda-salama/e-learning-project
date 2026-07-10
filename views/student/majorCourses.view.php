<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php if(Core\Session::has('courseIsRegistered')): ?>
    <div class="message alert alert-primary d-flex align-items-center">
      <i class="fa-solid fa-circle-exclamation me-2"></i>
      <div>
        <?= Core\Session::get('courseIsRegistered') ?>
      </div>
    </div>
  <?php endif; ?>
  
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">اسم المساق</th>
              <th class="text-primary">اسم مدرس المساق</th>
              <th class="text-primary">عدد الساعات</th>
              <th class="text-primary">المستوى الدراسي(السنة)</th>
              <th class="text-primary">الفصل الدراسي للمساق</th>
              <th class="text-primary">إجراءات</th>
            </tr>
           </thead>

           <tbody>
            <?php foreach($studentsRegisterCourses as $studentRegisterCourse ) : ?>
             <tr>
               <td><?= $studentRegisterCourse['name'] ?></td>
               <td><?= $studentRegisterCourse['instructor_name'] ?></td>
               <td><?= $studentRegisterCourse['hour_num'] ?></td>
               <td><?= course_years()[$studentRegisterCourse['level_year']] ?></td>
               <td><?= $studentRegisterCourse['semster_name'] ?></td>
               <td>
                <div class="text-center">
                  <form action="/student/register/course" method="POST">
                    <input type="hidden" name="course_id" value="<?= $studentRegisterCourse['course_id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-primary me-1">تسجيل</button>
                  </form>
                </div> 
               </td>
            </tr>
             </tbody>
            <?php endforeach;  ?>
           </tbody>
         </table>
              
      </div>


<?php require base_path('views/partials/footer.php') ?>