Diseñar una clase Coche con los atributos matricula, modelo y precio. La clase debe tener los atributos de clase 
modeloCaro  y  precioCaro,  que  contendrá  en  todo  momento  el  modelo  del  coche  más  caro  y  su  precio.  Los 
métodos a incluir son:  
• constructor con todos los atributos  
• getters y setters  
• toString (devuelve los datos en columnas de fila de tabla: “matriculamodelo...”).  
• Incluir un método de clase “masCaro” que devuelva un String con el modelo y el precio del coche más caro. 
Diseñar  una  clase  CocheLujo,  que  contendrá  todos  los  atributos  y  métodos  de  la  clase  Coche  y  además  un 
atributo suplemento (se pasa en el constructor), que habrá que añadir al precio cuando se consulte a través del 
método getPrecio(), los coches de lujos también hay que tenerlos en cuenta como posible modelo de coche más 
caro, pero sin contar con el suplemento (solo su precio). En el método toString de la clase CocheLujo también 
hay que devolver el suplemento (es una columna más de la fila de tabla devuelta).  

Diseñar una página que permita crear coches de la clase Coche y vaya mostrando el listado de los mismos en 
una tabla, si el coche no es de lujo, en la celda del suplemento mostrará “No procede”. También se mostrará 
en la cabecera de la página los datos del coche más caro.