<?php 
$page = @$_GET['page'];

// if ($page=="dashboard"){
//   $dashboardaktif = 'active';
// }

if ($page=="menu"){
  $menuaktif = 'active';
}

?>

<div class="nav-wrapper">
  <ul class="nav flex-column">
    <!-- <li class="nav-item" >
      <a class="nav-link <?php echo $dashboardaktif ?>"  href="admin.php?page=dashboard">
        <i class="fas fa-home" style="margin-right:10px ;"></i>
        <span>Home</span>
      </a>
    </li> -->

    <li class="nav-item" >
      <a class="nav-link <?php echo $menuaktif ?>"  href="admin.php?page=menu">
        <i class="fas fa-book" style="margin-right:10px ;"></i>
        <span>Menu</span>
      </a>
    </li>
  </ul>
</div>

