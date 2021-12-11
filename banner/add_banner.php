<?php 
require '../session.php';

require '../dashboard_includes/header.php';
?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>
    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>ADD BANNER</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Banner Tittle</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">Banner Description</label>
                                <textarea class="form-control" name="description"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Banner Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">Button Name</label>
                                <input type="text" class="form-control" name="btn">
                            </div>
                            <div class="form-group text-center">
                               <button type="submit" class="btn btn-warning" >Add Banner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require '../dashboard_includes/footer.php';
?>
<?php if(isset($_SESSION['invalid_extension'])) { ?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?=$_SESSION['invalid_extension']?>',
})
</script>
<?php } unset($_SESSION['invalid_extension']) ?>

<?php if(isset($_SESSION['size'])) { ?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?=$_SESSION['size']?>',
})
</script>
<?php } unset($_SESSION['size']) ?>

<?php if(isset($_SESSION['success'])) { ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?=$_SESSION['success']?>',
})
</script>
<?php } unset($_SESSION['success']) ?>