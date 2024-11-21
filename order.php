<!DOCTYPE html>
<html>

<body>
    <h1> Complete the Form </h1>
    <?php
    $usr_name = $id = $city = $score = $grade = "";
    $err_usr_name = $err_id = $err_city = $err_score = $err_grade = "";
    $this_file_name = htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "Sending data to " . $this_file_name . "<br><br>";


    function clear_input(string $data): string
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error_flag = false; // assuming no error would occur
        if (isset($_POST["name"])) {
            $usr_name = clear_input($_POST["name"]);
            if (strlen($usr_name) == 0) {
                $error_flag = true;
                $err_usr_name = "Invalid user name or empty";
            }

        }
        if (isset($_POST["id"])) {
            $id = clear_input($_POST["id"]);
            if (is_numeric($id) == false) {
                $error_flag = true;
                $err_id = "Invalid user ID or empty";
            }
        }

        if (isset($_POST["city"])) {
            $city = clear_input($_POST["city"]);
            if (strlen($city) == 0) {
                $error_flag = true;
                $err_city = "Invalid city or empty";
            }
        }

        if (isset($_POST["score"])) {
            $score = clear_input($_POST["score"]);
            if (is_numeric($score) == false || $score > 100 || $score < 0) {
                $error_flag = true;
                $err_score = "Invalid user score or empty";
            }
        }

        if (isset($_POST["grade"])) {
            $grade = clear_input($_POST["grade"]);
            if (strlen($grade) == 0 || strlen($grade) > 1) {
                $error_flag = true;
                $err_grade = "Invalid user grade or empty";

            } else if (strlen($grade) == 1) {
                if ($grade != 'A' && $grade != 'B' && $grade != 'C') {
                    $error_flag = true;
                    $err_grade = "Invalid user grade or empty";
                }
            }

        }

        if ($error_flag == false) { //no error has occurred
            // creating database connection
            // specifying the connection parameters
            $connString = "mysql:host=localhost;port=8889;dbname=truman_cs";
            $user = "root";
            $pwd = "root";

            try {
                // creating a php database object
                $pdo = new PDO($connString, $user, $pwd);
                // exception handling parameters
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // creating the query to get rows of data from the table
                $sql = "INSERT INTO student_info SET id= $id, name = '$usr_name', city='$city', score=$score, grade='$grade'";
                $count = $pdo->exec($sql); // committing the query
    
                echo "$count row added to the table <br><br>";
                // closing the connection object
                $pdo = null;
            } catch (PDOException $e) { // exception handling
                echo "Database connection unsuccessful";
                die($e->getMessage());
            }
            // clear all the values
            $usr_name = $id = $city = $score = $grade = "";
        }
    }
    ?>

    <form action="<?php echo $this_file_name; ?>" method="POST">
        ID: <input type="text" name="id" value="<?php echo $id; ?>">
        <em>*
            <?php echo $err_id; ?>
        </em>

        <br><br>
        Name: <input type=" text" name="name" value="<?php echo $usr_name; ?>">
        <em>*
            <?php echo $err_usr_name; ?>
        </em>
        <br><br>
        City: <input type=" text" name="city" value="<?php echo $city; ?>">
        <em>*
            <?php echo $err_city; ?>
        </em>
        <br><br>
        Score: <input type=" text" name="score" value="<?php echo $score; ?>">
        <em>*
            <?php echo $err_score; ?>
        </em>
        <br><br>
        Grade: <input type=" text" name="grade" value="<?php echo $grade; ?>">
        <em>*
            <?php echo $err_grade; ?>
        </em>
        <br><br>

        <input type="submit">
    </form>
</body>

</html>