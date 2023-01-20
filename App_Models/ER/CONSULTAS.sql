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

SELECT * FROM estado_reservas; /* COMPLETADO, PENDIENTE DE PAGO */


SELECT * FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id;


SELECT p.dni, concat(p.nombre, ' ',p.apellidos) as datos, 
pt.nombre, r.fecha_reserva, SUM(pa.monto) as pago,er.nombre_estado, b.numero_boleta,r.id 
FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
INNER JOIN pagos pa on pa.reserva_id = r.id
INNER JOIN boletas b on b.id = pa.boleta_id
GROUP BY pa.reserva_id

ORDER BY r.updated_at;

-- CONSULTA PARA VERIFICAR EVENTOS QUE NO ESTAN EN LAS POSTERGACIÓN


SELECT * FROM evento_postergaciones ep
WHERE ep.id NOT IN (SELECT pr.evento_postergaciones_id 
					FROM postergacion_reservas pr WHERE pr.reserva_id = 2);


SELECT ep.id, ep.nombre_evento FROM evento_postergaciones ep
INNER JOIN postergacion_reservas pr on ep.id=pr.evento_postergaciones_id
WHERE pr.reserva_id = 22;



-- CONSULTAR LOS PAQUETES QUE COMPRÓ UN CLIENTE
SELECT p.dni, concat(p.nombre, ' ',p.apellidos) as datos, 
pt.nombre, r.fecha_reserva, SUM(pa.monto) as pago,er.nombre_estado, b.numero_boleta,r.id 
FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
INNER JOIN pagos pa on pa.reserva_id = r.id
INNER JOIN boletas b on b.id = pa.boleta_id
WHERE c.id = 2
GROUP BY pa.reserva_id
ORDER BY r.updated_at;





