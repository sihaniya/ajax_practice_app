
<?php
ob_start();
include "./config/config.php";
include "./app/manageCategory.php";
?>

<div class="page-header">
    <h4>Manage Category </h4>
    <div class="page-header-buttons">
        <a href="<?= $base_url ?>create-category.php" class="btn btn-primary">Add Category</a>
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $categoryGetResult->fetch_assoc()){?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?php 
                    if(isset($row['status'])){ echo $category_status[$row['status']];}
                ?></td>
                <td>
                    <a href="./edit-category.php?id=<?= $row['id']?>" class="btn btn-sm btn-success"> Edit</a>
                    <a onclick="return confirm('Are you sure?')"href="./category.php?id=<?= $row['id']?>&action=delete" class="btn btn-sm btn-danger"> Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>

<?php
$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle = 'Manage Category';
include('master.php');

?>