<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
       
    .noticias{
    
    width: 500px;
    height: 500px;
    margin: auto;
}
    .divd{
    
    width: 100px;
    height: 100px;
    margin: 10px;
    float: left;

    
}

img{
    width: 100%;
    height: 100%;
}

    </style>
</head>

<body>
<div class="noticias">
<?php
for ($i=0; $i < count($this->dados2); $i++)
{
?>
   <a href="<?php echo 'noticias/'.$this->dados2[$i]['descricao'].'/'.$this->dados2[$i]['id_noticias'];?>">
   
   <div class="divd" >
        <p><?php echo $this->dados2[$i]['titulo'];?></p>
        <img src="<?php echo 'Midias/'.$this->dados2[$i]['nome_imagem'];?>">
        
    </div>
   
  </a>
<?php
}    
?>
</div>

<?php
//echo'<pre>';
//print_r($this->dados2);
//echo'</pre>';
?>   
 
</body>
</html>


