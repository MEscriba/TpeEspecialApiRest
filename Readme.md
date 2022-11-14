#proyecto : api rest para la materia web 2 de la carrera TUDAI.

api rest sencilla para poder utilizar desde phpMyAdmin, con el objetivo de manejar un CRUD de una organizacion de arbitros y asociaciones.

#como usar : endpoints.

#Tabla de Arbitros.

obtener todos los arbitros: http://localhost/Web%202/TP_Especial_2/api/umpires.
obtener un arbitro por id: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
borrar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
editar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
agregar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires.

obtener arbitros ordenados por arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires/api/umpires?orderby=arbitro.
para obtener los arbitros ordenados, escribir luego del orderby= "ASC" si se quiere ordenar de manera ascendente, o "DESC" si se quiere de manera descendente. 

paginacion de arbitros:  http://localhost/Web%202/TP_Especial_2/api/umpires?page=page&limit=limit.

ingresar en "page" la pagina que se quiere obtener, y en limit la cantidad de productos que se quieren por pagina.

#tabla asociaciones.

obtener todas las asociaciones: http://localhost/Web%202/TP_Especial_2/api/asociations.
obtener una asociacion por id: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
borrar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
editar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
agregar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations.

obtener asociaciones ordenadas por asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations/api/asociations?orderby=asociacion.

mismas indicaciones para el ordenamiento de los arbitros.

paginacion de las asociaciones: http://localhost/Web%202/TP_Especial_2/api/asociations?page=page&limit=limit. 

mismas indicaciones que se usan para paginar los arbitros.

obtener token de autorizacion:   http://localhost/Web%202/TP_Especial_2/api/auth/token.
usar este endpoint para obtener el token, el cual nos va a autorizar a editar, agregar, y eliminar arbitros y asociaciones.


