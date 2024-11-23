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
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: lightblue;
            font-family: "Arial";
            color: #37474F;
        }

        .container1 {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .element1 {
            background-color: #F0F4F8;
            color: #37474F;
            text-align: center;
            margin: auto;
            padding: 20px 30px 20px 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
            border-radius: 30px;

            width: auto;
            height: auto;
        }

        /* .main>*:first-child {
            background-color: red;
            margin-right: 100000000000px;
            /* Pushes the first item to the left */


        .mainTable {
            background-color: #F0F4F8;
            margin: 30px;
            padding: 15px;
            text-align: center;
            border: 0.5px solid #37474F;
            border-radius: 25px;
            max-height: 300px;
            /* Set the height limit (e.g., height of 5 items) */
            overflow-y: auto;
            /* Enable vertical scrolling if content exceeds max-height */

            box-shadow: inset 0px 1px 8px rgba(0, 0, 0, 0.3),
                /* Top shadow */
                inset 0px -1px 8px rgba(0, 0, 0, 0.2),
                /* Bottom shadow */
                inset 1px 0px 8px rgba(0, 0, 0, 0.2),
                /* Left shadow */
                inset -1px 0px 8px rgba(0, 0, 0, 0.2);
            /* Right shadow */
        }

        .mainTable::-webkit-scrollbar {
            display: none;
            /* Hides the scrollbar */
        }

        .mainTable th,
        td,
        tr,
        th {
            border-collapse: collapse;
            background-color: #F0F4F8;
            padding: 5px;
            width: 1%;
            font-size: 14px;
            border-color: #37474F;
            font-weight: bold;
            border: 1.5px solid #37474F;
            text-align: center;

            /* vertical-align: middle; */
        }

        .mainTable th {
            background-color: #37474F;
            color: white;
        }

        .mainTable table {
            border-collapse: collapse;
            border: 1.5px solid #37474F;
            border-radius: 10px;
            table-layout: auto;
            /* overflow: hidden; */
        }

        .mainTable tr {
            border-collapse: collapse;
        }

        .tableCells {
            /* background-color: lightgreen; */
            background-color: #F0F4F8;
            /* background-color: #f7f5c3; for edit */
            /* background-color: #cbf7c3; for insert */
            /* background-color: #f7c3c3; for delete */
            /* background-color: #c3f0f7; for search */
            padding: 0px 10px 10px 10px;
            margin: 10px 5px 10px 5px;
            border: 1.5px solid #37474F;
            border-radius: 15px;
            /* width: auto; */
        }
    </style>
</head>

<body>
    <div><a href="index.php" class="button">Cancel</a></div>
    <div class="container1">
        <div class="element1">
            
            <div class="innerMain">
                <div style="text-align: center;">
                    <h1>History</h1>
                    <p>This is the history page.</p>

                </div>
                <div class="mainTable">
                    <?php $getAllHistory = getAllHistory($pdo); ?>
                    <?php foreach ($getAllHistory as $row) { ?>

                        <?php

                        $activity = $row['activity'];
                        $color = '';
                        $background_color = '';

                        if ($activity === 'Edited') {
                            $color = 'orange';
                            $background_color = '#f7f5c3';
                        } elseif ($activity === 'Deleted') {
                            $color = 'red';
                            $background_color = '#f7c3c3';
                        } elseif ($activity === 'Inserted') {
                            $color = 'green';
                            $background_color = '#cbf7c3';
                        } elseif ($activity === 'Searched') {
                            $color = 'blue';
                            $background_color = '#c3f0f7';
                        } else {
                            $color = 'black'; // Default color
                            $background_color = '#F0F4F8';
                        }
                        ?>

                        <div class="tableCells" style="background-color: <?php echo $background_color; ?>">

                            <?php if ($activity === 'Searched') { ?>

                                <p><b><?php echo $row['byUser']; ?></b> browsed through the records (<b><span
                                            style="color: <?php echo $color; ?>; "><?php echo $activity; ?></span></b>).
                                </p>

                                <!-- <h3>"<?php echo $row['searchQuery']; ?>"</h3> -->

                                <table>
                                    <tr>
                                        <th>Searched</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row['searchQuery']; ?></td>
                                    </tr>
                                </table>

                            <?php } else { ?>

                                <p><b><?php echo $row['byUser']; ?></b> had made some changes (<b><span
                                            style="color: <?php echo $color; ?>; "><?php echo $activity; ?></span></b>).
                                </p>
                                <table>
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
                                    </tr>
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
                                    </tr>
                                </table>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>




</body>

</html>