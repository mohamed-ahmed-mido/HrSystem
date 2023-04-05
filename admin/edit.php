<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth();
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $selectOneRow = "SELECT * FROM `admins` where id= $id ";
  $oneRow = mysqli_query($connect, $selectOneRow);
  $row = mysqli_fetch_assoc($oneRow);
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $rule = $_POST['rule'];
    $update = "UPDATE `admins` SET name='$name' , rule='$rule'  WHERE id=$id";
    $i = mysqli_query($connect, $update);
    // testMassage( $i , "update");
    path('/admin/list.php');
  }
} else {
  path('/admin/list.php');
}
$selectRule = "SELECT * FROM `rule`";
$rules = mysqli_query($connect, $selectRule);

?>
<main id="main" class="main">
  <form method="POST">
    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">Admin Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control">
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
    <button name="update" class="btn btn-primary mt-2">Update</button>
  </form>
</main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>