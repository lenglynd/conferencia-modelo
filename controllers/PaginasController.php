<?php 
namespace Controllers;

use Model\Categoria;
use Model\Dias;
use Model\Eventos;
use Model\Hora;
use Model\Ponentes;
use MVC\Router;

class PaginasController  {

    public static function index(Router $router){
        $eventos = Eventos::ordernar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dias::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponentes::find($evento->ponente_id);
            if ($evento->dia_id === "1" && $evento->categoria_id ==="1") {
                $eventos_formateados['conferencias_v'][] = $evento;    
            }
            if ($evento->dia_id === "2" && $evento->categoria_id ==="1") {
                $eventos_formateados['conferencias_s'][] = $evento;    
            }
            if ($evento->dia_id === "1" && $evento->categoria_id ==="2") {
                $eventos_formateados['workshops_v'][] = $evento;    
            }
            if ($evento->dia_id === "2" && $evento->categoria_id ==="2") {
                $eventos_formateados['workshops_s'][] = $evento;    
            }
        }

        $ponentes_total = Ponentes::total();
        $conferencias_total = Eventos::total('categoria_id', 1);
        $workshops_total = Eventos::total('categoria_id', 2);

        $ponentes = Ponentes::all();


        $router->render('paginas/index',[
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'ponentes' => $ponentes
        ]);
    }
    public static function evento(Router $router){



        $router->render('paginas/devwebcamp',[
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }
    public static function paquetes(Router $router){



        $router->render('paginas/paquetes',[
            'titulo' => 'Paquetes DevWebCamp'
        ]);
    }
    public static function conferencias(Router $router){
        $eventos = Eventos::ordernar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dias::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponentes::find($evento->ponente_id);
            if ($evento->dia_id === "1" && $evento->categoria_id ==="1") {
                $eventos_formateados['conferencias_v'][] = $evento;    
            }
            if ($evento->dia_id === "2" && $evento->categoria_id ==="1") {
                $eventos_formateados['conferencias_s'][] = $evento;    
            }
            if ($evento->dia_id === "1" && $evento->categoria_id ==="2") {
                $eventos_formateados['workshops_v'][] = $evento;    
            }
            if ($evento->dia_id === "2" && $evento->categoria_id ==="2") {
                $eventos_formateados['workshops_s'][] = $evento;    
            }
        }
        
        

        

        $router->render('paginas/conferencias',[
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);
    }
    public static function error(Router $router){



        $router->render('paginas/error',[
            'titulo' => 'Página no encontrada'
        ]);
    }
}



?>