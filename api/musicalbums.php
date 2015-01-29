<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Musicalbum extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}
$app->get('/musicalbums', function () use ($app)  {

  // Creamos un objeto collection + json con la lista de películas

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $musicalbums = json_decode(\Musicalbum::all());

   $app->view()->setData(array(
	'url' => $absUrl,	
	'items' => $musicalbums
	));

  // Mostramos la vista
  $app->render('musicalbumlist_template.php'); 
});

// Añadir el resto del código aquí
$app->get('/musicalbums/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Musicalbum::find($name);  
  $musicalbums = json_decode($p);

  $app->view()->setData(array(
	'url' => $absUrl,
	'item' => $musicalbums
	));

  // Mostramos la vista
  $app->render('musicalbum_template.php'); 
});

$app->delete('/musicalbums/:name', function ($name) use ($app) {

  // Creamos un objeto collection + json con la película pasada como parámetro

  // Obtenemos el objeto request, que representa la petición HTTP
  $req = $app->request;

  // Obtenemos la ruta absoluta de este recurso
  $absUrl =  $req->getScheme() . "://" . $req->getHost() . $req->getRootUri() . $req->getResourceUri();

  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $p = \Musicalbum::find($name);  
  $p->delete();

  // Mostramos la vista
  $app->render('musicalbum_template.php'); 
});

$app->post('/musicalbums', function () use ($app) {

  $req = $app->request;
  
  $body = $app->request->getBody();
  $myArray = json_decode($body, true);
  
  // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
  $musicalbum = new Musicalbum;  
  
  $musicalbum->name = $myArray['template']['data'][0]['value'];
  $musicalbum->description = $myArray['template']['data'][1]['value'];
  $musicalbum->datePublished = $myArray['template']['data'][2]['value'];
  $musicalbum->image = $myArray['template']['data'][3]['value'];
  $musicalbum->embedUrl = $myArray['template']['data'][4]['value'];
  
  //public $timestamps = false;
  $musicalbum->save();

  // Mostramos la vista
  $app->render('musicalbum_template.php'); 
});


$app->put('/musicalbums/:name', function ($name) use ($app) {


  $req = $app->request;


  $musicalbum = \Musicalbum::find($name); 
  
  $body = $app->request->getBody();
  $myArray = json_decode($body, true);

  $musicalbum->name = $myArray['template']['data'][0]['value'];
  $musicalbum->description = $myArray['template']['data'][1]['value'];
  $musicalbum->datePublished = $myArray['template']['data'][2]['value'];
  $musicalbum->image = $myArray['template']['data'][3]['value'];
  $musicalbum->embedUrl = $myArray['template']['data'][4]['value'];
     
  $musicalbum->save();

  $app->render('musicalbum_template.php'); 
});
?>