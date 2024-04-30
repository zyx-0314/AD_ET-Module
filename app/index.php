<?php
    session_start();

    $name = "";

    if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing lang jud</title>
</head>

<body>
    <section>
        <h2>Enter your name: <?php echo $name?></h2>

        <form action="" method="post">
            <label for="">Name: </label>
            <input type="text" name="name" id="">
            <input type="hidden" name="key" value="inputName" >
            <button
                type="submit"
            >Submit</button>
        </form>

        <form action="" method="post">
            <div>
                <label for="">Value 1</label>
                <input type="number" name="number1" id="">
            </div>
            <div>
                <label for="">Value 2</label>
                <input type="number" name="number2" id="">
            </div>
            <input type="hidden" name="key" value="compute2value">
            <button type="submit">Submit</button>
        </form>

        <form action="" method="post">
            <label for="">How many sorry</label>
            <input type="number" name="number" id="">
            <input type="hidden" name="key" value="sorry">
            <button type="submit">Submit</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $key = htmlspecialchars($_POST["key"]);
                switch ($key) {
                case "inputName":
                    $nameHolder = htmlspecialchars($_POST["name"]);
                    $_SESSION["name"] = $nameHolder;
                    break;
                case "compute2value":
                    $a = htmlspecialchars($_POST["number1"]);
                    $b = htmlspecialchars($_POST["number2"]);
                    echo $a ." + ". $b ." = " . $a + $b;
                    break;
                case "sorry":
                    $howMany = htmlspecialchars($_POST["number"]);
                    for($i = 0; $i < $howMany; $i++)
                    {
                        echo "<p>" . ($i + 1) . " Sorry!</p>";
                    }
                    break;
                default:
                    echo "None of the choices";
                    break;
                }
            }
        ?>
    </section>
</body>

</html>