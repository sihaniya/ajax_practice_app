

<?php
ob_start();
include "./config/config.php";
include "./app/manageCategory.php";


?>

<div class="page-header">
    <h4>Create Todo </h4>
    <div class="page-header-buttons">
        <a href="<?= $base_url ?>todos.php" class="btn btn-secondary"> Back</a>
    </div>
</div>

<div class="page-body">
    <?php if(isset($_GET['success']) && isset($_GET['success']))  {?>
        <?php if($_GET['success'] == 'true') {?>
            <div class="alert alert-success" role="alert">
                <strong>Success! </strong><?= $_GET['message'] ?>
            </div>
        <?php }else{?>
            <div class="alert alert-danger" role="alert">
                <strong>Error! </strong><?= $_GET['message'] ?>
            </div>
        <?php } ?>
    <?php } ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <!-- form -->
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <?php foreach($category_status as $key => $value){?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                               <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" name="create_category">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle = 'Create Todo';
include('master.php');

?>