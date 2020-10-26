<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Used numbers</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <h1> Generate numbers </h1>
    </header>
    <section class="used">
        <h2> Used Numbers </h2>
        <h3> Select a number you want to unuse </h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "randomNumbers";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die(mysqli_connect_error());
        }

        
        if ($_SERVER['QUERY_STRING']) {
            $selected = explode("&", $_SERVER['QUERY_STRING']);
            foreach ($selected as $n) {
                $n= explode('=', $n);
                $query = "DELETE FROM UnusedNumbers WHERE num=".$n[1];
                mysqli_query($conn, $query);
                $query = "INSERT INTO UsedNumbers(num) VALUES(" .$n[1]. ")";
                mysqli_query($conn, $query);  
            }
        }

        $query = "SELECT * FROM UsedNumbers";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > -1) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form action='unusedNumbers.php'>";
                $num = $row['num'];
                echo "<div class='inputs'>";
                echo "<input type='checkbox' class='checkboxes' name='num' value=" .$num. ">";
                echo "<label for=$num> $num </label> <br>";
                echo "</div>";
            }
            mysqli_close($conn);
            echo "<input type='submit' name= 'unuse' value='Submit'>";
            echo "</form>";
        }
        ?>
    </section>

</body>

</html>