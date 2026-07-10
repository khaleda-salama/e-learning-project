<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم المدرس</th>
              <th class="text-primary">اسم المدرس</th>
              <th class="text-primary">كلية المدرس</th>
              <th class="text-primary">تخصص المدرس</th>
            </tr>
           </thead>

           <tbody>
            <?php foreach($instructors as $instructor ) : ?>
             <tr class="table-row-instructor" data-instructor-id="<?= $instructor['id'] ?>">
               <td><?= $instructor['id'] ?></td>
               <td><?= $instructor['full_name'] ?></td>
               <td><?= $instructor['collage_name'] ?></td>
               <td><?= $instructor['major_name'] ?></td>
             <tr>
            <?php endforeach;  ?>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
        <a href="/instructor/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">تسجيل مدرس جديد</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





