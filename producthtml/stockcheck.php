<?php
$cart_2d = array(array());
for ($i=0; $i <count($_SESSION['cart']);$i++){
    $dup=false;
    for ($j=0; $j<count($cart_2d);$j++){
    //increase counter for dup item      
    if ($_SESSION['cart'][$i]==$cart_2d[$j]['id']){
        $dup=true;
        $cart_2d[$j]['count']+=1;
        break;
    }      
    }
    if ($dup==false){
    $cart_2d[$j]['id']=$_SESSION['cart'][$i];
    $cart_2d[$j]['count']=1;
    }
}



$notenough=false;
//assume here get productid
for ($i=0;$i<count($cart_2d);$i++){
    if ($cart_2d[$i]['id']==$thispageid){        
        if ($cart_2d[$i]['count']>=$row['stock']){
            $notenough=true;   
        }
    }

}


?>