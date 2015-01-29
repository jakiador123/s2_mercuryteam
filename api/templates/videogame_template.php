{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "href" : "http://schema.org/VideoGame"},
      {"rel" : "collection", "href" : "{{ url }}/../../movies"},
      {"rel" : "collection", "href" : "{{ url }}/../../books"},
      {"rel" : "collection", "href" : "{{ url }}/../../musicalbums"},
      {"rel" : "collection", "href" : "{{ url }}/../../videogames"}
    ],
    
    "items" : [
      {
        "href" : "{{ url }}",
        "data" : [
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del videojuego"},
		  {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del videojuego"},
		  {"name" : "gamePlatform", "value" : "{{ item.gamePlatform }}", "prompt" : "Plataforma"},
		  {"name" : "applicationSubCategory", "value" : "{{ item.applicationSubCategory }}", "prompt" : "Categoria"},
		  {"name" : "screenshot", "value" : "{{ item.screenshot }}", "prompt" : "Imagen"},
		  {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de Publicación"},
		  {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Gameplay en Youtube"}
		]
      } 
  
    ],
    
    
    "template" : {
      "data" : [
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del videojuego"},
	  {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del videojuego"},
	  {"name" : "gamePlatform", "value" : "{{ item.gamePlatform }}", "prompt" : "Plataforma"},
	  {"name" : "applicationSubCategory", "value" : "{{ item.applicationSubCategory }}", "prompt" : "Categoria"},
	  {"name" : "screenshot", "value" : "{{ item.screenshot }}", "prompt" : "Imagen"},
	  {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de Publicación"},
	  {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Gameplay en Youtube"}
      ]
    }
  } 
}




