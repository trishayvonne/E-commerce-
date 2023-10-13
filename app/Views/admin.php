<?= $this->include('admin/head'); ?>
  <body>
<div class="container-scroller">
      <?= $this->include('admin/header'); ?>
      <div class="container-fluid page-body-wrapper">
              <?= $this->include('admin/sidebar'); ?>
              <?= $this->include('admin/content'); ?>
              <div class="main-panel">
              <?= $this->include('admin/mainContent'); ?>
              <?= $this->include('admin/footer'); ?>
              </div>

      </div>
</div>
    <?= $this->include('admin/script'); ?> 
  </body>