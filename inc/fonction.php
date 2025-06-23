<?php
    require("connexion.php");
function get_department_manager(){
    $sql = "
    SELECT d.dept_no, d.dept_name,
           CONCAT(e.first_name, ' ', e.last_name) AS manager_name
    FROM departments d
    JOIN dept_manager dm ON d.dept_no = dm.dept_no
    JOIN employees e ON dm.emp_no = e.emp_no";
    $result = mysqli_query(dbconnect(),$sql);
    return $result;
}

function get_employe_department($dept_no){
    $sql = "
    SELECT e.emp_no, e.first_name, e.last_name, e.gender, e.hire_date
    FROM employees e
    JOIN dept_emp de ON e.emp_no = de.emp_no
    WHERE de.dept_no = '$dept_no'"; 
    $result = mysqli_query(dbconnect(), $sql);
    return $result;
}

?>