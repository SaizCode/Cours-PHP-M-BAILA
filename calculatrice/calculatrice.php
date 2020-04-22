<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
<?php
require_once("./helpers/fonctions.php");
require_once("./controllers/base.php");


$errors=[];
$resultat= 0;



    if(isset($_POST['btn_submit'])){
        //Alternances
 //1-Champs vides
        define("NBRE1","nbre1");
        define("NBRE2","nbre2");
        //PI=3.14
        define('PI',3.14);
        

        $errors["nbre1"] = null;
        $errors["nbre2"] = null;
        $errors["op"] = null;
        //2-Pas Numerique
    
        $errors["nbre2"] = isNumeric($_POST[NBRE2]);

        foreach ($errors as $key => $value) {

            switch ($key) {

              case 'nbre1':

                        if($nbre1 = isEmpty($_POST[NBRE1])){

                              $errors["nbre1"] = $nbre1;
                        
                        }
                        elseif($nbre1 = isNumeric($_POST[NBRE1])){

                              $errors["nbre1"] = $nbre1;
                        }

                break;
              case 'nbre2':
                      
                      if($nbre2 = isEmpty($_POST[NBRE2])){

                            $errors["nbre2"] = $nbre2;
                        
                      }
                      elseif($nbre2 = isNumeric($_POST[NBRE2])){

                            $errors["nbre2"] = $nbre2;
                      }

                      
                break;
              
              default:
                        $errors["op"] = isEmpty($_POST['op'],"Veuillez Selectionner un Operateur");
                break;
            }
        }

  
        //Nominal
        if(!isErrors($errors)){

            $nbre1=$_POST[NBRE1];
            $nbre2=$_POST[NBRE2];
            $op=$_POST['op'];
           $resultat = calculatrice($nbre1,$nbre2,$op);

        }



    }else{
        $errors["envoie"] = "Veuillez cliquer sur le Bouton";


    }
?>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Boottrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="card m-5">

      <div class="card-body">
          <h4 class="card-title text-center">Calculatice</h4>
          <p class="card-text ">
                <div class="col-3"></div>
                <div class="col-6 pl-5">
                <form action="" method="post">
    
                        <div class="form-group">
                            
                            <?php if(isset($errors["op"])){ ?>

                            <div class="alert alert-danger" role="alert">
                                    <span>Erreur: <span><?=$errors["op"]?></span></span>
                            </div>
                            <?php } ?>
                            
                            <label for="">Nombre1</label>

                            <div class="row align-items-center">
                                  <div class="col-md-6">
                                        <input type="text" class="form-control" name="nbre1" id="" value="<?=  getValuePOST("nbre1")?>" aria-describedby="helpId" placeholder="">
                                  </div>
                                  <div class="col-md-6">

                                        <?php    if(isset($errors["nbre1"])){  ?>

                                        <div class="alert alert-danger mb-0" role="alert">
                                            <span>Erreur: <span><?= $errors["nbre1"] ?></span></span>
                                        </div>

                                        <?php } ?>
                                  </div>
                            </div>
                        
                        </div>


                        <div class="form-group">
                        
                            <label for="">Nombre2</label>

                            <div class="row align-items-center">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="nbre2" id="" value="<?=  getValuePOST("nbre2")?>" aria-describedby="helpId" placeholder="">
                                  </div>
                                  <div class="col-md-6">

                                      <?php    if(isset($errors["nbre2"])){  ?>
                                      <div class="alert alert-danger mb-0" role="alert">
                                            <span>Erreur: <span><?= $errors["nbre2"] ?></span></span>
                                      </div>
                                      <?php  }   ?>
                                  
                                  </div>
                            </div>
                        
                        </div>

                        <div class="form-group">
                        <label for="">Operateur</label>
                        <select class="form-control" name="op" id="">
                            <option value="">Selectionner un Operateur</option>
                            <option value="+">Addition</option>
                            <option value="/">Division</option>
                        </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" value="envoie" name="btn_submit" class="btn btn-primary float-right">Calculer</button>
                            </div>
                        </div>

                        </form>

                </div>
                <div class="col-3"></div>
          </p>
      </div>
  </div>



<?php if($resultat) {?>

<div class="card text-left ml-5">

  <div class="card-body">
    <h4 class="card-title">Resultat:<?=$resultat;?> </h4>

  </div> 
</div>

<?php } ?>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>