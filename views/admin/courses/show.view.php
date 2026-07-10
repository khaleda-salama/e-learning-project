<?php require base_path('views/partials/head.php') ?>



<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم المساق</th>
              <th class="text-primary">اسم المساق</th>
              <th class="text-primary">اسم مدرس المساق</th>
              <th class="text-primary">عدد الساعات</th>
              <th class="text-primary">المستوى الدراسي(السنة)</th>
              <th class="text-primary">تخصص المساق</th>
              <th class="text-primary">الفصل الدراسي للمساق</th>
              <th class="text-primary">الإجراءات</th>
            </tr>
           </thead>

           <tbody>
             <tr>
               <td><?= $course['id'] ?></td>
               <td><?= $course['name'] ?></td>
               <td><?= $course['instructor_name'] ?></td>
               <td><?= $course['hour_num'] ?></td>
               <td><?= course_years()[$course['level_year']]?></td>
               <td><?= $course['major_name'] ?></td>
               <td><?= $course['semster_name'] ?></td>
               <td>
                <div class="d-flex align-items-center justify-content-center">
                  <a href="/course/edit?id=<?= $course['id'] ?>"  class="btn btn-sm btn-outline-primary me-1">تعديل</a>
                  <form action="/course/delete" method="POST">
                     <input  type="hidden" name="__method" value="DELETE"> 
                     <input  type="hidden" name="id" value="<?= $course['id'] ?>"> 
                     <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button> 
                  </form> 
                </div>
               </td>
             <tr>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
          <a href="/courses"  class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">العودة</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





