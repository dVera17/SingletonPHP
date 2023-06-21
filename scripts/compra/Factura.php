<?php

namespace app\bill;
use getInstance as getInstance;
class Factura{
    use getInstance;
    private function __construct(public float $total){}
}

?>