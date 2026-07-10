
   <nav class="navbar navbar-expand-lg navbar-light py-2 bg-white shadow-sm w-100">
      <h3 class="navbar-brand text-primary ms-3 fw-bold"><?= $heading ?? 'لوحة التحكم' ?></h3>
      
      <div class="collapse navbar-collapse border-0" id="nav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item welcome-link"><span class="nav-link welcome-message fs-6 fw-bold"><?=  $fullName ?? '' ?></span></li>
          <li class="nav-item"><img src="/assets/imgs/logo.jpg" alt="logo" width="70" height="70" class="nav-link rounded-circle"></li>
        </ul>
      </div>
   </nav>

