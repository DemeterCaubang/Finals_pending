<?php
	if (isset($_SESSION['role'])){
		
?>

<html lang="en">
<head>
	<title>header</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="tablefilter/style/tablefilter.css" />
</head>
<body style="background-color: rgba(0, 0, 0, .1);">	

	<nav class="navbar navbar-dark" style="background-color: rgba(34, 18, 119, 1);">
	  <div class="container-fluid">
		<a class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="margin-right: 16px;">
			<span class="navbar-toggler-icon"></span>
		</a>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="navbar-brand text-capitalize" aria-current="page" href="#">
			<?php 
        if(isset($_GET['site'])){
            echo $_GET['site'];
        }
        else{
            echo 'Dashboard';
        }
            ?></a>
          </li>
        </ul>

		  <?php
        if($_SESSION['role'] == "Head" || $_SESSION['role'] == "Admin"){
         
          ?>
		  <div class="d-none d-sm-block">

		  
		<nav id="navbar-example2" class="navbar navbar-dark flex-row .d-none .d-md-block .d-lg-none" style="background-color: rgba(34, 18, 119, 1);">
		  <ul class="nav nav-pills">
		  	 <li class="nav-item dropdown">
		      <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#" id="dropdownMenuLinkuser" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?><i class="fas fa-user" aria-hidden="true"></i><span class="badge badge-pill badge-danger"><?php 
					
					include 'backend/count_task_assigned_admin.p.php';
					
                                                                                                                                                                                                                                         ?></span></a>
		      <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkuser">
		        <a href="tasks.php?site=Unresolved%20Issues&page=1" class="dropdown-item">My Tasks <span class="badge badge-danger"><?php 
					
					include 'backend/count_task_assigned_admin.p.php';
					
				?></span></a>
				<?php if($_SESSION['role'] == "Head"){?>
				<a href="assign_issue_reports.php?site=Unassigned%20Reports&page=1" class="dropdown-item">Assign Issue Report</a>
				<?php	}
                ?>
				<?php if($_SESSION['role'] == "Head"){?>
				<a href="users.php?site=Users&page=1" class="dropdown-item">Manage Users</a>
				<?php	}
                ?>
		        <div role="separator" class="dropdown-divider"></div>
		        <a class="dropdown-item" href="backend/logout.p.php">Sign out</a>
		      </div>
		    </li>
			  
		    <li class="nav-item">
		      <a class="navbar-brand" href="assign_new_task.php?site=Assign%20new%20task" title="New Task Report"><i class="fa fa-tasks" aria-hidden="true"></i></a>
		    </li>
		    <li class="nav-item">
		      <a class="navbar-brand" href="assign_issue.php?site=Create%20Issue%20Report" title="New Issue Report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a>
		    </li>
		    <li class="nav-item">
		      <a class="navbar-brand" href="add_new_equipment.php?site=Add%20New%20Equipment" title="Add New Equipment"><i class="fa fa-plus" aria-hidden="true"></i></a>
		    </li>
		  </ul>
		</nav>
			  </div>
		
		<?php
        }
			 ?>
		

	  </div>
	  	
	</nav>

	<!-- SIDEBAR THAT SHOWS IF USER IS ON COMPUTER-->
	<!--
	 <div class="wrapper">
	<div class="d-none d-lg-block">
	<nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>
		</div>
 
		-->
	
	<!-- END OF SIDEBAR IF USER IS ON COMPUTER -->
	
		
			
		
	

	<!-- SIDEBAR THAT SHOWS IF USER IS ON MOBILE
		<div class="d-lg-none">
		-->
	
	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-color: FFE162;">
	  <div class="offcanvas-header">
		<div class="offcanvas-title" id="offcanvasExampleLabel">
			<img src="images/keoms_logo.png" alt="APC Logo" style="width:50px;height:50px;">
			<h5><strong>KEOMS</strong></h5></div>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	  </div>
	  <div class="offcanvas-body">
		<div>
		  Short for Key Equipment Operational Monitoring System, KEOMS is a responsive website that aims to help the BMO with reporting and storing data
		</div>
		<div class="dropdown mt-3">
		<ul class="list-unstyled ps-0">
		<?php
			if($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Head"){
        ?>
		
		
		  <li class="mb-1">
			<a class="btn btn align-items-center rounded" href="index.php?site=Dashboard&page=1">
			  Dashboard
			</a>
		  </li>
		  <li class="mb-1">
			<a class="btn btn align-items-center rounded" href="reports.php?site=Reports&page=1&time=day">
			  Reports
			</a>
		  <!--
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
			  Reports
			</button>
			<div class="collapse" id="dashboard-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark rounded">Daily</a></li>
				<li><a href="#" class="link-dark rounded">Weekly</a></li>
				<li><a href="#" class="link-dark rounded">Monthly</a></li>
				<li><a href="#" class="link-dark rounded">All Reports</a></li>
			  </ul>
			</div>
			-->
		  </li>
		  
		  <li class="mb-1">
		  <a class="btn align-items-center rounded" href="issues.php?site=Issues&page=1&time=month">
			  Issues
			</a>
		  <!--
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#issues-collapse" aria-expanded="false">
			  Issues
			</button>
			<div class="collapse" id="issues-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark rounded">New</a></li>
				<li><a href="#" class="link-dark rounded">Pending</a></li>
				<li><a href="#" class="link-dark rounded">Done</a></li>
				<li><a href="#" class="link-dark rounded">All issue reports</a></li>
			  </ul>
			</div>
			-->
		  </li>
		  
		  <li class="mb-1">
			<a class="btn align-items-center rounded" href="equipment.php?site=Equipment&page=1">
			  Equipment Inventory
			</a>
			<!--
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
			  Machines/Equipment
			</button>
			<div class="collapse" id="orders-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark rounded">HVAC</a></li>
				<li><a href="#" class="link-dark rounded">Gensets</a></li>
				<li><a href="#" class="link-dark rounded">Plumbing</a></li>
				<li><a href="#" class="link-dark rounded">Pumps</a></li>
				<li><a href="#" class="link-dark rounded">All machines</a></li>
			  </ul>
			</div>
			-->
		  </li>
		  <div class="d-sm-none">
			  <li class="mb-1">
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
			  Management
			</button>
			<div class="collapse" id="orders-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="tasks.php?site=Unresolved%20Issues&page=1" class="link-dark rounded">Tasks <span class="badge badge-danger"><?php 
                
                include 'backend/count_task_assigned_admin.p.php';
                
                                                                                                                                         ?></span></a></li>
				<li><a href="assign_new_task.php?site=Assign%20new%20task" class="link-dark rounded d-lg-none">Assign New Task</a></li>
				<?php if($_SESSION['role'] == "Head"){?>
				<li><a href="assign_issue_reports.php?site=Unassigned%20Reports&page=1" class="link-dark rounded">Assign Issue Report</a></li>
				<?php	}
                ?>
				<li><a href="add_new_equipment.php?site=Add%20New%20Equipment" class="link-dark rounded d-lg-none">Add New Equipment</a></li>
				<li><a href="assign_issue.php?site=Create%20Issue%20Report" class="link-dark rounded d-lg-none">Create Issue Report</a></li>
				<?php if($_SESSION['role'] == "Head"){?>
				<li><a href="users.php?site=Users&page=1" class="link-dark rounded">Manage Users</a></li>
				<?php	}
                ?>
			  </ul>
			</div>
		  </li> 
		  </div>
		   
		  
		  
			<!--<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item">
					<a href="#" class="nav-link active" aria-current="page">
					<svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
					Employees
					</a>

			
			</ul>
			
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
			  Employees
			</button>
			
			<div class="collapse" id="users-collapse">
			  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				<li><a href="#" class="link-dark rounded">Normal users</a></li>
				<li><a href="#" class="link-dark rounded">Admin users</a></li>
				<li><a href="#" class="link-dark rounded">All users</a></li>
			  </ul>
			</div>-->
		

			</li>

		  
		  
		  
		  <?php
			} else{
		  ?>
			
			<ul class="nav nav-pills flex-column mb-auto">
			  <li class="nav-item">
				<a href="tasks.php?site=My%20Tasks&page=1" class="nav-link <?php 
					if(isset($_GET['site'])){
						if($_GET['site'] == "My Tasks"){
							echo 'active';
						}
					}
				?>" aria-current="page">
				  <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
				  Tasks
				</a>
			  </li>
			  <li>
				<a href="technician_reports.php?site=My%20Reports&page=1" class="nav-link <?php 
					if(isset($_GET['site'])){
						if($_GET['site'] == "My Reports"){
							echo 'active';
						}
					}else{
						echo 'link-dark';
					}
				?>">
				  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
				  Reports
				</a>
			  </li>
			  <li>
				<a href="technician_reports.php?site=My%20Issues%20Reported&page=1" class="nav-link <?php 
					if(isset($_GET['site'])){
						if($_GET['site'] == "My Issues Reported"){
							echo 'active';
						}
					}else{
						echo 'link-dark';
					}
				?>">
				  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
				  Issues
				</a>
			  </li>
			</ul>
			
			
			
			<?php
			}
			?>
		  <li class="border-top my-3"></li>
		 
		
		  <div class="d-grid gap-2">
			<a class="btn btn-primary btn-large" href="backend/logout.p.php">
			  Sign out
			</a>
			
		  </div>
		</ul>
		</div>
	  </div>
	</div>
	</div>

	<!-- END OF DESIGN OF THE HEADER AND SIDEBAR -->
	
	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	

	<script type="text/javascript">
	
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})
	</script>
  
  <script type="text/javascript">
	(function () {
	  'use strict'
	  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
		new bootstrap.Tooltip(tooltipTriggerEl)
	  })
	})()
	
	document.addEventListener("DOMContentLoaded", () =>{
		const rows = document.querySelectorAll("tr[data-href]");
		
		rows.forEach(row => {
			row.addEventListener("click", ()=>{
				window.location.href = row.dataset.href;
			});
		});
	});
  </script>

<?php

	}else{
		header("Location: login.php");
		exit();
	}
?>