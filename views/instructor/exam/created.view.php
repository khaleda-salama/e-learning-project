<?php require base_path('views/partials/head.php') ?>



<body class="bg-body-tertiary">
  <?php require base_path('views/partials/nav.php') ?>

      <div class="container">

        <table class="table table-hover table-responsive table-bordered border-secondary mt-5">
           <thead class="text-center">
             <tr class="table-success">
              <th class="text-primary">الاختبار</th>
              <th class="text-primary">تاريخ البداية</th>
              <th class="text-primary">تاريخ النهاية</th>
            </tr>
           </thead>

           <tbody>
              <?php foreach($exams as $exam) : ?>
                <tr class="table-row-exam" data-exam-id="<?= $exam['exam_id'] ?>">
                  <td class="w-25"><?= $exam['title'] ?></td>
                  <td class="w-25"><bdi> <?= date_create($exam['start_at'])->format('j F Y, g:i A') ?></bdi></td>
                  <td class="w-25"><bdi> <?= date_create($exam['end_at'])->format('j F Y, g:i A') ?></bdi></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
         </table>
              
      </div>
   
        


<?php require base_path('views/partials/footer.php') ?>





