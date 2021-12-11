<?php
require '../session.php';
require '../dashboard_includes/header.php';
require '../db.php';

$id = $_GET['id'];
$select_blog= "SELECT * FROM blog WHERE id=$id";
$select_result = mysqli_query($db_connect , $select_blog);
$after_assoc= mysqli_fetch_assoc($select_result);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
      </nav>
</div><!-- sl-pagebody -->
<div class="sl-pagebody">
    <div class="row">
      <div class="col-lg-6 m-auto ">
        <div class="card border-success text-dark bg-light mb-3>
              <div class="header">
                  <h3 class="text-center" > Users Information </h3>
              </div>
              <div class="body">
                <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Blog Image</td>
                      <td>
                      <img width="80" src="../upload/blog/<?= $after_assoc['image'] ?>" alt="">
                      </td>
                    </tr>

                    <tr>
                      <td>Title</td>
                      <td><?=$after_assoc["title"]?></td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td><?=$after_assoc["description"]?></td>
                    </tr>

                    <tr>
                      <td>Created At</td>
                      <td><?=$after_assoc["created_at"]?></td>
                    </tr>

                    <tr>
                      <td>Created_at</td>
                      <td><?=$after_assoc["created_at"]?></td>
                    </tr>
                  </tbody>
                </table>
            </div>
      </div>
    </div>
</div><!-- sl-pagebody -->
<?php require '../dashboard_includes/footer.php'; ?>
