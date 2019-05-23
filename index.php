<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="./styles.css">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
        function countValue($data){
          $mainArray = [];
          $strNumbers = '';
          for ($i = 0; $i <= strlen($data); $i++) {
              if ($data[$i] == "+" || $data[$i] == "-"|| $data[$i] == "*"|| $data[$i] == "/") {
                  if ($strNumbers) {
                    array_push($mainArray,$strNumbers);
                    $strNumbers = '';
                  } 
                array_push($mainArray,$data[$i]);
                  
              } else {
                $strNumbers = $strNumbers.$data[$i];
              }
              if ($i === strlen($data) - 1){
                  array_push($mainArray,$strNumbers);
                }
          }

          if ($mainArray[0] == "-"){
            if(sizeof($mainArray) == 2){
              return join('',array_splice($mainArray, 0, 2, ($mainArray[0]+$mainArray[1])));
            }
           array_splice($mainArray, 0, 2, ($mainArray[0].$mainArray[1]));
         }

        
            
            for ($i = 1; $i <= sizeof($mainArray); $i++) {
                if ($mainArray[$i] === "*"){
                    $rez = $mainArray[$i-1]*$mainArray[$i+1];
                    array_splice($mainArray, $i-1, 3, $rez);
                    $i=0;
                  }
                  if ($mainArray[$i] === "/"){
                      if($mainArray[$i+1] === "0"){
                          echo "Error";
                      } else {
                        $rez = $mainArray[$i-1]/$mainArray[$i+1];
                        array_splice($mainArray, $i-1, 3, $rez);
                        $i=0;
                      }
                  }
                }
            for ($i = 1; $i <= sizeof($mainArray); $i++) {
                if ($mainArray[$i] === "+"){
                    $rez = $mainArray[$i-1]+$mainArray[$i+1];
                    array_splice($mainArray, $i-1, 3, $rez);
                    $i=0;
                  }
                  if ($mainArray[$i] === "-"){
                    $rez = $mainArray[$i-1]-$mainArray[$i+1];
                    array_splice($mainArray, $i-1, 3, $rez);
                    $i=0;
                  }
                }

                
            
            return $rez;
        }

        if (isset($_POST['reset']))
        {
            $rez = 0;
        }

        if (isset($_POST['submit']))
        {
            $rez = $_POST['name'];
            $value = countValue( $rez);
        }
    ?>
    
    <div class="container mt-5">
        <div class="row">
        <div class="col-12  ">
            <form action='' method = 'post'>
                <div class="form-row ">
                    <div class="col-12 col-md-8 mt-2 ">
                    <div class="d-flex justify-content-around">
                        <input class="col-12 col-md-12 form-control-lg bg-light" id = "inputValue" type = "text" name="name"  readonly value = <?php echo $rez?> >
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success col-5  btn-lg"  type="submit" name="submit">Count</button>
                            <button class="btn btn-success col-5 btn-lg"  type="submit" name="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="col-12 form-control-lg">Result: <?php echo $value ?></div>
        <div class="row ">
            <div class="col-12 col-md-8 ">
                <div class="d-flex justify-content-between">
                    <?php $arr = array_fill(0, 5, true);
                        foreach ($arr as $key=>$value): ?>
                            <button type="button" class="btn col-2 mt-2 btn-primary key" value = <?= $key?> >
                                <?= $key?>
                            </button>
                        <?php endforeach ?>
                </div>
                <div class="d-flex justify-content-between ">
                    <?php $arr = array_fill(5, 5, true);
                        foreach ($arr as $key=>$value): ?>
                            <button type="button" class="btn col-2  mt-2 btn-primary key" value = <?= $key?> >
                                <?= $key?>
                            </button>
                        <?php endforeach ?>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="d-flex justify-content-between ">
                    <?php $arr = array("+", "-",);
                    foreach ($arr as $value): ?>
                        <button type="button" class="btn btn-primary mt-2 col-5 btn-lg key" value = <?= $value?> >
                            <?= $value?>
                        </button>
                    <?php endforeach ?>
                </div>
                <div class="d-flex justify-content-between ">
                    <?php $arr = array("*", "/");
                    foreach ($arr as $value): ?>
                        <button type="button" class="btn btn-primary mt-2 col-5 btn-lg key" value = <?= $value?> >
                            <?= $value?>
                        </button>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
           
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript' src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
