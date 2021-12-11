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
                        <h5>ADD MYSELF</h5>
                    </div>
                    <div class="card-body">
                        <form action="myself_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Myself Tittle</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">Myself Description</label>
                                <input class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" class="form-control" name="years">
                            </div>
                            <div class="form-group text-center">
                               <button type="submit" class="btn btn-warning" >Add</button>
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
<?php if(isset($_SESSION['success'])) { ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?=$_SESSION['success']?>',
})
</script>
<?php } unset($_SESSION['success']) ?>