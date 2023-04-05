<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/NiceAdmin/index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/NiceAdmin/departments/add.php">
            <i class="bi bi-plus-circle"></i><span>ADD</span>
          </a>
        </li>
        <li>
          <a href="/NiceAdmin/departments/list.php">
            <i class="bi bi-list-ul"></i><span>LIST</span>
          </a>
        </li>
        <li>
          <a href="/NiceAdmin/departments/emptydepartment.php">
            <i class="bi bi-list-ul"></i><span>EMPTY DEPARTMENT</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-workspace"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/NiceAdmin/employees/add.php">
            <i class="bi bi-plus-circle"></i><span>ADD</span>
          </a>
        </li>
        <li>
          <a href="/NiceAdmin/employees/list.php">
            <i class="bi bi-list-ul"></i><span>LIST</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/NiceAdmin/admin/add.php">
            <i class="bi bi-plus-circle"></i><span>ADD</span>
          </a>
        </li>
        <li>
          <a href="/NiceAdmin/admin/list.php">
            <i class="bi bi-list-ul"></i><span>LIST</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/NiceAdmin/users-profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>
    <form method="POST" action="/NiceAdmin/shared/header.php">
      <li class="nav-item">
        <button class="nav-link collapsed" name="logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </button>
      </li>
    </form>
  </ul>
</aside>