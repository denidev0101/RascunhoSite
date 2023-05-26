<?php 
require ("dadosgerais.php");
$type = $_GET["type"] ?? '';

    if($type=="mansoes"){
      $data=$geral["Mansões"];
      $type="mansoes";
    }else if($type=="quartos"){
      $data=$geral["Quartos"];
      $type="quartos";

    }else if($type=="fazendas"){
      $data=$geral["Fazendas"];
      $type="fazendas";

    }else{
      $data=$geral;
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Área cheap</title>
  <link rel="stylesheet"  href="estiliza.css">
</head>

<body>
  <header>
      <a href="principal.php"> <img src="ImgCategorias/logo.png" alt="Logo Área Cheap" id="logo"> </a>
            <form>
              <input type="search" name="busca" placeholder="Busca">
            </form>
          <a href="cadastro.php">Cadastro</a>
          <a href="login.php">Login</a>
          <a href="saibamais.php">Saiba mais</a>

  </header>
    <nav>
      <ul>
        <li><a href="Principal.php"><strong>Em Alta</strong></a></li>
        <li><a href="?type=mansoes">Mansão</a></li>
        <li><a href="?type=quartos">Quarto</a></li>
        <li><a href="?type=fazendas">Fazenda</a></li>
      </ul>
    </nav>

  <main>
      
    <?php
        if(isset($data["Mansões"]) && isset($data["Fazendas"]) && isset($data["Quartos"])  ){
          
          foreach($data as $iUm => $aCategoria){
            foreach($aCategoria as $iDois=> $resposta){
    ?>
      
    <div class="listing-card">
        <a href="principalDetalhes.php?index=<?=$iDois?>&type=<?php
          if($iUm == "Fazendas") echo "fazendas";
          else if($iUm == "Mansões") echo "mansoes";
          else if($iUm == "Quartos") echo "quartos";
        ?>">
      <img src="<?=$resposta["Foto"]?>" alt="<?=$resposta["Localização"]?>"> 
     
      <div>
        <h4><?=$resposta["Localização"]?></h4> 
        <h2>R$<?=$resposta["ValorAluguel"]?></h2><p>Aluguel</p> 
        <h3><?=$resposta["Responsável"]?></h3> 
      </div>
      <button>Reservar</button>
    </a>
		</div>  
   
  <?php

         }
      }       
    }else{
        foreach($data as $iUm => $aCategoria){

          ?>
          <div class="listing-card">
             <a href="principalDetalhes.php?index=<?=$iUm?>&type=<?=$type?>">   //
            <img src="<?=$aCategoria["Foto"]?>" alt="<?=$aCategoria["Localização"]?>"> 
           
            <div>
              <h3><?=$aCategoria["Responsável"]?></h3> 
              <h4><?=$aCategoria["Localização"]?></h4> 
              <h2>R$<?=$aCategoria["ValorAluguel"]?></h2><p>Aluguel</p> 
            </div>
            <button>Reservar</button>
          </a>
          </div>  
         
        <?php
             }
          } 

        ?>

 </main>
  <footer>
    <div>
    
   <p id="pfooter"> Contatos:<br>
    De segunda a sexta:  (77) 98812-3456<br>
    Sabados e Domingos:  (77) 98854-6783<br>
    Endereço:<br> IFBA Campus Brumado <br>
   </p>
    </div>
    &copy; <?php echo date("Y"); ?> Meu Site Airbnb. Todos os direitos reservados.<br>
  </footer>
</body>
</html>