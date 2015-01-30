{ "collection" :
  {
    "version" : "1.0",
    "href" : "{{ url }}",
    
    "links" : [
      {"rel" : "profile" , "href" : "http://schema.org/MusicAlbum"},
      {"rel" : "collection", "href" : "{{ url }}/../../movies"},
      {"rel" : "collection", "href" : "{{ url }}/../../books"},
      {"rel" : "collection", "href" : "{{ url }}/../../musicalbums"},
      {"rel" : "collection", "href" : "{{ url }}/../../videogames"}
    ],
    
    "items" : [
      {
        "href" : "{{ url }}",
        "data" : [
          {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del álbum"},
	  {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del álbum"},
	  {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
	  {"name" : "image", "value" : "{{ item.image }}", "prompt" : "Imagen del disco"},
	  {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Canción en Grooveshark"}
	]
      } 
  
    ],
    
    
    "template" : {
      "data" : [
        {"name" : "name", "value" : "", "prompt" : "Nombre del álbum"},
	{"name" : "description", "value" : "", "prompt" : "Descripción del álbum"},
	{"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
	{"name" : "image", "value" : "", "prompt" : "Imagen del disco"},
	{"name" : "embedUrl", "value" : "", "prompt" : "Canción en Grooveshark"}        
      ]
    }
  } 
}




