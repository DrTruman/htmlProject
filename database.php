<!DOCTYPE html>
<html>

<body>
    <?php
        
        commenting the function
        function pdo_connect_mysql()
        {
            // specifying the connection parameters
            $connString = "mysql:host=localhost;port=8889;dbname=truman_cs";
            $DATABASE_USER = 'kafi';
            $DATABASE_PASS = '1q2w3e4rTruman';
            try {
                // creating a php database object
                $pdo = new PDO($connString, $DATABASE_USER, $DATABASE_PASS);
                // exception handling parameters
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $exception) {
                // If there is an error with the connection, 
                // stop the script and display the error.
                echo "Database connection unsuccessful";
                // die($e->getMessage());
                exit('Failed to connect to database!');
            }
        }    
    
        session_start();
        echo "<h2> Creative query string in PHP </h2>";
        echo '</h1><br><br>';
        

    try {
        // creating a php database object
        $pdo = pdo_connect_mysql();
        
        // creating an array of id=>name 
        $studentList = [1001 => "Kafi Rahman", 2010=>"Justin Hunter", 10090=> "Jamil Melhem"];
        // storing array in the session cart key
        $_SESSION['cart'] = $studentList;

        // the following condition is now true
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            
        $array_to_question_marks = implode(',', array_fill(0, count($studentList), '?'));
        echo $array_to_question_marks."<br>";
                
        // creating the query to get rows of data from the table
        $sql = "SELECT * FROM student_info WHERE id IN (".$array_to_question_marks .")";
        echo $sql."<br>";
        $stmt = $pdo->prepare ($sql);
        // the keys are the id's of the products
        $stmt->execute(array_keys($studentList));
        
        echo "Displaying the obtained results here ...<br>";
        
        $studentRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Calculate the subtotal
        foreach ($studentRows as $student) {
            echo $student['id'] . "-" . $student['name'];
            echo "<br>";
        }
        }
        
        // closing the connection object
        $pdo = null;
    } catch (PDOException $e) { // exception handling
        echo "Database connection unsuccessful";
        die($e->getMessage());
    }
        // done displaying the records
        echo "<br> Thanks for using the program ... <br>";
        
    ?>



</body>
</html>