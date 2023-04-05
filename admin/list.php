<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth();
$select = "SELECT * FROM adminalldata";
$s = mysqli_query($connect, $select);
//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `admins` where id = $id ";
    $d = mysqli_query($connect, $delete);
    path('admin/list.php');
}
?>
<main id="main" class="main">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rule</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($s as $data) : ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['name'] ?></td>
                <td><?= $data['description'] ?></td>
                <th>
                    <a class="btn btn-danger" href="/NiceAdmin/admin/list.php?delete=<?= $data['id'] ?>">Remove</a>
                </th>
                <th>
                    <a class="btn btn-warning" href="/NiceAdmin/admin/edit.php?edit=<?= $data['id'] ?>">Edit</a>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>