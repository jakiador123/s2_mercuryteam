{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "prompt" : "Schema", "href" : "http://schema.org/Book"},
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
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del libro"}
        ]
      } {% if not loop.last %},{% endif %}
      
      {% endfor %}
  
    ],
    
    "template" : {
      "data" : [
    {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del libro"},
	  {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del libro"},
	  {"name" : "isbn", "value" : "{{ item.isbn }}", "prompt" : "isbn del libro"},
	  {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
	  {"name" : "image", "value" : "{{ item.image }}", "prompt" : "Imagen del libro"}
      ]
    }
  } 
}




