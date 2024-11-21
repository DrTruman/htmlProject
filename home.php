<!DOCTYPE html>
<html>

<body>
  <h1>
    <?php
    $user = "Randy";
    echo "<br>";
    echo "Hello $user !";
    echo "<br>";
    ?>
  </h1>
  <p>
    <?php
    echo "<strong>";
    $hourOfDay = intval(date("H"));
    // displaying greetings based on time of the day
    if ($hourOfDay > 6 && $hourOfDay < 12) {
      $greeting = "Good Morning";
    } else if ($hourOfDay == 12) { // optional else if
      $greeting = "Good Noon Time";
    } else { // optional else branch
      $greeting = "Good Afternoon or Evening";
    }
    echo "" . $greeting . "!";
    echo "</strong>";
    ?>
    <br>
    Welcome to the Server side programming.
  </p>


  <?php

  function getNiceTime(bool $showSeconds = true): string
  {
    if ($showSeconds == true) // is second needed?
      return "{" . date("h:i:sa") . "}";
    else
      return date("h:i"); // return time without second
  }


  $firstName = "Pablo";
  $lastName = "Picasso";

  /*Example one:
  These two lines are equivalent. Notice that you can reference PHP variables within a string literal defined with double quotes.
  The resulting output for both lines is:
  <em>Pablo Picasso</em>*/

  echo "<em>" . $firstName . " " . $lastName . "</em>";
  echo "<em> $firstName $lastName </em>";

  /* Example two: These two lines are also equivalent. 
  Notice that you can use either the single quote symbol or double quote 
  symbol for string literals. */

  echo "<h1>";
  echo "Time is: " . getNiceTime();
  echo '</h1>';

  $num = floatval("10.5");
  echo "Integer value $num <br>";
  $num = 900;
  $strNum = 10 + "";
  $strNum = 10.9595 + "";
  $strNum = $num + "";
  echo "String value: $num <br>";

  /* Example three: These two lines are also equivalent. In the second example, 
  the escape character (the backslash) is used to embed a double quote within a 
  string literal defined within double quotes. */

  echo '<img src="pumpkin.gif" >';
  echo "<img src=\"pumpkin.gif\" >";
  echo "<br>";

  // creating a class
  class Artist
  {
    public static $artistCount = 0;
    private $stID;
    private $firstName;
    private $lastName;
    function __construct($firstName, $lastName)
    {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->stID = ++self::$artistCount;
    }
    // creates a string by using instance variables
    function getHtml(): string
    {
      $textStr = "";
      $textStr = "<h3>";
      $textStr .= $this->firstName . " ";
      $textStr .= $this->lastName . " [$this->stID] </h3>";
      return $textStr;
    }
  }

  class ComputerArtist extends Artist
  {
    function digitalArt(): string
    {
      return "Drawing arts";
    }

  }

  // creating first objecct
  $instructor = new ComputerArtist("Kafi", "Rahman");
  echo $instructor->getHtml();
  echo $instructor->digitalArt();
  // creating second object
  $student = new ComputerArtist("James", "Smith");
  echo $student->getHtml();
  echo $student->digitalArt();




  include_once "footer.php";
  ?>
</body>

</html>