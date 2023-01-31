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





-- CREAR LA VISTA PARA CONOCER 
CREATE OR REPLACE VIEW v_informacion_clientes_reserva AS
SELECT p.dni, concat(p.nombre, ' ',p.apellidos) as datos, 
pt.nombre, pt.precio, r.fecha_reserva, SUM(pa.monto) as pago,
er.nombre_estado, r.id as idReserva 
FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
INNER JOIN pagos pa on pa.reserva_id = r.id
-- INNER JOIN boletas b on b.id = pa.boleta_id
-- WHERE r.id = 2
GROUP BY pa.reserva_id;
-- LIMIT 1;


-- CONOCER LOS PAGOS REALIZADOS POR CADA RESERVA
SELECT p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago,
p.ruta_archivo_pago,tp.nombre_tipo_pago, b.numero_boleta 
FROM reservas r
INNER JOIN pagos p on r.id=p.reserva_id
INNER JOIN tipo_pagos tp on tp.id = p.tipo_pagos_id
INNER JOIN boletas b on b.id = p.boleta_id
WHERE r.id = 2;


-- CONSULTA PARA CONOCER LOS CLIENTES QUE SOLICITARON DEVOLUCIÓN
SELECT concat(p.nombre,' ', p.apellidos) as datos, sdv.estado, sdv.fecha_presentacion,
pt.nombre, dd.observacion, dd.monto, r.id
FROM personas p
INNER JOIN clientes c on c.persona_id = p.id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
INNER JOIN solicitud_devolucion_dineros sdv on sdv.reserva_id = r.id
INNER JOIN devolucion_dineros dd on dd.solicitud_devolucion_dinero_id = sdv.id;










--  ////////////////////////// VIAJES /////////////////////////////
SELECT p.dni, concat(p.nombre, ' ',p.apellidos) as datos,
r.id as idReserva, r.fecha_reserva 
FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
WHERE r.paquete_id = 1;




-- LISTA DE CLIENTES QUE RESERVARON PARA UN DETERMINADO PAQUETE
SELECT concat(p.nombre, '', p.apellidos) as datos FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER join reservas r on c.id = r.cliente_id
INNER JOIN estado_reservas er on r.estado_reservas_id = er.id
WHERE er.nombre_estado = 'COMPLETADO'
	AND r.paquete_id = 2
 AND r.id NOT IN(SELECT par.reserva_id FROM participantes par);


-- LOS PARTICIPANTES DEL VIAJE
SELECT concat(p.nombre, '', p.apellidos) as datos, parti.id FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER join reservas r on c.id = r.cliente_id
INNER JOIN estado_reservas er on r.estado_reservas_id = er.id
INNER JOIN participantes parti on parti.reserva_id = r.id;




-- ALMUERZOS DE CELBRACIÓN DE UN PAQUETE
SELECT ac.id, ac.descripcion, ac.cantidad, ac.monto, aso.nombre FROM almuerzo_celebraciones ac
INNER JOIN asociaciones aso on ac.asociaciones_id = aso.id
WHERE ac.viaje_paquetes_id = 1;

SELECT sum(ac.monto) as Monto from almuerzo_celebraciones ac
WHERE ac.viaje_paquetes_id = 1;








