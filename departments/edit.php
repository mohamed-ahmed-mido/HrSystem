<?php 
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../app/config.php';
include '../app/function.php';
auth(2,3);
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $selectOneRow = "SELECT * FROM `departments` where id= $id ";
    $oneRow = mysqli_query($connect , $selectOneRow);
    $row = mysqli_fetch_assoc($oneRow);
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $update = "UPDATE `departments` SET name='$name' WHERE id=$id";
        $i=mysqli_query($connect , $update);
     testMassage( $i , "update");
     path('departments/list.php');
    }
}else{
    path('departments/list.php');
}
?>
<main class="main" id="main">
    <form method="POST">
        <div class="form-group">
            <label class="m-2">Enter Department Name</label>
            <input type="text" value="<?= $row['name'] ?>" name="name" class="form-control">
        </div>
        <button name="update" class="mt-3 btn btn-warning">
            Update Data
        </button>
    </form>
</main>
<?php 
include '../shared/footer.php';
include '../shared/script.php';
 ?>
