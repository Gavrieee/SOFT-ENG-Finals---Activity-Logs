<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
	<style>
		input[type="number"] {
			background-color: #F9FAFB;
			/* Light background color */
			color: #37474F;
			/* Text color matching the button */
			border: 1px solid #B0BEC5;
			/* Soft border color */
			padding: 10px 15px;
			/* Padding for a spacious look */
			border-radius: 4px;
			/* Rounded corners */
			font-size: 16px;
			/* Font size */
			outline: none;
			/* Remove default outline */
			transition: border-color 0.3s ease, box-shadow 0.3s ease;
			/* Smooth transitions */
			width: 100%;
			box-sizing: border-box;
		}

		a.button {
			display: inline-block;
			/* Makes the link behave like a block element, like a button */
			padding: 10px 20px;
			/* Adds padding inside the button */
			background-color: #37474F;
			/* Sets a background color */
			color: white;
			/* White text color */
			text-align: center;
			/* Centers text inside the button */
			text-decoration: none;
			/* Removes the underline */
			border: none;
			/* Removes the default border */
			border-radius: 30px;
			/* Rounds the corners */
			font-size: 16px;
			/* Adjusts the font size */
			cursor: pointer;
			/* Shows a pointer cursor on hover */
			transition: background-color 0.3s ease, transform 0.2s ease;
			/* Smooth transitions for hover effects */
		}

		a.button:hover {
			background-color: #455A64;
			/* Changes background color on hover */
			transform: scale(1.05);
			/* Slight scale effect to give a "pressed" feeling */
		}

		a.button:active {
			background-color: #263238;
			/* Darker background when the button is clicked */
			transform: scale(0.98);
			/* Slightly shrinks the button to simulate clicking */
		}

		.main>*:first-child {
			background-color: red;
			margin-right: 100000000000px;
			/* Pushes the first item to the left */
		}
	</style>
</head>

<body>
	<div class="outerMain">
		<div class="main" style="padding: 30px;">
			<div><a href="index.php" class="button">Cancel</a></div>
			<div class="innerMain">
				<h1>Add another applicant</h1>
				<div class="mainForm">
					<form action="core/handleForms.php" method="POST">
						<p>
							<label for="firstName">First Name</label>
							<input type="text" name="first_name" required>
						</p>
						<p>
							<label for="firstName">Last Name</label>
							<input type="text" name="last_name" required>
						</p>
						<p>
							<label for="firstName">Phone Number</label>
							<input type="text" name="phone_number" required>
						</p>
						<p>
							<label for="firstName">Years Experience</label>
							<input type="number" name="years_experience" min="1" max="99" required>
						</p>
						<p>
							<label for="firstName">Licenses</label>
							<input type="text" name="licenses" required>
						</p>
						<p>
							<label for="firstName">Certifications</label>
							<input type="text" name="certifications" required>
						</p>
						<p>
							<label for="firstName">Education</label>
							<input type="text" name="education" requir	ed>
						</p>
						<p>
							<label for="firstName">Desired Salary</label>
							<input type="number" name="desired_salary" min="10000" max="99999999" required>
						</p>
				</div>
				<p>
					<input type="submit" name="insertUserBtn" class="submit-button" value="Add">
				</p>
				</form>
			</div>
		</div>
	</div>
</body>

</html>