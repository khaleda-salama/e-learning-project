<?php require base_path('views/partials/head.php') ?>

<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>
      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">#رقم الفصل</th>
              <th class="text-primary">اسم الفصل الدراسي</th>
              <th class="text-primary">تاريخ انشاء الفصل الدراسي</th>
            </tr>
           </thead>

           <tbody>
            <?php foreach($semsters as $semster ) : ?>
             <tr class="table-row-semster" data-semster-id="<?= $semster['id'] ?>">
               <td><?= $semster['id'] ?></td>
               <td><?= $semster['name'] ?></td>
               <td><?= $semster['created_at'] ?></td>
            </tr>
            <?php endforeach;  ?>
           </tbody>
         </table>
              
      </div>
      <p class="mt-5 mx-auto d-flex justify-content-center">
        <a href="/semster/create" class="btn btn-primary btn-sm mt-5 fs-6 fw-bold">انشاء الفصل الدراسي</a> 
      </p>


<?php require base_path('views/partials/footer.php') ?>





