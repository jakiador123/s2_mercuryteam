<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class VideoGame extends \Illuminate\Database\Eloquent\Model
{

}
$app->get('/videogames', function () use ($app)  {

  // Creamos un objeto collection + json con la lista de películas

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $videogames = json_decode(\Videogames::all());

   $app->view()->setData(array(
	'url' => $absUrl,	
	'items' => $videogames
	));

  // Mostramos la vista
  $app->render('videogameslist_template.php'); 
});
// Añadir el resto del código aquí

?>