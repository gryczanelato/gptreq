if(isset($_POST['add'])) {
              $course_name = $_POST['course_name'];
              $course_level = $_POST['course_level'];
              $course_date = $_POST['course_date'];
              $coursant_name = $_POST['coursant_name'];

              $insertQuery = "INSERT INTO booked (course_name, course_level, course_date, coursant_name) VALUES ('$course_name', '$course_level', '$course_date', '$coursant_name')";
              mysqli_query($conn, $insertQuery);
            }

            //variable that shows the content of the database table in the html table
            $result = mysqli_query($conn, "SELECT * FROM booked");

            <?php 
            session_start();
            //Check if form is submitted

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Get form data
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_img = $_POST['product_img'];
                $product_id = $_POST['product_id'];
            }
            ?>