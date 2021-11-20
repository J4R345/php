<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        div{
            width: 200px;
            height: 200px;
        }

        img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<h1> <?php echo $titulo; ?> </h1>

<div>
<img src="<?php echo '/exemplo_2/Midias/'.$nome_imagem; ?>">
</div>

<p><?php echo $texto; ?> </p>

</body>

</html>
