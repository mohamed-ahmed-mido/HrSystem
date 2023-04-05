<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth();
$selectRule = "SELECT * FROM `rule`";
$rules = mysqli_query($connect, $selectRule);
$errors = [];
if (isset($_POST['send'])) {
  $name = filterValidation($_POST['name']);
  $password = $_POST['password'];
  $hashpass = sha1($password);
  $rule = $_POST['rule'];
  if (stringValidation($name, 2)) {
    $errors[] = "Please Enter Employee Name and length > 3 ";
  } if (empty($errors)){
  $insert = "INSERT INTO `admins` VALUES (null,'$name','$hashpass' ,default, '$rule')";
  mysqli_query($connect, $insert);
  path('admin/list.php');
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
      <label for="" class="col-sm-2 col-form-label">Admin Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">Admin Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">Admin Rule</label>
      <div class="col-sm-10">
        <select name="rule" class="form-control">
          <?php foreach ($rules as $data) : ?>
            <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <button name="send" class="btn btn-primary mt-2">ADD</button>
  </form>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>