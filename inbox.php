<?php
require 'session.php';
require 'dashboard_includes/header.php';
require 'db.php';

$select_massages = "SELECT * FROM massages";
$select_massages_result = mysqli_query($db_connect,$select_massages);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="card">
            <div class="card-header">
                <h3>Massages</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Massage</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_massages_result as $key=>$msg) { ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$msg['name']?></td>
                        <td><?=$msg['email']?></td>
                        <td><?=$msg['message']?></td>
                        <td>
                            <a href="message_delete.php?id=<?=$msg['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->














<?php require 'dashboard_includes/footer.php'; ?>