<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кращі автомобілі світу</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once "db-connect.php";


    if ($_GET) {
        $m = $_GET['m'];
    } else {
        $m = 1;
    }

    /* отримуємо назву авто та id з БД */
    $q = mysql_query("SELECT id, name FROM car");
    for ($i = 0; $i < mysql_num_rows($q); $i++) {
        $row = mysql_fetch_array($q);
        $id[$i] = $row['id'];
        $name[$i] = $row['name'];
    }

    /* витягуємо з таблиці фото тільки ті фото який id_car співпадає з нашою змінною m */
    $q1 = mysql_query("SELECT foto FROM foto_car WHERE id_car='$m'");
    for ($i = 0; $i < mysql_num_rows($q1); $i++) {
        $row = mysql_fetch_array($q1);
        $img_src[$i] = $row['foto'];
    }


    ?>
    <table width='100%' border="1">
        <tr>
            <td id="logo">
                <h5>Кращі автомобілі світу</h5>
            </td>
            <td rowspan="2">
                <?php
                for ($i = 0; $i < count($img_src); $i++) {
                    echo '<p align=center> <img src="' . $img_src[$i] . '" width=90%> </p>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td id="menu" valign='top'>
                <?php
                for ($i = 0; $i < count($name); $i++) {
                    echo '<a href="?m=' . $id[$i] . ' "> ' . $name[$i] . ' </a> <br>';
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>