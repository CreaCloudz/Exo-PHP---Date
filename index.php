<!DOCTYPE html>
<htlm>

    <head>
        <title>Tp intro PHP</title>
        <meta charset="UTF-8 "/>

    </head>

    <body>


    <?php

    echo "Exo 1 - 1 : " . date("d/m/Y") . "<br>";
    echo "Exo 1 - 2 : " . date("d/m/y") . "<br>";
    echo "Exo 1 - 3 : " . date("d/m/Y H:i:s") . "<br>";

    $dateNow = new DateTime();
    echo "Exo 1 - 4 : " . $dateNow->getTimestamp() . "<br>";

    $dateAfter = new DateTime("2022-07-" + date("d") + 1);
    echo "Exo 1 - 5 : " . $dateAfter->getTimestamp() . "<br>";

    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');
    echo "Exo 2 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");

    $week = $dateNow->format("W");
    echo "Exo 2 - 2 : " . "Nombre de semaine : $week" . "<br>";

    for ($i = 1; $i < 13; $i++) {
        $number = cal_days_in_month(CAL_GREGORIAN, $i); // 31
        $monthName = strftime(date("F", mktime(0, 0, 0, $i, 10)));
        echo "Exo 3 - 1 : Il y a " . $number . " jours en " . $monthName . "<br>";
    }

    echo "Exo 4 -1 : Il reste encore " . days_until_next_birthday(9, 9) . " jours avant ton aniversaire. <br>";

    $birthday = new DateTime("09/09");
    echo "Exo 4 -1 : Il reste encore " . strtotime(days_until_next_birthday(9, 9) . " day", 0) . " seonces avant ton aniversaire. <br>";

    $hier = date('d-m-Y', strtotime('-1 day'));
    echo "Exo 5 - 1 :  Hier - " . $hier . "<br>";

    $now = date('d-m-Y');
    echo "Exo 5 - 1 :  Maintenant - " . $now . "<br>";

    $demain = date('d-m-Y', strtotime('+1 day'));
    echo "Exo 5 - 1 :  Demain - " . $demain . "<br>";

    date_default_timezone_set('Europe/Paris');
    echo "Exo 6 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");
    date_default_timezone_set('America/Montreal');
    echo "Exo 6 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");
    date_default_timezone_set('America/Los_Angeles');
    echo "Exo 6 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");
    date_default_timezone_set('Asia/Kuala_Lumpur');
    echo "Exo 6 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");
    date_default_timezone_set('Hongkong');
    echo "Exo 6 - 1 : " . utf8_encode(strftime('%A %d %B %Y, %H:%M') . "<br>");

    date_default_timezone_set('America/Montreal');
    $dateMont = date('h');
    echo $dateMont . "<br>";
    date_default_timezone_set('Europe/Paris');
    $dateFr = date('h');
    echo $dateFr . "<br>";

    echo "Il y a " . ($dateMont - $dateFr) . " de décalage";

    function days_until_next_birthday($month, $day)
    {
        $today = new DateTime('today');
        $birthday = new DateTime("$month/$day");

        if ($birthday <= $today) {
            $birthday->modify('+1 year');
        }

        return (int)$today->diff($birthday)->format('%a');
    }

    ?>
    </body>
</htlm>
