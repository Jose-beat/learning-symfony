<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Creacion un controlador que contiene lo siguiente
class HomeController extends AbstractController
{
    //Decorador que define la ruta con la que se accedera al controlador
    //VAMOS A CAMBIAR LA NOTACION DE LAS RUTAS PARA CENTRARLAS EN UN SOLO ARCHIVO
    //#[Route('/home', name: 'app_home')]
    //Funcion de tipo Response 
    public function index(): Response
    {
        //Funcion que retorna la vista primero definiendo su ruta y despues argumentos a enviar a la vista
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello' => 'Hola Mundo con Symfony 4'
        ]);
    }

    public function animals($name, $lastname){
        $title = 'Bienvenido a la pagina de animales';
        return $this->render('home/animals.html.twig', [
            'title' => $title,
            'name' => $name,
            'lastname' => $lastname
        ]);

    }

    public function redirection(){
        
        //Metodo para redirigir a nuestras paginas en la aplicacion usando sus parametros como el 
        //nombre de la vista, argumentos y el codigo de redireccion
        // return $this->redirectToRoute('animals', [
        //     'name' => 'Juan Pedro',
        //     'lastname' => 'Lopez'
        // ], 301);

        //Metodo para redirigir a cualquier pagina
        return $this->redirect('https://www.google.com');
    }
}
