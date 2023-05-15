<?php
//making connection with db
include('connect.php');

// retrieve course name from POST data
if (isset($_POST['course_name'])) {
    $courseName = mysqli_real_escape_string($conn, $_POST['course_name']);

    // retrieve dates for the selected course name
    $sql_dates = "SELECT course_date, course_level FROM courses WHERE course_name = '$courseName'";
    $result_date = mysqli_query($conn, $sql_dates);

    // create HTML options for the dates
    $options = '';
    while ($row = mysqli_fetch_array($result_date)) {
        $course_level = $row['course_level'];
        $formatted_date = date('d-m-Y', strtotime($row['course_date']));

        if($course_level == 'podstawowy') {
            echo"<option disabled selected style='font-style:italic;'>Wybierz datę</option>";
            $options .= "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
        }

        elseif($course_level == 'sredni') {
            echo"<option disabled selected style='font-style:italic;'>Wybierz datę</option>";
            $options .= "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
        }

        else {
            echo"<option disabled selected style='font-style:italic;'>Wybierz datę</option>";
            $options .= "<option value='" . $formatted_date . "'>" . $formatted_date . "</option>";
        }
    }

    // return HTML options
    if ($options) {
        echo $options;
    } 
    
    else {
        echo "<option value=''>Brak dostępnych terminów</option>";
    }
    echo "</select>"; 
} 

else {
    echo "<option value=''>Nie wybrano kursu</option>";
}
?>