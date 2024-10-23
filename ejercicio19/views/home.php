<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>HOME</h1>
<ol>

        
        <li>Deseo 1</li>
        <li>Deseo 2</li>
        <li>Deseo 3</li>

        <?php
        if (isset($_COOKIE["listaDeseo"])) {
            $listaDeseo = unserialize($_COOKIE['listaDeseo']);

            foreach ($listaDeseo as $deseo) {
                echo "<li>$deseo</li>";
            }
        }
        ?>
    </ol>
    <form action="?method=new" method="post">
        <label for="deseo">Nuevo deseo </label>
        <input type="text" name="deseo" id="deseo"><br>
        <input type="submit"><br>

    </form>
    <form action="?method=delete" method="post">
        <label for="borrar">Borrar deseo </label>
        <input type="text" name="deseo" id="deseo"><br>
        <input type="submit"><br>
    </form>   

    
</body>

</html>