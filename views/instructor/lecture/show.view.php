<?php require base_path('views/partials/head.php') ?>



<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">المحاضرة</th>
              <th class="text-primary">اسبوع المحاضرة</th>
              <th class="text-primary"> مادة المحاضرات</th>
              <th class="text-primary">الاجراءات</th>
            </tr>
           </thead>

           <tbody>
             <?php foreach($lectures as $lecture ) : ?>
              <tr>
               <td><?= $lecture['title'] ?></td>
               <td><?=  date_create($lecture['start_date'])->format('j F')?>  <?=date_create($lecture['end_date'])->format('j - F') ?> </td>
               <td><?= $lecture['course_name'] ?></td>
               <td  class="text-center">
                 <a href="/lecture/edit?id=<?= $lecture['id'] ?>"  class="btn btn-sm btn-outline-primary me-1">تعديل</a>
               </td>
              <tr>
             <?php endforeach; ?>
                </tbody>
              </table>
              
      </div>   
        


<?php require base_path('views/partials/footer.php') ?>





