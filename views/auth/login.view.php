<?php require base_path('views/partials/head.php') ?>

<body class="d-flex align-items-center py-4 bg-body-tertiary">  
 <main class="form-signin w-100 m-auto bg-white card">
 <form action="/session" method="post">
    <img src="/assets/imgs/logo.jpg" alt="logo" width="70" height="70" class="logo rounded-circle">


    <div class="form-floating">
      <input id="username" 
             name="username"
             type="text"
             autocomplete="off"
             required 
             class="input-username form-control shadow-none" 
             placeholder="اسم المستخدم"
             value="<?= old('username')?>">
             <label for="username">اسم المستخدم</label>
      </div>  
            
          <p class="error error-login text-danger mt-1 mb-2 ms-2" data-error-for="username"><?= $errors['username'] ?? '' ?></p>
          
          <div class="form-floating">
            <input id="password" 
                   name="password" 
                   type="password" 
                   autocomplete="off"
                   required
                   class="input-password form-control shadow-none" 
                   placeholder="كلمة المرور">
                   <label for="password">كلمة المرور</label>
        </div>
                
          <p class="error error-login text-danger ms-2 my-1" data-error-for="password"><?= $errors['password'] ?? $errors['user'] ??  '' ?></p>

     <button class="w-100 btn btn-lg mt-3 btn-primary py-2 px-3" type="submit">تسجيل الدخول</button>
</form>
</main>

<?php require base_path('views/partials/footer.php') ?>