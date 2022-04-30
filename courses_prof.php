<?php 
$page_name ="courses";
require("header.php");?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Courses</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">

    <?php                       
      $all_courses =$user->my_courses();
      $i =0;
      foreach($all_courses as $selected_course){
          ?>
          <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">                
                <h3 class="widget-user-username"><?= $selected_course["name"]; ?></h3>
                <h5 class="widget-user-desc">Code (<?= $selected_course["code"]; ?>)</h5>
                <h5 class="widget-user-desc">Creadit Hours <?= $selected_course["creadit_hours"]; ?></h5>
                <h5 class="widget-user-desc">Seats Numbers <?= $selected_course["seats_no"]; ?></h5>
                <h5 class="widget-user-desc">Avaliable Seats <?= $selected_course["seats_no"] - count(Course::get_registered_students($selected_course["code"])) ?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <?php 
                    $data =Course::get_registered_students( $selected_course["code"]);
                    foreach($data as $rs){
                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <?= $rs["name"]; ?>  <span class="float-right badge bg-primary"><?= $rs["grade"]; ?></span>
                        </a>
                      </li>
                                    
                    <?php
                    }
                  ?>
                 
                </ul>
              </div>
            </div>
          </div>

          <?php
                        }
                      ?>    

    </div>         
  </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require("footer.php")?>