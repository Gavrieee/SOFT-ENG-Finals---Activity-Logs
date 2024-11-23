<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
	<style>
		.container {
			border-style: solid;
			border-color: red;
			border-radius: 25px;
			background-color: #ffcbd1;
			margin: 30px;
			padding: 30px;
			text-align: left;
		}

		.main>*:first-child {
			background-color: red;
			margin-right: 100000000000px;
			/* Pushes the first item to the left */
		}

		.container .indent {
			font-weight: bold;
			width: 50%;
			display: inline-block;
		}

		.container table,
		tr {
			border: none;
			width: 100%;
			font-size: 24px;
			font-weight: bold;
			table-layout: fixed;
			border-collapse: collapse;
		}

		.container td {
			border: none;
			padding: 10px 0px 10px 0px;
			border-bottom: 0.5px solid red;
		}
	</style>
</head>

<body>
	<div class="outerMain">
		<div class="main">
			<div><a href="index.php" class="button">Back</a></div>
			<div class="innerMain">
				<h1>Are you sure you want to delete this user?</h1>

				<?php $getUserByID = getUserByID($pdo, $_GET['applicant_id']); ?>
				<div class="container">
					<form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
						<table>
							<tr>
								<td>First Name</td>
								<td><?php echo $getUserByID['first_name']; ?></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><?php echo $getUserByID['last_name']; ?></td>
							</tr>
							<tr>
								<td>Date Added</td>
								<td><?php echo $getUserByID['date_added']; ?></td>
							</tr>
							<tr>
								<td>Phone Number</td>
								<td><?php echo $getUserByID['phone_number']; ?></td>
							</tr>
							<tr>
								<td>Years Experience</td>
								<td><?php echo $getUserByID['years_experience']; ?></td>
							</tr>
							<tr>
								<td>Licenses</td>
								<td><?php echo $getUserByID['licenses']; ?></td>
							</tr>
							<tr>
								<td>Certifications</td>
								<td><?php echo $getUserByID['certifications']; ?></td>
							</tr>
							<tr>
								<td>Education</td>
								<td><?php echo $getUserByID['education']; ?></td>
							</tr>
							<tr>
								<td>Desired Salary</td>
								<td><?php echo $getUserByID['desired_salary']; ?></td>
							</tr>
						</table>
				</div>
				<div>
					<input type="submit" name="deleteUserBtn" value="Delete" class="submit-button">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>