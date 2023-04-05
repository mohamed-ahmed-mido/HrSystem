<?php
include './shared/head.php';
include './shared/header.php';
include './shared/aside.php';
include './app/config.php';
include './app/function.php';
$adminId = $_SESSION['admin']['id'];
$select = "SELECT * FROM adminAllData WHERE id=$adminId";
$s = mysqli_query($connect , $select);
$row = mysqli_fetch_assoc($s);

if(isset($_POST['update_image'])){
  if(empty($_FILES['image']['name'])){
    $image = $row['image'];
    $imageName =$image;
  }else{
    $imageName = rand(0 ,1000).rand(0 ,1000).$_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $location = "./admin/upload/".$imageName;
    move_uploaded_file($tmpName,$location);
    $oldImage = $row['image'];
    if ($oldImage != "fake.jpg") {
        unlink("./admin/upload/$oldImage");
    }
  }
  $update = "UPDATE admins SET image='$imageName' WHERE id=$adminId";
  $s=mysqli_query($connect , $update);
  path("users-profile.php");
}
if(isset($_POST['update'])){
  $name =$_POST['empNewName'];
  $updateName = "UPDATE admins SET name='$name' WHERE id=$adminId";
  mysqli_query($connect , $updateName);
  path("users-profile.php");
}
?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/NiceAdmin/admin/upload/<?= $row['image']?>" alt="Profile" class="rounded-circle">
              <h2><?= $row['name']?></h2>
              <h3><?= $row['description']?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
          
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= $row['name']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Rule</div>
                    <div class="col-lg-9 col-md-8"><?= $row['description']?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              
                  <form method="POST">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="/NiceAdmin/admin/upload/<?= $row['image']?>" alt="Profile">
                        <div class="pt-2">
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-upload"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="empNewName" type="text" class="form-control" value="<?= $row['name']?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>

                </div>
            
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <label >Select Your Image</label>
          <input type="file" name="image">
          <button name="update_image" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
include './shared/footer.php';
include './shared/script.php';
?>
