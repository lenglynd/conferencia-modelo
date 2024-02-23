<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dias;
use Model\Eventos;
use Model\Hora;
use Model\Ponentes;
use MVC\Router;

class EventosController {


    public static function index(Router $router) {
        if (!isAdmin()) {
            header('Location: /login');
        }
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location:/admin/eventos?page=1');
        }

        $registros_por_pagina = 10;
        $total_registros = Eventos::total();
        $paginacion= new Paginacion($pagina_actual,$registros_por_pagina, $total_registros);
        if ($paginacion->totalPaginas() < $pagina_actual) {
            header('Location: /admin/eventos?page=1');
        }
        $eventos = Eventos::paginar($registros_por_pagina, $paginacion->offset());

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dias::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponentes::find($evento->ponente_id);
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
    public static function crear(Router $router) {
        if (!isAdmin()) {
            header('Location: /login');
        }
        $alertas = [];
        $categorias= Categoria::all('ASC');
        $dias = Dias::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Eventos();
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }
            $evento->sincronizar($_POST);
           
            $alertas = $evento->validar();
            if(empty($alertas)){
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location:/admin/eventos');
                }
            }
        }
        
        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
          
        ]);
    }
    public static function editar(Router $router) {
        if (!isAdmin()) {
            header('Location: /login');
        }

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location:/admin/eventos');
        }
        $alertas = [];
        $categorias= Categoria::all('ASC');
        $dias = Dias::all('ASC');
        $horas = Hora::all('ASC');
        $evento = Eventos::find($id);
        if (!$evento) {
            header('Location:/admin/eventos');
        }
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }
            $evento->sincronizar($_POST);
           
            $alertas = $evento->validar();
            if(empty($alertas)){
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location:/admin/eventos');
                }
            }
        }
        
        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
          
        ]);
    }
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }
            $id = $_POST['id'];
            $evento = Eventos::find($id);
            if (!$evento) {
                header('Location: /admin/eventos');
            }
            
            $resultado =   $evento->eliminar();
            if ($resultado) {
                
                header('Location: /admin/eventos');
            }

        }
        
    }
}