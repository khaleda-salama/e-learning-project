<?php require base_path('views/partials/head.php') ?>



<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">اسم الطالب</th>
              <th class="text-primary">اسم المستخدم</th>
            </tr>
           </thead>

           <tbody>
             <?php foreach($students as $student ) : ?>
              <tr>
               <td class="w-25"><?= $student['student_name'] ?></td>
               <td class="w-25"><?= $student['username'] ?></td>
              <tr>
             <?php endforeach; ?>
                </tbody>
              </table>  
      </div>   
        


<?php require base_path('views/partials/footer.php') ?>





