<?php

//On écrit la liste des routes

//use Framework\Router;
require('Framework/Router.php');
/**
 * Controleurs
 * @param array le tableau contient les clés et les noms des fichiers des controleurs et les actions à exécuter.
 */

//Routes appelant les controleurs des posts

//$url = "/";
//$router = new Router($url);
//$router->routingRequest($url);


$router->routingRequest('/Post',
                        ['controller' => 'PostController',
                         'action' => 'index']);

$router->routingRequest('/Post/:id',
                        ['controller' => 'PostController',    
                         'action' => 'getPost']);
                         
$router->routingRequest('/Post/:',
                        ['controller' => 'PostController',
                         'action' => 'PostsList']);

$router->routingRequest('/Post/:',
                        ['controller' => 'PostController',
                         'action' => 'newPost']);

//Routes vers les méthodes de la classe de registration
//$router->routingRequest('/Controller',['controller' => 'RegistrationController','action' => 'index']);
//$router->routingRequest('/Controller',['controller' => 'RegistrationController','action' => 'register']);
//$router->routingRequest('/Controller',['controller' => 'RegistrationController','action' => 'validation'.$userId]);

//Routes renvoyant vers la classe de connexion
//$router->routingRequest('/Controller',['controller' => 'LoginController','action' => 'index']);
//$router->routingRequest('/Controller',['controller' => 'LoginController','action' => 'login']);
//$router->routingRequest('/Controller',['controller' => 'LoginController','action' => 'logout']);

//Routes renvoyant vers la classe Home
//$router->routingRequest('/Controller',['controller' => 'HomeController','action' => 'index']);

//Routes appelant les méthodes du controleur Contact
//$router->routingRequest('/Controller',['controller' => 'ContactController','action' => 'index']);
//$router->routingRequest('/Controller',['controller' => 'ContactController','action' => 'sendMessage']);

//Routes appelant les méthodes du controleur AdminController
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'index']);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'PostManagement']);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'addPost']);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'editPost'.'/'.$postId]);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'updatePost'.'/'.$postId]);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'deletePost'.'/'.$postId]);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'userManagement']);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'deleteUser'.'/'.$userId]);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'commentManagement']);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'activeComment'.'/'.$commentId]);
//$router->routingRequest('/Controller',['controller' => 'AdminController','action' => 'deleteComment'.'/'.$commentId]);

/**
 * Managers
 * @param array le tableau contient les clés et les noms des fichiers des Managers et les actions à exécuter.
 */

//Routes appelant les méthodes du Manager PostManager

///$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'index']);
//$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'getList']);
//$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'get'.'/'.$postId]);
//$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'add'.'/'.$post]);
//$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'update'.'/'.$postId]);
//$router->routingRequest('/Manager',['manager' => 'PostManager','action' => 'delete'.'/'.$postId]);

//Routes appelant les méthodes du Manager CommentManager

//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'index']);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'getList'.'/'.$postId]);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'get'.'/'.$postId]);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'add'.'/'.$comment]);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'update'.'/'.$commentId]);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'delete'.'/'.$commentId]);
//$router->routingRequest('/Manager',['manager' => 'CommentManager','action' => 'active'.'/'.$commentId]);

//Routes appelant les méthodes du Manager UserManager

//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'index']);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'getList']);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'get'.'/'.$userId]);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'add'.'/'.$user]);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'update'.'/'.$userId]);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'delete'.'/'.$userId]);
//$router->routingRequest('/Manager',['manager' => 'UserManager','action' => 'active'.'/'.$userId]);

//$router->routingRequest('/',
//                        ['controller' => 'HomeController',
//                         'action' => 'PostsList']);

