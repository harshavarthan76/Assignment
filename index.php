<?php 
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <link rel="stylesheet" href="style.css">  
</head>

<body>

    <h1>Employee Details</h1>    
    <div class="container">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Dept</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Active</th>
            </tr>

            <?php
            $sql = "SELECT * FROM employees;";
            $result = mysqli_query($conn,$sql);
            $resultcheck = mysqli_num_rows($result);

            if($resultcheck){
                While($row = mysqli_fetch_assoc($result)){
            
                    $hire_date = new DateTime($row['hire_date']);

                    $currdate = new DateTime(); 
                    $diff = $currdate->diff($hire_date)->format("%y"); // Calculating the difference between dates
                    
                    if($row['active']){
                        $active = "Yes";   // to display if the employee is active in the organization
                        if($diff>=5)
                            echo "<tr style='background-color:#82E0AA;'>";   // if active and been there for five years flagging them in green color
                    }else{
                        $active = "No";
                        echo '<tr>';
                    }
                
                    // Displaying the data
                    echo '
                    <td>'. $row['emp_id'] .'</td>
                    <td>'. $row['emp_name'] .'</td>
                    <td>'. $row['birth_date'] .'</td>
                    <td>'. $row['gender'] .'</td>
                    <td>'. $row['hire_date'] .'</td>
                    <td>'. $row['dept'] .'</td>
                    <td>'. $row['position'] .'</td>
                    <td>'. $row['salary'] .'</td>
                    <td>'. $active .'</td>
                    </tr>';                
                }
            }
            else{
                echo "No data Found";
            }      
            ?>            
        </table>

    </div>
    
    <!-- Description -->
    <br><br><br><br><br>
    <div class="desc" ></div>
    <p> ----->   The Data flagged as Green are the employees who are active and has been in the company/organization for more than 5 Years</p>

</body>
</html>





