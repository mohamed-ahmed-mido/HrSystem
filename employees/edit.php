<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,4);
$select = "SELECT * FROM `departments`";
$departments = mysqli_query($connect, $select);
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `employeesjoindepartment` WHERE id=$id";
    $s = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($s);
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $departmentID = $_POST['departmentId'];

        if (empty($_FILES['image']['name'])) {
            $image_name = $row['image'];
        } else {
            $oldImage = $row['image'];
            unlink("./upload/$oldImage");
            //image code
            $image_name = rand(0, 1000) . rand(0, 1000) . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "upload/" . $image_name;
            move_uploaded_file($tmp_name, $location);
        }
        $insert = "UPDATE `employees` SET name ='$name' , salary = $salary , image='$image_name' , departmentId = $departmentID Where id=$id";
        $i = mysqli_query($connect, $insert);
        testMassage($i, "Updated");
        path("employees/list.php");
    }
}
?>
<main id="main" class="main">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label class="m-2">Enter employees Name</label>
            <input type="text" value="<?= $row['empName'] ?>" name="name" class="form-control">

        </div>
        <div class="mb-3 row" id="cost">
            <div class="col-md-3">
                <div class="form-group">

                    <input placeholder="Gross" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">

                    <input placeholder="Tax" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">

                    <input placeholder="Bouns" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">

                    <input readonly value="<?= $row['salary'] ?>" placeholder="Total" type="text" name="salary" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <span>Edit photo : <img src="./upload/<?= $row['image'] ?>" width="50"></br></span>
            <label class="m-2">Enter employees Photo</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label class="m-2" for="">Choose Department</label>
            <select type="text" name="departmentId" class="form-control">
                <option value="<?= $row['depId'] ?>"><?= $row['depName'] ?></option>
                <?php foreach ($departments as $data) : ?>
                    <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button name="send" class="mt-3 btn btn-info">
            Update Employees
        </button>
    </form>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>