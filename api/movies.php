<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Movie extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

/* Obtención de la lista de películas */

$app->get('/movies', function () use ($app)  {

  // Creamos un objeto collection + json con la lista de películas

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $pelis = json_decode(\Movie::all());

   $app->view()->setData(array(
	'url' => $absUrl,	
	'items' => $pelis
	));

  // Mostramos la vista
  $app->render('movielist_template.php'); 
});


/*  Obtención de una película en concreto  */
$app->get('/movies/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Movie::find($name);  
  $peli = json_decode($p);

  $app->view()->setData(array(
	'url' => $absUrl,
	'item' => $peli
	));

  // Mostramos la vista
  $app->render('movie_template.php'); 

});

/*  Borrado de una película en concreto  */
$app->delete('/movies/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Movie::find($name);  
  $p->delete();

  // Mostramos la vista
  $app->render('movie_template.php'); 

});

/*  Insertar una película en concreto  */
$app->post('/movies', function () use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  //$absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  
	$movie = new Movie;
	
	$body = $app->request->getBody();
	$array = json_decode($body, true);
	
	$movie->name = $array['template']['data'][0]['value'];
	$movie->description = $array['template']['data'][1]['value'];
	$movie->director = $array['template']['data'][2]['value'];
	$movie->datePublished = $array['template']['data'][3]['value'];
	$movie->embedUrl = $array['template']['data'][4]['value'];
	
	$movie->save();

  // Mostramos la vista
  $app->render('movie_template.php'); 

});

/*  Actualizar una película en concreto  */
$app->put('/movies/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  
	$movie = \Movie::find($name);
	
	$body = $app->request->getBody();
	$array = json_decode($body, true);
	
	$movie->name = $array['template']['data'][0]['value'];
	$movie->description = $array['template']['data'][1]['value'];
	$movie->director = $array['template']['data'][2]['value'];
	$movie->datePublished = $array['template']['data'][3]['value'];
	$movie->embedUrl = $array['template']['data'][4]['value'];
	
	$movie->save();

  // Mostramos la vista
  $app->render('movie_template.php'); 

});


?>