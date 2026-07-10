<?php require base_path('views/partials/head.php') ?>


<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">التقييم</th>
              <th class="text-primary">الدرجة</th>
            </tr>
           </thead>

           <tbody>
             <?php foreach($evaluations as $evaluation ) : ?>
              <tr>
               <td class="w-25"><?= $evaluation['title'] ?></td>
               <td class="w-25">
                 <?php if($evaluation['submission_id'] === null): ?>
                  
                    لم يتم التسليم
                  
                <?php elseif($evaluation['grade'] === null): ?>
                    
                    لم يتم رصد الدرجة

                <?php else: ?>

                     <?= $evaluation['total_grade'] ?> / <?= $evaluation['grade'] ?> 

                <?php endif; ?>
              </td>
              <tr>
             <?php endforeach; ?>
                </tbody>
              </table>
              
      </div>   
        


<?php require base_path('views/partials/footer.php') ?>





