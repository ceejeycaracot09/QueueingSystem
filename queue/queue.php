<?php
session_start();
include '../DBConnection.php';
$conn = OpenCon();

if (isset($_SESSION['id'])) {
    $loggedInUserId = $_SESSION['id'];
    //get the id of current logged in user
    $userQuery = "SELECT * FROM user_table WHERE id = $loggedInUserId";
    $userResult = $conn->query($userQuery);
    

    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $office = $userRow['office'];
        $windowNumber = $userRow['windows'];
        //Match the department
        $departmentIdQuery = "SELECT id FROM transaction_type WHERE department = '$office'";
        $departmentIdResult = $conn->query($departmentIdQuery);

        if ($departmentIdResult->num_rows > 0) {
            $departmentIdRow = $departmentIdResult->fetch_assoc();
            $departmentId = $departmentIdRow['id'];

        // Fetch waiting numbers based on the department of the current user
        $sql = "SELECT id FROM transaction_table WHERE status = 1 AND transaction_department = '$departmentId' ORDER BY created_on DESC LIMIT 3";
        $result = $conn->query($sql);

        $pendingList = '<ul class="no-bullets">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $task = $row['id'];
                $pendingList .= '<li>' . $task . '</li>';
            }
        }
        $pendingList .= '</ul>';
      } else {
        $pendingList = '<p>Error: Department not found in transaction_type table for the logged-in user</p>';
    }
} else {
    $pendingList = '<p>Error: Office not found for the logged-in user</p>';
}
} else {
$pendingList = '<p>Error: User ID not found in session</p>';
}

$conn->close();
//echo the output pass to AJAX
echo $pendingList . ',' . $windowNumber . ',' . $office;

?>