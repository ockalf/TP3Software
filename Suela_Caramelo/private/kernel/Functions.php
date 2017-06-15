<?php 

class F {
    public function sortDate($lo){

        if (function_exists('cmp')){ 
        }else{
           function cmp($aa, $bb) {
                $a = $aa -> getfecha();
                $b = $bb -> getfecha();
                if ($a == $b) {
                    return 0;
                }
                return ($a > $b) ? -1 : 1;
            }
        }

        $lo -> uasort('cmp');
        return $lo;
    }

    public function between($a,$x,$b){
    	return ($a<=$x && $x<=$b);
    }
}

?>