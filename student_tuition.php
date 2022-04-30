<?php 
$page_name ="users";
require("header.php");?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Students</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
             <h3 class="card-title">Student Didn't Pay tuition</h3>
           
            </div>
            <div class="card-body">
          
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Student Name</th>
                      <th>Course Name</th>
                      <th>Tuition</th>                     
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php                       
                        $students_data =$user->list_student_didnot_pay();
                        $i =0;
                        foreach($students_data as $s){
                            ?>
                            <tr>
                                <td><?= ++$i; ?>  </td>
                                <td><?= $s["student_name"]; ?></td>
                                <td><?= $s["course_name"]; ?></td>
                                <td><?= $s["tuition"]; ?></td>
                               
                            </tr>
                            <?php
                        }
                      ?>
                    
                    
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require("footer.php")?>