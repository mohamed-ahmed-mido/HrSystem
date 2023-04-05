<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,4);
$select = "SELECT * FROM `employeesjoindepartment`";
$s = mysqli_query($connect, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectOne = "SELECT * FROM `employeesjoindepartment` WHERE id = $id";
    $sOne = mysqli_query($connect, $selectOne);
    $row = mysqli_fetch_assoc($sOne);
    $image_name = $row['image'];
    unlink("./upload/$image_name");
    $delete = "DELETE FROM `employees` where id = $id ";
    $d = mysqli_query($connect, $delete);
    path('employees/list.php');
}
?>
<main id="main" class="main">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Image</th>
                <th>DepartmentID</th>
                <th colspan="2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($s as $data) : ?>
                <tr>
                    <th><?= $data['id']?></th>
                    <th><?= $data['empName']?></th>
                    <th><?= $data['salary']?></th>
                    <th><img src="./upload/<?= $data['image']?>" width="50"></th>
                    <th><?= $data['depName']?></th>
                    <th>
                        <a class="btn btn-danger" href="/NiceAdmin/employees/list.php?delete=<?= $data['id'] ?>">Remove</a>
                    </th>
                    <th>
                    <a class="btn btn-warning" href="/NiceAdmin/employees/edit.php?edit=<?= $data['id'] ?>">Edit</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>