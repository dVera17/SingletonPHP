<?php

trait getInstance{
    public static $instance;
    public static function getInstance(){
        $args = func_get_args()[0];
        // return (!self::$instance instanceof self) ? self::$instance = new self(...(array) $args) : self::$instance;
        if(!self::$instance instanceof self){
            try {
                self::$instance = new self(...(array) $args);
                return self::$instance;
            } catch (\Throwable $th) {
                print_r($th->getMessage());
            }
        }
        return self::$instance;
    }
}

function autoload($e){
    $carpeta = (array)[
        dirname(__DIR__)."/scripts/clients",
        dirname(__DIR__)."/scripts/compra"
    ];
    foreach($carpeta as $ruta) {
        if($handler = opendir($ruta)) {
            while(($file = readdir($handler))) {
                if($file != "." && $file!="..") {
                    require_once $ruta."/".$file;
                }
            }
        }
    }
}
spl_autoload_register('autoload');
print_r(\app\details\Detalle::getInstance(['nombre'=>'Santiago']));
print_r(\app\bill\Factura::getInstance(['total'=> 150]));
print_r(\app\user\Usuario::getInstance(['nombre'=>'Daniel', 'edad'=>18]));
print_r(\app\info\Informacion::getInstance(['descripcion'=> 'description']));
?>