
**#proyecto : api rest para la materia web 2 de la carrera TUDAI.**

api rest sencilla con el objetivo de manejar un CRUD de una organizacion de arbitros y asociaciones.

#como usar endpoints en POSTMAN
-------------------------------------------------------------------------------------------------------------------------------------------
**Tabla de Arbitros.**

obtener todos los arbitros: http://localhost/Web%202/TP_Especial_2/api/umpires.
obtener un arbitro por id: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
borrar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
editar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires/:ID.
agregar arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires.

obtener arbitros ordenados por arbitro: http://localhost/Web%202/TP_Especial_2/api/umpires?orderby=ASC.
para obtener los arbitros ordenados, escribir luego del orderby= "ASC" si se quiere ordenar de manera ascendente, o "DESC" si se quiere de manera descendente. 

paginacion de arbitros:  http://localhost/Web%202/TP_Especial_2/api/umpires?page=page&limit=limit.

ingresar en "page" la pagina que se quiere obtener, y en limit la cantidad de productos que se quieren por pagina.

filtrar los arbitros por lugar donde residen: //endpoint: /api/umpires?filter=columna&value=valor
Me traigo los arbitros de determinada residencia consultando un campo especifico de una columna y que coincida con la otra tabla

-------------------------------------------------------------------------------------------------------------------------------------------
**tabla Asociaciones.**

obtener todas las asociaciones: http://localhost/Web%202/TP_Especial_2/api/asociations.
obtener una asociacion por id: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
borrar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
editar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations/:ID.
agregar asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations.

obtener asociaciones ordenadas por asociacion: http://localhost/Web%202/TP_Especial_2/api/asociations?orderby=ASC.

mismas indicaciones para el ordenamiento de los arbitros.

paginacion de las asociaciones: http://localhost/Web%202/TP_Especial_2/api/asociations?page=page&limit=limit. 

mismas indicaciones que se usan para paginar los arbitros.

obtener token de autorizacion:   http://localhost/Web%202/TP_Especial_2/api/auth/token.
Usar este endpoint para obtener el token, luego entrar a auth basic y loguearse con: 
#el mail es admin@gmail.com
#la contraseña es 1234

Luego entrar a Bearer Token pero con la url normal para hacer los que nos pedia autorizacion para editar, agregar, y eliminar arbitros y asociaciones.


----------------------------------------------------------------------------------------------------------
#el mail es admin@gmail.com
#la contraseña es 1234

se adjunta la base de datos db_torneos.sql para trabajar con las tablas
