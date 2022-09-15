<?php

if (isset($_GET['uitrekenen'])) {
    if (!empty($_GET['naam']) && !empty($_GET['bedrag']) && !empty($_GET['btw'])) {
        $bedrag = filter_input(INPUT_GET, 'bedrag', FILTER_VALIDATE_FLOAT);
        if ($bedrag === false) {
            echo "Alle velden zijn ingevuld, maar bedrag is geen getal! <br>";
        } else {
            if ($_GET['btw'] === '6') {
                $inclusiefBtw = $bedrag * 1.06;
            } else {
                $inclusiefBtw = $bedrag * 1.21;
            }
            echo "<br> Je naam is:" . $_GET['naam'] . " <br>";
            echo "Het bedrag exclusief btw is " . $bedrag . "euro <br>";
            if ($_GET['btw'] === '6') {
                echo 'btw is laag 6% <br>';
            } else {
                echo 'btw is hoog 21% <br>';
            }
            echo "Het bedrag inclusief btw is " . $inclusiefBtw . " euro <br>";
        }

    } else {
        echo "Niet alle velden zijn ingevuld!<br>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="get" action="verwerk.php">
        <label for="naam">naam:</label>
        <input id="naam" type="text" name="naam" value=""/>
        <br><br>
        <label for="bedrag">bedrag exclusief BTW</label>
        <input id="bedrag" type="text" name="bedrag" value=""/>
        <br>

        <input class="nostyle" type="radio" name="btw" value="6" />Laag, 6%
        <br>
        <input class="nostyle" type="radio" name="btw" value="21" />Hoog, 21%

        <br><br>

        <input type="submit" name="uitrekenen" value="verwerk" />
    </form>

</body>
</html>
