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
        
        if(sizeof($mainArray)==1 && gettype((int)$mainArray[0]) == 'integer'){
            $rez = $mainArray[0];
            echo $rez;
        } else { 
            for ($i = 1; $i <= sizeof($mainArray); $i++) {
                if ($mainArray[$i] === "*"){
                    $rez = $mainArray[$i-1]*$mainArray[$i+1];
                    array_splice($mainArray, $i-1, 3, $rez);
                    $i=0;
                  }
                  if ($mainArray[$i] === "/"){
                      if($mainArray[$i+1] === "0"){
                          echo "Error! It is impossible to divide by zero";
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
            echo $rez;
            }
        }
    ?>