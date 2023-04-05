<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,3);
$errors = [];
if(isset($_POST['send'])){
    $name = filterValidation($_POST['name']);
    if (stringValidation($name, 2)) {
      $errors[] = "Please Enter Employee Name and length > 3 ";
  }if(empty($errors)){
    $insert = "INSERT INTO `departments`(`id`, `name`) VALUES (null,'$name')";
    mysqli_query($connect , $insert);
    path('departments/list.php');
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
  <form method="POST">
    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">Department Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control">
        <button name="send" class="btn btn-primary mt-2">ADD</button>
      </div>
    </div>
  </form>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>
