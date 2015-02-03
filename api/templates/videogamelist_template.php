{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "prompt" : "Schema", "href" : "http://schema.org/VideoGame"},
      {"rel" : "collection", "prompt" : "Películas", "href" : "{{ url }}/../movies"},
      {"rel" : "collection", "prompt" : "Libros", "href" : "{{ url }}/../books"},
      {"rel" : "collection", "prompt" : "Música", "href" : "{{ url }}/../musicalbums"},
      {"rel" : "collection", "prompt" : "Videojuegos", "href" : "{{ url }}/../videogames"}
    ],
    
    "items" : [
      {% for item in items %}
      
      {
        "href" : "{{ url }}/{{ item.id }}",
        "data" : [
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del videojuego"}
        ]
      } {% if not loop.last %},{% endif %}
      
      {% endfor %}
  
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




