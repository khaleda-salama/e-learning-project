<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم المدرس</th>
              <th class="text-primary">اسم المدرس</th>
              <th class="text-primary">كلية المدرس</th>
              <th class="text-primary">تخصص المدرس</th>
              <th class="text-primary">الإجراءات</th>
            </tr>
           </thead>

           <tbody>
             <tr>
               <td><?= $instructor['id'] ?></td>
               <td><?= $instructor['full_name'] ?></td>
               <td><?= $instructor['collage_name'] ?></td>
               <td><?= $instructor['major_name'] ?></td>
               <td>  
                  <div class="d-flex align-items-center justify-content-center">
                    <a href="/instructor/edit?id=<?= $instructor['id'] ?>"  class="btn btn-sm btn-outline-primary me-1">تعديل</a>
                    <form action="/instructor/delete" method="POST">
                      <input  type="hidden" name="__method" value="DELETE"> 
                      <input  type="hidden" name="id" value="<?= $instructor['id'] ?>"> 
                      <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button> 
                    </form> 
                  </div>
               </td>
             <tr>
           </tbody>
         </table>
              
      </div>
      
      <p class="mt-5 mx-auto d-flex justify-content-center">
          <a href="/instructors"  class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">العودة</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





