<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    
    $host="localhost";
    $user="root";
    $password="";
    $db="sklep";

    $connect=mysqli_connect($host, $user, $password, $db);
    
    ?>

    <div class="baner">
    
    <h1>W naszej hurtowni kupisz najtaniej</h1>
    
    </div>

    <div class="blokLewy">
    
    <h3>Ceny wybranych artykułów w hurtowni:</h3>

    <?php
    
    $query1="SELECT nazwa, cena From towary Limit 4;";
    $result1=mysqli_query($connect, $query1);

    echo "<table>";
    while($row=mysqli_fetch_array($result1))
    {
        echo "<tr>";
        echo "<td>$row[0]</td> <td>$row[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
    
    </div>

    <div class="blokSrodkowy">
    
    <h3>Ile będą kosztować Twoje zakupy?</h3>

    <form method="POST">
    
    wybierz artykuł 
    <select name="selekt">

    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
    <option value="Cyrkiel">Cyrkiel</option>
    <option value="Linijka 30 cm">Linijka 30 cm</option>
    <option value="Ekierka">Ekierka</option>
    <option value="Linijka 50 cm">Linijka 50 cm</option>

    </select>

    <br>

    liczba sztuk:
    <input type="number" value="1" name="sztuki">

    <br>

    <input type="submit" value="Oblicz">
    
    </form>

    <?php
    
    $selekt =$_POST["selekt"];
    $sztuki = $_POST["sztuki"];

    $query2= "SELECT cena From towary where nazwa=\"$selekt\";";

    $result2=mysqli_query($connect, $query2);

    $row2=mysqli_fetch_array($result2);

    $suma=$row2[0]*$sztuki;


    echo round($suma);
    
    ?>
    
    </div>
    
    <div class="blokPrawy">
    
    <img src="zakupy2.png" alt="hurtownia">

    <h3>Kontakt</h3>

    <p>telefon: <br> 111222333 <br> e-mail: <br> <a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    
    </div>
    
    <div class="stopka">
    
    <h4>Witrynę wykonał 00000000000</h4>
    
    </div>

    <?php
    
    mysqli_close($connect);

    ?>
</body>
</html>