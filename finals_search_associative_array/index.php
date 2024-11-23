<?php

require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: lightblue;
            font-family: "Arial";
            color: #37474F;
        }

        .main {
            background-color: lightblue;
            padding: 0px 30px 10px 30px;
        }

        .mainQuery {
            /* background-color: lightpink; */
            text-align: center;
        }

        .innerQuery {
            /* background-color: lightgreen; */
            text-align: center;

            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .accountInfo {
            /* background-color: lightgoldenrodyellow; */
            display: flex;
            align-items: center;
            gap: 30px;
            flex-direction: row-reverse;
        }

        .mainTable {
            background-color: lightsalmon;
            margin-top: 30px;
            text-align: center;

        }

        .mainTable th {
            background-color: #37474F;
            color: white;
        }

        .mainTable th,
        td,
        tr,
        th {
            padding: 5px;
        }

        .mainTable table {
            border-collapse: collapse;
            border: 3px solid #37474F;
            border-radius: 15px;
        }

        /* Targets all odd rows */
        table tr:nth-child(odd) {
            background-color: #f2f2f2;
            /* Light gray for odd rows */
        }

        /* Targets all even rows */
        table tr:nth-child(even) {
            background-color: #ffffff;
            /* White for even rows */
        }

        .outerMainTable {
            /* background-color: lightseagreen; */
            /* padding: 0px 30px 0px 30px; */
        }

        .container {
            background-color: #F0F4F8;
            padding: 0px;
            margin: 30px 10px 10px 10px;
            width: 50%;
            border-radius: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .editNdelete {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            padding: 0px 5px 0px 5px;
        }

        .editNdelete a {
            font-size: 12px;
        }

        a.button {
            display: inline-block;
            /* Makes the link behave like a block element, like a button */
            padding: 10px 13px;
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

        .container .message {
            background-color: none;
            text-align: center;
            border-style: solid;
            width: 100%;
            font-weight: bold;
            border-radius: 30px;
            padding: 2px 10px 2 px 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="accountInfo">
            <form action="core/handleForms.php" method="POST">
                <input type="submit" name="logoutUserBtn" value="Log out" class="submit-button">
            </form>
            <h2> <?php echo $_SESSION['username'] ?></h2>
        </div>

        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
            <div class="container">
                <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                    <div style="text-align: center; padding: 30px; margin: 0px 100px 0px 100px;">
                        <h1>Job Application Database</h1>
                        <p><b>Confidential Information Notice:</b></p>
                        <p style="text-align: justify;">
                            The following section contains sensitive and confidential data. Access is strictly limited
                            to
                            authorized
                            personnel only. Unauthorized access or disclosure of this information is prohibited and may
                            result
                            in
                            disciplinary action. Please ensure proper handling and discretion when viewing or sharing
                            this
                            content.
                        </p>
                    </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <div>
                        <?php
                        if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

                            if ($_SESSION['status'] == "200") {
                                echo "<p class='message' style='color: white; background-color: green;'>{$_SESSION['message']}</p>";
                            } else {
                                echo "<p class='message' style='color: white; background-color: red;'>{$_SESSION['message']}</p>";
                            }
                        }
                        unset($_SESSION['message']);
                        unset($_SESSION['status']);
                        ?>
                    </div>
                </div>
                <div class="mainQuery">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                                <input type="text" name="searchInput" placeholder="Search a query"
                                    style="border-top-right-radius: 0px;  border-bottom-right-radius: 0px;" required>
                                <input type="submit" name="searchBtn" class="submit-button" value="Search"
                                    style="border-top-left-radius: 0px; border-top-left-radius: 0px;  border-bottom-left-radius: 0px;"
                                    required>
                            </form>

                        </div>
                    </div>
                    <div class="innerQuery">
                        <p><a href="index.php" class="button" style="width: 75px;">Clear</a></p>
                        <p><a href="insert.php" class="button" style="padding: 10px 16px;">+</a></p>
                        <p><a href="history.php" class="button" style="padding: 10px 16px;">History</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="outerMainTable">
            <div class="mainTable">
                <table style="width:100%; margin-top: 100px;">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Added</th>
                        <th>Phone Number</th>
                        <th>Years Experience</th>
                        <th>Licenses</th>
                        <th>Certifications</th>
                        <th>Education</th>
                        <th>Desired Salary</th>
                        <th>Action</th>
                    </tr>

                    <?php if (!isset($_GET['searchBtn'])) { ?>
                        <?php $getAllUsers = getAllUsers($pdo); ?>
                        <?php foreach ($getAllUsers as $row) { ?>
                            <tr>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['date_added']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><?php echo $row['years_experience']; ?></td>
                                <td><?php echo $row['licenses']; ?></td>
                                <td><?php echo $row['certifications']; ?></td>
                                <td><?php echo $row['education']; ?></td>
                                <td><?php echo $row['desired_salary']; ?></td>
                                <td>
                                    <div class="editNdelete">
                                        <a href="edit.php?applicant_id=<?php echo $row['applicant_id']; ?>" class="button">✎</a>
                                        <a href="delete.php?applicant_id=<?php echo $row['applicant_id']; ?>"
                                            class="button">⌫</a>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>

                    <?php } else { ?>
                        <?php $searchForAUser = searchForAUser($pdo, $_GET['searchInput']); ?>

                        <?php
                        $activity = "Searched";

                        $byUser = $_SESSION['username'];

                        // Retrieve the variable from the URL
                        $variable = $_GET['searchInput'];

                        // Sanitize the variable
                        $sanitized_searchInput = htmlspecialchars($variable, ENT_QUOTES, 'UTF-8');

                        $activity_log = insertHistorySearch(
                            $pdo,
                            $sanitized_searchInput,
                            $activity,
                            $byUser
                        ); ?>

                        <?php foreach ($searchForAUser as $row) { ?>
                            <tr>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['date_added']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><?php echo $row['years_experience']; ?></td>
                                <td><?php echo $row['licenses']; ?></td>
                                <td><?php echo $row['certifications']; ?></td>
                                <td><?php echo $row['education']; ?></td>
                                <td><?php echo $row['desired_salary']; ?></td>
                                <td>
                                    <div class="editNdelete">
                                        <a href="edit.php?applicant_id=<?php echo $row['applicant_id']; ?>"
                                            class="button">Edit</a>
                                        <a href="delete.php?applicant_id=<?php echo $row['applicant_id']; ?>"
                                            class="button">Delete</a>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>


    </div>

</body>

</html>