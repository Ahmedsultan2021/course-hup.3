<?php 
$page_name ="courses";
require("header.php")?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Courses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li><a  class="btn btn-primary text-white" href="courses.php">Show All Courses</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Fixed Layout</li> -->
          </ol>
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
             <h3 class="card-title">Add New Course</h3>
           
            </div>
            <div class="card-body">
          
            <div class="offset-3 col-6">           
            <form action="course_add_action.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="name">Creadit Hours</label>
                    <input type="number" min="1" max="6" class="form-control" id="creadit_hours" name="creadit_hours" placeholder="Enter Creadit Hours">
                  </div>                   
                  
                  <div class="form-group">
                    <label for="name">Seats Numbers</label>
                    <input type="number" min="1" max="50" class="form-control" id="seats_no" name="seats_no" placeholder="Enter Seats Numbers">
                  </div>                  
                  
                  <div class="form-group">
                    <label for="name">Tuition</label>
                    <input type="number" min="1000" max="50000" class="form-control" id="tuition" name="tuition" placeholder="Enter Tuition">
                  </div>
                  
                  <div class="form-group">
                    <label for="role">Professor</label>
                    <select class="custom-select form-control" name="professor_id" id="professor_id">
                        <?php 
                            $all_prof =$user->list_professors();
                            foreach($all_prof as $prof) {
                                echo "<option value='".$prof['id']."'>".$prof['name']."</option>  ";
                            }
                        ?>
                    </select>
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
              </div>
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