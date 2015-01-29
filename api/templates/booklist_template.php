{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "href" : "http://schema.org/Movie"},
      {"rel" : "collection", "href" : "{{ url }}/../movies"},
      {"rel" : "collection", "href" : "{{ url }}/../books"},
      {"rel" : "collection", "href" : "{{ url }}/../musicalbums"},
      {"rel" : "collection", "href" : "{{ url }}/../videogames"}
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




