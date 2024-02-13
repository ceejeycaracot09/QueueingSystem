<?php
include '../Script/qscript.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STUDENT</title>
    <link rel="stylesheet" href="../css/desktop-2.css">
    
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../css/get.queue.css"></script>
    
    <style>
        html, body{
            height:100%;
        }
        .form-container{
            display: none;
            margin-top: 20px;
        }
    </style>

</head>
<body class="bg-dark bg-gradient">
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Queuing System</h3>
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="    ">
                
            <button class="btn btn-sm btn-primary rounded-0 my-1" onclick = "showStudentForm()"><h5>Student</h5></button>
            <button class="btn btn-sm btn-primary rounded-0 my-1" onclick = "showOthersForm()"><h5>Others</h5></button>

            <div id = "studentForm" class = "form-container">
                <h2>Student Form</h2>
                <form method="POST" action="student-priority.php">
                    <h4>UNIVERSITY OF CEBU</h4>
                    <h4>Priority Number</h4>
                    <div class="floating-label">
                        <input placeholder="ID Number" type="text" id = "id_num" name = "id_num" autocomplete="off">
                        <label for="id_number">ID Number:</label>
                    </div>
                    <div class="floating-label">
                        <input placeholder="Name" type="text" id = "oldName" name = "oldName" autocomplete="off">
                        <label for="name">Name:</label>
                    </div>
                    <div class="floating-label">
                        <input placeholder="Email" type="email" id = "oldEmail" name = "oldEmail" autocomplete="off">
                        <label for="email">Email:</label>
                    </div>
                    <div class="floating-label">
                        <select id="first-dropdown" name="firstDropDown" onchange="loadSecondDropdown()">
                            <option value="">Department</option>
                            <?php
                            include '../DBConnection.php';
                            $connection = OpenCon();
            
                            $query = "SELECT * FROM transaction_type";
                            $result = mysqli_query($connection, $query);
            
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="floating-label">
                        <select id="second-dropdown" name="secondDropdown">
                            <option value="">Services</option>
                        </select>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div id = "othersForm" class = "form-container">
                <h2>Others Form</h2>
                <form method="POST" action="others-priority.php">
                    <h4>UNIVERSITY OF CEBU</h4>
                    <h4>Priority Number</h4>
                    <div class="floating-label">
                        <input placeholder="Name" type="text" id = "otherName" name = "otherName" autocomplete="off">
                        <label for="name">Name:</label>
                    </div>
                    <div class="floating-label">
                        <input placeholder="Mobile Number" type="text" id = "otherMobile" name = "otherMobile" autocomplete="off">
                        <label for="Mobile Number">Mobile Number:</label>
                    </div>
                    <div class="floating-label">
                        <input placeholder="Email" type="email" id = "otherEmail" name = "otherEmail" autocomplete="off">
                        <label for="email">Email:</label>
                    </div>
                    
                    <div class="floating-label">
                        <select id="first-dropdown-other" name="firstDropDownOthers" onchange="loadSecondDropdownOther()">
                            <option value="">Department</option>
                            <?php
                                include '../DBConnection.php';
                                $connection = OpenCon();
                
                                $query = "SELECT * FROM transaction_type";
                                $result = mysqli_query($connection, $query);
                
                                while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="floating-label">
                        <select id="second-dropdown-other" name="secondDropdownOthers">
                            <option value="">Services</option>
                        </select>
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
   </div>
</body>
</html>