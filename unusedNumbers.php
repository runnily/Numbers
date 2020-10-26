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
        <h1> Numbers </h1>
    </header>
    <section class="used">
        <h2> Unused Numbers </h2>
        <h3> Select a number you want to use </h3>
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
                $query = "DELETE FROM UsedNumbers WHERE num=".$n[1];
                mysqli_query($conn, $query);
                $query = "INSERT INTO UnusedNumbers(num) VALUES(" .$n[1]. ")";
                mysqli_query($conn, $query);
               
            }
        }

        $query = "SELECT * FROM UnusedNumbers";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > -1) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form action='usedNumbers.php'>";
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