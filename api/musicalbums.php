<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class MusicAlbum extends \Illuminate\Database\Eloquent\Model
{

}

// Añadir el resto del código aquí

$app->get('/musicalbums', function () use ($app)  {

  // Creamos un objeto collection + json con la lista de películas

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $musicalbums = json_decode(\Musicalbums::all());

   $app->view()->setData(array(
	'url' => $absUrl,	
	'items' => $musicalbums
	));

  // Mostramos la vista
  $app->render('musicalbumslist_template.php'); 
});

$app->get('/musicalbums/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Musicalbum::find($name);  
  $musicalbum = json_decode($p);

  $app->view()->setData(array(
	'url' => $absUrl,
	'item' => $musicalbum
	));

  // Mostramos la vista
  $app->render('musicalbum_template.php'); 


});
?>