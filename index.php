<!doctype html>
<html lang="en">
	<head>
		<title>Express SRL</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="/assets/main.js"></script>
		<link rel="stylesheet" href="/assets/style.css">
	</head>
	<body>
		<div class="container">
			<h2>Recharge Express SRL</h2>
			<h5><strong>List of Countries and Operators</strong></h5>
			<div class="alerts-container">
				<div class="alert alert-success" role="alert">
					<strong>Success!</strong> The action was completed succesfully.
				</div>
				<div class="alert alert-info" role="alert">
					<strong>Info!</strong> Make sure you save an operator only once. Otherwise it would trigger an error. 
				</div>
				<div class="alert alert-danger" role="alert">
					<strong>Oh no!</strong> There was an error. Please check params and try again later.
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th >Country ISO</th>
						<th>Country Name</th>
						<th>Operator ID</th>
						<th>Operator Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr></tr>
				</tbody>
			</table>
			<div class="spinner-container text-center">
				<img src="/assets/img/spinner.gif" alt="Loading...">
			</div>
		</div>
	</body>
</html>
