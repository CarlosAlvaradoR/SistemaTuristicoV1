/* BUSCAR CLIENTE*/

SELECT p.dni, concat(p.nombre,' ',p.apellidos) as datos, c.id as idCliente FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
WHERE p.dni = "83327-9128";
