<?php require base_path('views/partials/head.php') ?>

<body class="d-flex align-items-center py-4 bg-body-tertiary"> 
 <main class="form-signin w-100 m-auto bg-white card">
 <form action="/register" method="POST">

    <img src="/assets/imgs/logo.jpg" alt="logo" width="70" height="70" class="logo rounded-circle">

    <div class="input form-floating">
      <input id="full_name" 
             name="full_name"
             type="text"
             autocomplete="off"
             class="input-username form-control shadow-none"
             value="<?= old('full_name') ?>" 
             required 
             placeholder="الاسم كامل (ثنائي)"
             >
             <label for="full_name">الاسم كامل (ثنائي)</label>

            <p class="error error-register text-danger mt-1 ms-2" data-error-for="full_name"><?= $errors['full_name'] ?? '' ?></p>
    </div> 

    <div class="input form-floating">
      <input id="username" 
             name="username"
             type="text"
             autocomplete="off"
             class="input-username form-control shadow-none"
             value="<?= old('username') ?>" 
             required 
             placeholder="اسم المستخدم"
             >
             <label for="username">اسم المستخدم</label>

            <p class="error error-register text-danger mt-1 ms-2" data-error-for="username"><?= $errors['username'] ?? '' ?></p>
    </div>  

            
      <div class="input form-floating">
          <input id="password" 
                 name="password" 
                 type="password" 
                 autocomplete="off"
                 required
                 class="input-password form-control shadow-none" 
                 placeholder="كلمة المرور">
        <label for="password">كلمة المرور</label>

        <p class="error error-register text-danger mt-1 ms-2" data-error-for="password"><?= $errors['password'] ?? '' ?></p>
      </div>



      <div class="col-12">
        <label class="form-label select-label ms-2">دور المسخدم:</label>
        <select name="role" class="select form-select" required>
        <?php foreach(role() as $keyRole => $role) : ?>
          <option value="<?= $keyRole ?>" <?= old('role') == $keyRole ? 'selected' : '' ?>><?= $role ?></option>
          <?php endforeach; ?>  
        </select>
    
        <p class="error error-register text-danger mb-0 mt-1 ms-2" data-error-for="role"><?= $errors['role'] ?? '' ?></p>
      </div>




     <button class="w-100 btn btn-lg mt-5 btn-primary py-2 px-3" type="submit">تسجيل المستخدم</button>
</form>
</main>

<?php require base_path('views/partials/footer.php') ?>