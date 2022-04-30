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
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li><a  class="btn btn-primary text-white" href="user_add.php">Add New User</a></li>
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
             <h3 class="card-title">Manage Cours Hub Users</h3>
           
            </div>
            <div class="card-body">
          
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Created At</th>
                      <th>Created By</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php                       
                        $all_users =$user->list_all_users();
                        $i =0;
                        foreach($all_users as $selected_user){
                            ?>
                            <tr>
                                <td><?= ++$i; ?>  </td>
                                <td><?= $selected_user["name"]; ?></td>
                                <td><?= $selected_user["email"]; ?></td>
                                <td><?= $selected_user["role"]; ?></td>                      
                                <td><?= $selected_user["created_at"]; ?></td>                      
                                <td><?= $selected_user["created_by_name"]; ?></td>                      
                                <td><a href="user_delete.php?user_id=<?= $selected_user["id"]; ?>"><i class="fa fa-trash text-danger" title="delete <?= $selected_user["name"]; ?>"></i></a></td>
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