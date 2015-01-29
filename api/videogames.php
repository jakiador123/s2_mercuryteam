<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Videogame extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}
$app->get('/videogames', function () use ($app)  {

  // Creamos un objeto collection + json con la lista de películas

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $videogames = json_decode(\Videogame::all());

   $app->view()->setData(array(
	'url' => $absUrl,	
	'items' => $videogames
	));

  // Mostramos la vista
  $app->render('videogamelist_template.php'); 
});

// Añadir el resto del código aquí
$app->get('/videogames/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Videogame::find($name);  
  $videogames = json_decode($p);

  $app->view()->setData(array(
	'url' => $absUrl,
	'item' => $videogames
	));

  // Mostramos la vista
  $app->render('videogame_template.php'); 
});

$app->delete('/videogames/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Videogame::find($name);  
  $p->delete();

  // Mostramos la vista
  $app->render('videogame_template.php'); 
});

$app->post('/videogames', function () use ($app) {

  $req = $app->request;
  
  $body = $app->request->getBody();
  $myArray = json_decode($body, true);
  
  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $videogame = new Videogame;  
  
  $videogame->name = $myArray['template']['data'][0]['value'];
  $videogame->description = $myArray['template']['data'][1]['value'];
  $videogame->gamePlatform = $myArray['template']['data'][2]['value'];
  $videogame->applicationSubCategory = $myArray['template']['data'][3]['value'];
  $videogame->screenshot = $myArray['template']['data'][4]['value'];
  $videogame->datePublished = $myArray['template']['data'][5]['value'];
  $videogame->embedUrl = $myArray['template']['data'][6]['value'];
  
  //public $timestamps = false;
  $videogame->save();

  // Mostramos la vista
  $app->render('videogame_template.php'); 
});


$app->put('/videogames/:name', function ($name) use ($app) {


  $req = $app->request;


  $videogame = \Videogame::find($name); 
  
  $body = $app->request->getBody();
  $myArray = json_decode($body, true);
    
  $videogame->name = $myArray['template']['data'][0]['value'];
  $videogame->description = $myArray['template']['data'][1]['value'];
  $videogame->gamePlatform = $myArray['template']['data'][2]['value'];
  $videogame->applicationSubCategory = $myArray['template']['data'][3]['value'];
  $videogame->screenshot = $myArray['template']['data'][4]['value'];
  $videogame->datePublished = $myArray['template']['data'][5]['value'];
  $videogame->embedUrl = $myArray['template']['data'][6]['value'];
  
  $videogame->save();

  $app->render('videogame_template.php'); 
});
?>