<!DOCTYPE html>
<html>

<body>

    <?php
    $usr_name = $id = $city = $score = $grade = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["name"])) {
            $usr_name = $_GET["name"];
            echo "Welcome $usr_name <br>";
        } else {
            header("Location: error.php");
        }
        if (isset($_GET["id"])) {
            $id = $_GET["id"] + 0;
        } else {
            header("Location: error.php");
        }

        if (isset($_GET["city"])) {
            $city = $_GET["city"];
        } else {
            header("Location: error.php");
        }

        if (isset($_GET["score"])) {
            $score = $_GET["score"] + 0;
        } else {
            header("Location: error.php");
        }

        if (isset($_GET["grade"])) {
            $grade = $_GET["grade"];
        } else {
            header("Location: error.php");
        }
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
    
            echo "$count row added in the table";
            // closing the connection object
            $pdo = null;
        } catch (PDOException $e) { // exception handling
            echo "Database connection unsuccessful";
            die($e->getMessage());
        }


    }
    ?>

</body>

</html>