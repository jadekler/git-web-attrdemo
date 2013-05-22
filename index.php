<?php
// Let's get our SQL data!
include "lib/sql.php";
$users = getSQLData();
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/ui/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<h1>This is a demo <small>of HTML5 attr usage</small></h1>
			<span>
				Hover over each row. Note that additional details about the user pop up. Previously, this approach
				would have meant an AJAX call in JavaScript to access our SQL data. However, what if we already
				had the data requested when we were outputting the table in PHP? Note in lib/sql.php that the 'Age' 
				of each user is in the same table as the name - we already accessed the data that contains each user's 
				age in PHP just to output this table!
			</span>
			<span>
				With HTML5's data-attributes, this problem is remedied. During the table creation, simply add a 
				data-foo (where foo can be any word) on an HTML element with the data needed (e.g. we don't display
				the Age, but each row has a data-age attribute). This can then be referenced later by Javascript with
				$('.myRow').attr('data-age') for JS usage (in this case, tooltips).
			</span>
		</div>
		<div class="row-fluid">
			<table class="table userTable">
				<thead>
					<tr>
						<td><strong>Employee ID</strong></td>
						<td><strong>Name</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php
					// Now let's spit out our SQL data using data attribute tags. We can call the data attribute
					// anything we want - e.g. data-foobar - but we'll use email and age since that's what our 
					// data is called
					foreach($users as $user) {
						printf("<tr class='userRow' data-email='".$user['email']."' data-age='".$user['age']."'>
							<td class='userID'>".$user['id']."</td><td>".$user['name']."</td></tr>");
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	// Binds each row to our custom hover plugin
	$(".userRow").hoverplugin();
	</script>