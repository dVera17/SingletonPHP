<?php

namespace app\user;
use getInstance as getInstance;
class Usuario{
    use getInstance;
    function __construct(public string $nombre, public float $edad){}
}

?>