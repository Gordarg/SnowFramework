<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo Translate::Label(Config::NAME) ?></a>
  <!-- TODO: --><input class="form-control form-control-dark w-100" type="text" placeholder="<?php echo Translate::Label('جستجو') ?>" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?php echo $BASEURL . 'log/out' ?>"><?php echo Translate::Label('خروج') ?></a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item active">
            <a class="nav-link" onclick="loadpost()">
              <!-- <span data-feather="file"></span> -->
              <?php echo Translate::Label('پست') ?> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="Hi.load('archive')">
              <?php echo Translate::Label('آرشیو') ?> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <!-- <span data-feather="shopping-cart"></span> -->
              <?php echo Translate::Label('فرم‌ساز') ?> 
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php echo Translate::Label('ادمین') ?></span>
          <a class="d-flex align-items-center text-muted" href="#">
            <!-- <span data-feather="plus-circle"></span> -->
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <!-- <span data-feather="file-text"></span> -->
              <?php echo Translate::Label('کاربران') ?>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo Translate::Label('داشبورد') ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div> -->
      <div class="content mb-4 mb-md-3">
      </div>
    </main>
  </div>
</div>