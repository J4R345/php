<?php

require_once 'classe-pessoa.php';

$p = new Pessoa("bdkosmus", "localhost", "root", "");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadatro de Pessoas</title>
</head>

<body>

    <?php

      if(isset($_POST['nome']))
      // Se clicar no botão Cadastrar ou Editar
        {
          if(isset($_GET['id_up']) && !empty($_GET['id_up']))
          {
           // Editar/Atualizar
           $id_upd = addslashes($_GET['id_up']);
           $nome = addslashes($_POST['nome']);
           $telefone = addslashes($_POST['telefone']);
           $email = addslashes($_POST['email']);
 
           if(!empty($nome) && !empty($telefone) && !empty($email))
           { 
               
            $p->atualizaDados($id_upd, $nome, $telefone, $email); 

            header("location: index.php"); // atualza a pagina
           
           } 
           else 
           {
            ?>
            <div class="aviso">
                <h4>Preencha todos os campos ...</h4>
            </div>
            <?php
           }

          }
          else
          { 
          // Cadastrar 

            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
  
            if(!empty($nome) && !empty($telefone) && !empty($email)){ 
  
             if(!$p->cadastrarPessoa($nome, $telefone, $email))
             {
                ?>
                <div class="aviso">
                    <h4>Este e-mail ja foi cadastrado ...</h4>
                </div>
                <?php
             }
  
            }else
            {
               ?>
                <div class="aviso">
                    <h4>Preencha todos os campos  ...</h4>
                </div>
              <?php
            }

          }

      }

    ?>
     <?php

     if(isset($_GET['id_up']))
     {
        $id_update = addslashes(($_GET['id_up']));
        $res = $p->buscarDadosPessoa($id_update);

     }

    ?>

    <section id="formulario">

        <form method="POST"> 
            <h2>Cadastrar Pessoa</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome"
            value="<?php if(isset($res)) {echo $res['nome'];} ?>"
            >
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone"
            value="<?php if(isset($res)) {echo $res['telefone'];} ?>"
            >
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
            value="<?php if(isset($res)) {echo $res['email'];} ?>"
            >
            <input type="submit"
            value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>"
            >

        </form>

    
  </section>

    <section id="tabela">
    <table>
             <tr id="titulo">
                 <td>Nome</td>
                 <td>Telefone</td>
                 <td colspan="2">Email</td>
             </tr>
        
        <?php
         
         $dados = $p->buscarDados();

         if(count($dados) > 0)
         {

            for($i=0;$i < count($dados); $i++)
            {
                echo"<tr>";
                
                foreach ($dados[$i] as $colunas => $valores){
                    
                    if($colunas != "id")
                    {  
                
                echo "<td>" .$valores."</td>";

                    } 
                }
                 ?>
                 <td>
                 <a href="index.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a> 
                 <a href="index.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
                 </td>
                
                <?php
                 
                 echo"</tr>";
            } 
            
         } else
         {
             ?>
            </table>

             <div class="aviso">
                 <h4>O banco de dados esta vazio ...</h4>
             </div>
             <?php
            
         }
         //echo"<pre>";
         //var_dump($dados);
         //echo"</pre>";

        ?>      
    </section>
</body>
</html>

<?php

if(isset($_GET['id']))
{
    $id_pessoa = addslashes($_GET['id']);
    $p->excluirPessoa($id_pessoa);
    header("location: index.php");
}

?>