
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Login de <?= $this->name ?></h1>

<form action="?method=auth" method="post">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name"> <br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password"> <br>

    <input type="submit">
</form>
    
</body>
</html>