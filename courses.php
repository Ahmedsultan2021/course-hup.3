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
      <?php   if ($user->role == "it")  {?>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li><a  class="btn btn-primary text-white" href="course_add.php">Add New Course</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Fixed Layout</li> -->
          </ol>
        </div>
      <?php } ?>  
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
             <h3 class="card-title">Manage Cours Hub Courses</h3>
           
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Creadit Hours</th>
                      <th>Seats No</th>
                      <th>Avaliable Seats</th>
                      <th>Professor</th>
                      <th>Tuition</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php                       
                        $all_courses =$user->list_courses();
                        $i =0;
                        foreach($all_courses as $selected_course){
                            ?>
                            <tr 
                            <?php 
                              if($user->role == "student" && $user->in_course($selected_course["code"])) echo ' class="bg-success"';
                            ?>
                            >
                                          <!-- `code`, `name`, `creadit_hours`, `seats_no`, `professor_id`, `tuition`  -->

                                <td><?= ++$i; ?>  </td>
                                <td><?= $selected_course["code"]; ?></td>
                                <td><?= $selected_course["name"]; ?></td>
                                <td><?= $selected_course["creadit_hours"]; ?></td>                      
                                <td><?= $selected_course["seats_no"]; ?></td>                      
                                <td><?= $selected_course["seats_no"] - count(Course::get_registered_students($selected_course["code"])) ?></td>                      
                                
                                <td><?= $selected_course["prof_name"]; ?></td>                      
                                <td><?= $selected_course["tuition"]; ?></td>  
                                <?php   if ($user->role == "it")  {?>                    
                                    <td><a href="course_delete.php?course_id=<?= $selected_course["code"]; ?>"><i class="fa fa-trash text-danger" title="delete <?= $selected_course["name"]; ?>"></i></a></td>
                                <?php 
                                }elseif($user->role == "student" && !$user->in_course($selected_course["code"]) &&  count(Course::get_registered_students($selected_course["code"])) < $selected_course["seats_no"]){
                                
                                  ?>
                                    <td><a href="course_register.php?course_id=<?= $selected_course["code"]; ?>"><i class="fa fa-plus text-info" title="register into <?= $selected_course["name"]; ?>"></i></a></td>

                                  <?php
                                }                                
                                ?>
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