<?php
require '../session.php';
require '../dashboard_includes/header.php';
?>
<?php
    require '../db.php';
    $select_project = "SELECT * FROM projects";
    $select_project_result = mysqli_query($db_connect,$select_project);
?>


<!-- ########## START: MAIN PANEL ########## -->
<?php if($_SESSION['role']!=0 ){ ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row" >
            <div class="col-lg-10 m-auto " >
                <div class="card" >
                <div class="card-header bg-dark text-center" >
                    <h3 class="text-white" >PROJECT INFORMATION </h3>
                </div>
                    <div class="card-body" > 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Completion</th>
                                    <th scope="col">Project Type</th>
                                    <th scope="col">Authors</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_project_result as $kay => $pro) { ?>
                                <tr>
                                    <th scope="row"> <?= $kay+1 ?> </th>
                                    <td> <?= $pro['title'] ?> </td>
                                    <td> <?= $pro['category'] ?> </td>
                                    <td> <?= $pro['client'] ?> </td>
                                    <td> <?= $pro['completion'] ?> </td>
                                    <td> <?= $pro['project_type'] ?> </td>
                                    <td> <?= $pro['authors'] ?> </td>
                                    <td> <?= $pro['budget'] ?> </td>
                                    <td>
                                        <img width="80" src="../upload/projects/<?= $pro['image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?php if($_SESSION['role']==1) { ?>
                                        <a id="project_delete.php?id=<?= $pro['id'] ?>"  class="btn btn-danger click">Delete</a>
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
