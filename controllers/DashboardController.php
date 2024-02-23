<?php

namespace Controllers;

use Model\Eventos;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController {


    public static function index(Router $router) {
        
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }
        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos = ($virtuales * 45 * 0.9635) + ($presenciales * 186 * 0.9635); 

        $menos_lugares = Eventos::ordernar_limite('disponibles', 'ASC', 5);
        $mas_lugares = Eventos::ordernar_limite('disponibles', 'DESC', 5);


        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administracion',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_lugares'=>$menos_lugares,
            'mas_lugares' => $mas_lugares
        ]);
    }
}