{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" ,"prompt" : "Schema", "href" : "http://schema.org/Movie"},
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
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la película"}
        ]
      } {% if not loop.last %},{% endif %}
      
      {% endfor %}
  
    ],
    
    "template" : {
      "data" : [
        {"name" : "name", "value" : "", "prompt" : "Nombre de la película"},
	{"name" : "description", "value" : "", "prompt" : "Descripción de la película"},
	{"name" : "director", "value" : "", "prompt" : "Director de la película"},
	{"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
	{"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}        
      ]
    }
  } 
}




