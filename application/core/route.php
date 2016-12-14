<?php

class Route
{
    public static $defaultController = 'main';
    public static $defaultAction = 'login';

    public static function getBaseUrl()
    {
        return _BASE_URL;
    }

    static function start()
    {
        session_start();
        $controllerName = Route::$defaultController;
        $actionName = Route::$defaultAction;

        if (!empty($_SESSION["session_useremail"])) {
            $uri = str_replace(Route::getBaseUrl(), '', $_SERVER['REQUEST_URI']);
        //echo "<br/>uri=".$uri;
            $routes = explode('/', $uri);
        }
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (!empty($controllerName) && ($controllerName == "index.php")) {
            $controllerName = Route::$defaultController;
        }
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }
        $controllerName = 'Controller_' . $controllerName;
        $actionName = 'action_' . $actionName;

        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPath = "application/controllers/" . $controllerFile;

        if (file_exists($controllerPath)) {
            include "application/controllers/" . $controllerFile;
        } else {
            Route::ErrorPage404();
            return false;
        }

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
            return false;
        }
    }

    public static function ErrorPage404()
    {
        include 'application/controllers/error.php';
        $controller = new Error("Page not found!!!");
    }

    static function loadModel($model)
    {
        $modelName = 'Model_' . $model;
        $modelFile = strtolower($modelName) . '.php';
        $modelPath = "application/models/" . $modelFile;

        if (file_exists($modelPath)) {
            require_once "application/models/" . $modelFile;
            return true;
        } else {
            require_once 'application/controllers/error.php';
            return false;
        }

    }
}