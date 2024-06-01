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
    include 'function.php';

    $m = get_action_menu();
    $id = get_menu_id();
    $name = get_menu_name();
    $img_src = get_photo($m);
    $opus = get_opus();
    ?>

    <div id="logo">
        <h5>Кращі автомобілі світу</h5>
    </div>
    <div class="container">
        <table width='100%' border="1">
            <tr>
                <td id="menu" valign='top'>
                    <?php print_menu($id, $name, $m); ?>
                </td>
                <td id='image' rowspan="2">
                    <?php print_photo($img_src) ?>
                </td>
                <td id="menu" valign='top'>
                    <?php print_opus($m, $opus); ?>
                </td>
            </tr>
        </table>
    </div>


    <div id="logo">

        <h3>Розробник: <a href="https://github.com/MyroslavHesyk/Tema-14-PHP-MySQL" target="_blank"> MyroslavHesyk</a></h3>
        <h6>Всі права захищено <sup>©</sup> </h6>
    </div>
</body>

</html>