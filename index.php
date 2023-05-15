<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css" type="text/css">
</head>

<body>
    <div class="container-fishes">
        <div class="group_table">
            <table>
                <h1>Wedkarstwo</h1>
                <tr>
                    <th>Nazwa</th>
                    <th>Występowanie</th>
                    <th>Styl Życia</th>
                </tr>
                <?php
                include("dbname.php");
                $sql = "SELECT `nazwa`, `wystepowanie`, `styl_zycia` FROM `ryby`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Wypisuje z Bazy danych Nazwę, wystepowanie, styl zycia
                        echo "<tr>";
                        echo "<td class='td_group'>" . $row['nazwa'] . "</td>";
                        echo "<td class='td_group'>" . $row['wystepowanie'] . "</td>";
                        echo "<td class='td_group'>" . $row['styl_zycia'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Brak Wyników z Bazy Danych";
                }
                ?>
            </table>
            <div class="un_table">
                <form action="index.php" method="post">
                    <h2>Wybierz Dowolną Rybę</h2>
                    <select name="FishOption">
                        <option value="Wybierz" selected>Wybierz Rybę</option>
                        <?php include "dbname.php"; ?>
                        <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <input type='submit' name='submit' class='button'></input>
                    <br>
                    <br>
            </div>
            <?php


            $option = $_POST['FishOption'];
            switch ($option) {
                default:
                    display($option);
            }
            
            function display($value)
            {
                if (isset($_POST["submit"])) {
                    include("dbname.php");
                    while ($row = $result1->fetch_assoc()) {
                        if ($value == $row["id"]) {
                            echo "<br> Ryba: " . $row["nazwa"];
                        }
                    }
                    while ($row = mysqli_fetch_array($result2)) {
                        if ($value == $row["id"]) {
                            echo "<br> Akwen: " . $row["akwen"] . "<br> wojewodztwo:"  . $row["wojewodztwo"] . "<br>";
                        }
                    }
                }
            }
            ?>
            </form>
        </div>
    </div>
</body>

</html>