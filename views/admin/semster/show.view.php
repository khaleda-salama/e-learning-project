<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم الفصل</th>
              <th class="text-primary">اسم الفصل الدراسي</th>
              <th class="text-primary">تاريخ انشاء الفصل الدراسي</th>
              <th class="text-primary">الإجراءات</th>
            </tr>
           </thead>

           <tbody>
             <tr>
               <td><?= $semster['id'] ?></td>
               <td><?= $semster['name'] ?></td>
               <td><?= $semster['created_at'] ?></td>
               <td>
               <div class="text-center">
                 <a href="/semster/edit?id=<?= $semster['id'] ?>" class="btn btn-sm btn-outline-primary me-1">تعديل</a>
               </div> 
               </td>
             <tr>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
          <a href="/semster" class="btn btn-secondary btn-sm mt-5 fs-6 fw-bold">العودة</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





