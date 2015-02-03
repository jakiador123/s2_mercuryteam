{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "prompt" : "Schema", "href" : "http://schema.org/MusicAlbum"},
      {"rel" : "collection", "prompt" : "Películas", "href" : "{{ url }}/../movies"},
      {"rel" : "collection", "prompt" : "Libros","href" : "{{ url }}/../books"},
      {"rel" : "collection", "prompt" : "Música","href" : "{{ url }}/../musicalbums"},
      {"rel" : "collection", "prompt" : "Videojuegos","href" : "{{ url }}/../videogames"}
    ],
    
    "items" : [
      {% for item in items %}
      
      {
        "href" : "{{ url }}/{{ item.id }}",
        "data" : [
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del álbum"}
        ]
      } {% if not loop.last %},{% endif %}
      
      {% endfor %}
  
    ],
    
    "template" : {
      "data" : [
        {"name" : "name", "value" : "", "prompt" : "Nombre del álbum"},
	{"name" : "description", "value" : "", "prompt" : "Descripción del álbum"},
	{"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
	{"name" : "image", "value" : "", "prompt" : "Imagen del disco"},
	{"name" : "embedUrl", "value" : "", "prompt" : "Canción"}        
      ]
    }
  } 
}

