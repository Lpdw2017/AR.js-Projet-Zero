<?php require 'header.php'; ?>
<div class="container">
    <div class="section">

      <div class="row">
        <div class="col md-12">
          <?php include('login.php');?>
        </div>
      </div>
    </div>
  </div>

  <?php
var_dump($_SESSION['log']);
  require 'footer.php'; ?>
