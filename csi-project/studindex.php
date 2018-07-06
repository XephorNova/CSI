<?php include('layout/header.php');?>
<div class="jumbotron container-fluid">
<h2 class="text-center">KJSIEIT-CSI</h2>


<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">KJSIEIT-CSI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="studindex.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Workflow</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">core</a>
            <a class="dropdown-item" href="#">team</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Achievements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Seminars</a>
      </li><li class="nav-item">
        <a class="nav-link" href="pages/post.php">Blogs</a>
      </li><li class="nav-item">
        <a class="nav-link" href="pages/studproblems.php">Quiz</a>
      </li>
      
    </ul>
  </div>
</nav>
</div>


<?php include('layout/footer.php');?>