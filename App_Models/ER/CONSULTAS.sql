/* BUSCAR CLIENTE*/

SELECT p.dni, concat(p.nombre,' ',p.apellidos) as datos, c.id as idCliente FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
WHERE p.dni = "83327-9128";


/* CONSULTAR LOS RIESGOS QUE AÚN NO ACEPTA EL CLIENTE*/
SELECT * FROM riesgos r
WHERE NOT EXISTS
(SELECT NULL FROM riesgos_aceptados ra WHERE ra.riesgos_id = r.id AND ra.reserva_id = 2)
AND r.paquete_id = 1;

/* CONSULTAR LAS CONDICIONES QUE AÚN NO ACEPTA EL CLIENTE*/
SELECT id, descripcion, paquete_id FROM condicion_puntualidades cp
WHERE NOT EXISTS
(SELECT NULL FROM condiciones_aceptadas ca WHERE ca.condicion_puntualidades_id = cp.id AND ca.reserva_id = 2)
AND cp.paquete_id = 1;

SELECT * FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id;


