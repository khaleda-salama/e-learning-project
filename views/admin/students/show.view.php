<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم طالب/ة</th>
              <th class="text-primary">اسم الطالب/ة</th>
              <th class="text-primary">الكلية</th>
              <th class="text-primary">التخصص</th>
              <th class="text-primary">السنة الدراسية</th>
              <th class="text-primary">الإجراءات</th>
            </tr>
           </thead>

           <tbody>
             <tr>
               <td><?= $student['id'] ?></td>
               <td><?= $student['full_name'] ?></td>
               <td><?= $student['collage_name'] ?></td>
               <td><?= $student['major_name'] ?></td>
               <td><?= course_years()[$student['academic_year']]?></td>
               <td>  
                  <div class="d-flex align-items-center justify-content-center">
                    <a href="/student/edit?id=<?= $student['id'] ?>"  class="btn btn-sm btn-outline-primary me-1">تعديل</a>
                    <form action="/student/delete" method="POST">
                      <input  type="hidden" name="__method" value="DELETE"> 
                      <input  type="hidden" name="id" value="<?= $student['id'] ?>"> 
                      <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button> 
                    </form> 
                  </div>
               </td>
             <tr>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
          <a href="/students"  class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">العودة</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





