<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

require "connect3dplus.php";

    try{
        $getNoRes = $db->prepare("SELECT klantid, voornaam, achternaam
        FROM klant
        WHERE klantid NOT IN (
        SELECT klantid
        FROM reservering
    )");
    }

    catch(PDOExpection $e)
    {
        die("Fout bij verbinden met database: ".$e->getMessage());
    }

    $getNoRes->execute();

    if($getNoRes->RowCount()>0)
    {
        $result=$getNoRes->fetchAll(PDO::FETCH_ASSOC);
?>
    <table>
        <thead>
            <th>Klant id</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
        </thead>
    <tbody>
        <?php

        foreach($result as $rij)
        {
            echo "<tr><td>" . $rij["klantid"] ."</td>";
            echo "<td>" .$rij["voornaam"] ."</td>";
            echo "<td>" .$rij["achternaam"] ."</td></tr>";
        }
        ?>
    </tbody>
    </table>
    <?php
    }
    ?>
</body>
</html>


