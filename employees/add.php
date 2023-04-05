<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,4);
$select = "SELECT * FROM `departments`";
$departments = mysqli_query($connect, $select);
$errors = [];
if (isset($_POST['send'])) {
    $name = filterValidation($_POST['name']);
    $salary = filterValidation($_POST['salary']);
    $departmentID =filterValidation( $_POST['departmentId']);
    //image code
    
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    $image_name = rand(0, 1000) . rand(0, 1000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;

    if (fileSizeValidation($_FILES['image']['name'], $_FILES['image']['size'], 3)) {
        $errors[] = "Your File bigger Than 3 miga";
    }
    if (fileTypeValidation($image_type, "image/jpeg", "image/png", "image/jpg")) {
        $errors[] = "Your File Out Side Types";
    }
    if (stringValidation($name, 2)) {
        $errors[] = "Please Enter Employee Name and length > 3 ";
    }
    if (numberValidation($salary)) {
        $errors[] = "Please Enter Valida Salary";
    }
    if(empty($errors)){
    move_uploaded_file($tmp_name, $location);
    $insert = "INSERT INTO `employees` VALUES (null , '$name' , $salary, '$image_name' ,$departmentID )";
    $i = mysqli_query($connect, $insert);
    path('employees/list.php');
    }
}
?>
<main id="main" class="main">
<?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?> </li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label class="m-2">Enter employees Name</label>
            <input type="text" name="name" class="form-control">

        </div>
        <div class="row" id="cost">
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

                    <input readonly placeholder="Total" type="text" name="salary" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="mb-2">Enter employees Photo</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label class="m-2" for="">Choose Department</label>
            <select type="text" name="departmentId" class="form-control">
                <?php foreach ($departments as $data) : ?>
                    <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button name="send" class="mt-3 btn btn-info">
            Send Data
        </button>
    </form>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>