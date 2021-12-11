<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_blog = "SELECT * FROM blog";
    $select_blog_result = mysqli_query($db_connect,$select_blog);
?>


<!-- ########## START: MAIN PANEL ########## -->
<?php if($_SESSION['role']!=0 ){ ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row" >
            <div class="col-lg-11 m-auto " >
                <div class="card" >
                <div class="card-header bg-dark text-center" >
                    <h3 class="text-white" >BlOG INFORMATION </h3>
                </div>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Blog Image</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_blog_result as $kay => $blog) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?></th>
                                    <td> <?= $blog['title'] ?></td>
                                    <td width='20%' > <?=substr($blog['description'],0,100).'....Read more' ?></td>
                                    <td> <?=$blog['created_at'] ?></td>
                                    <td>
                                        <img width="80" src="../upload/blog/<?= $blog['image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?php if($blog['status']) { ?>
                                            <a href="blog_status.php?id=<?=$blog['id']?>" class="btn btn-success" >Active</a>
                                        <?php } else{ ?>
                                            <a href="blog_status.php?id=<?=$blog['id']?>" class="btn btn-secondary" >deactivated</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="blog_view.php?id=<?= $blog['id'] ?>"  class="btn btn-warning m-1">View</a>

                                        <?php if($_SESSION['role']!=3) { ?>
                                        <a href="blog_edit.php?id=<?= $blog['id'] ?>"  class="btn btn-primary m-1">Edit</a>
                                        <?php } ?>

                                        <?php if($_SESSION['role']==1) { ?>
                                        <a id="blog_delete.php?id=<?= $blog['id'] ?>"  class="btn btn-danger click">Delete</a>
                                        <?php } ?>
                                    </td>
                                </tr>  
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php } ?>
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['limit'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['limit']?>',
        })
    </script>
<?php } unset($_SESSION['limit']) ?>
//   ///
<script>
    $('.click').click(function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=$(this).attr('id');
        }
        })
    })
    <?php if(isset($_SESSION['delete'])){?>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    <?php } unset($_SESSION['delete']); ?>
</script>