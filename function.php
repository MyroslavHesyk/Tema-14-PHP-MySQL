<?php

function get_action_menu()
{
    if ($_GET) {
        $m = $_GET['m'];
    } else {
        $m = 1;
    }
    return $m;
}

/* отримуємо назву авто та id з БД */
function get_menu_id()
{
    $q = mysql_query("SELECT id, name FROM car");
    for ($i = 0; $i < mysql_num_rows($q); $i++) {
        $row = mysql_fetch_array($q);
        $id[$i] = $row['id'];
    }
    return $id;
}
function get_menu_name()
{
    $q = mysql_query("SELECT id, name FROM car");
    for ($i = 0; $i < mysql_num_rows($q); $i++) {
        $row = mysql_fetch_array($q);

        $name[$i] = $row['name'];
    }
    return $name;
}



/* витягуємо з таблиці фото тільки ті фото який id_car співпадає з нашою змінною m */

function get_photo($m)
{
    $q1 = mysql_query("SELECT foto FROM foto_car WHERE id_car='$m'");
    for ($i = 0; $i < mysql_num_rows($q1); $i++) {
        $row = mysql_fetch_array($q1);
        $img_src[$i] = $row['foto'];
    }
    return $img_src;
}

function print_menu($id, $name, $m)
{
    for ($i = 0; $i < count($name); $i++) {
        if (($i + 1) == $m) {
            echo '<a class="active_menu" href="?m=' . $id[$i] . '  "> ' . $name[$i] . ' </a> <br>';
        } else {
            echo '<a href="?m=' . $id[$i] . ' "> ' . $name[$i] . ' </a> <br>';
        }
    }
}

function print_photo($img_src)
{
    for ($i = 0; $i < count($img_src); $i++) {
        echo ' <img src="' . $img_src[$i] . '" > ';
    }
}


/* ДОДАЛИ ОПИС */
function get_opus()
{
    $q = mysql_query("SELECT text FROM car");
    for ($i = 0; $i < mysql_num_rows($q); $i++) {
        $row = mysql_fetch_array($q);

        $opus[$i] = $row['text'];
    }
    return $opus;
}
function print_opus($m, $opus)
{
    for ($i = 0; $i < count($opus); $i++) {
        if ($m == ($i+1)) {
            echo '<p class="opus"> '.$opus[$i].' </p>';
        }
    }
}
