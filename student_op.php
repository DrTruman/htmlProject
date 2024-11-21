<!DOCTYPE html>
<html>

<body>

    <?php

    if (isset($_GET["id"]) && isset($_GET["op"])) {

        if ($_GET["op"] == 1) { // do search
            $id = $_GET["id"] + 0;

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
                $sql = "SELECT * FROM student_info WHERE id = $id ORDER BY name";
                $result = $pdo->query($sql);
                while ($row = $result->fetch()) {
                    echo $row["id"] . "–" . $row["name"];
                    echo "<br>";
                }
                // closing the connection object
                $pdo = null;
            } catch (PDOException $e) { // exception handling
                echo "Database connection unsuccessful";
                die($e->getMessage());
            }
        } else if ($_GET["op"] == 2) { // do delete
    
            $id = $_GET["id"] + 0;

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
                $sql = "DELETE FROM student_info WHERE id = $id";
                $count = $pdo->exec($sql);
                echo "$count student removed from the table";

                // closing the connection object
                $pdo = null;
            } catch (PDOException $e) { // exception handling
                echo "Database connection unsuccessful";
                die($e->getMessage());
            }
        }
    } else {
        header("Location: error.php");
    }
    ?>
</body>

</html>