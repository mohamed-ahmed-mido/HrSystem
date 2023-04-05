<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,3);
$select = "SELECT * FROM `employeesnotjoin`";
$s = mysqli_query($connect , $select);
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM `departments` where id = $id ";
    $d = mysqli_query($connect , $delete);
    path('departments/emptydepartment.php');
}
?>

<main id="main" class="main">
    <table class="table table-bordered text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">ACTION</th>
        </tr>
        <?php foreach($s as $data): ?>
            <tr>
                <th><?= $data['id']?></th>
                <th><?= $data['depName']?></th>
                <th>
                    <a class="btn btn-danger" href="/NiceAdmin/departments/emptydepartment.php?delete=<?= $data['id'] ?>">Remove</a>
                </th>
                <th>
                    <a class="btn btn-warning" href="/NiceAdmin/departments/edit.php?edit=<?= $data['id'] ?>">Edit</a>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>