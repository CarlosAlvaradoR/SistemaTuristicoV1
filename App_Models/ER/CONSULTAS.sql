
-- SELECCIONAR LAS CONDICIONES DE PUNTUALIDAD DE UN PAQUETE
SELECT cp.descripcion, cp.id FROM paquetes_turisticos pt
INNER JOIN condicion_puntualidades cp on cp.paquete_id = pt.id
WHERE cp.paquete_id = 1;


-- SELECCIONAMOS LOS RIESGOS DEL PAQUETE

SELECT r.descripcion, r.id FROM paquetes_turisticos pt
INNER JOIN riesgos r on r.paquete_id = pt.id
WHERE r.paquete_id = 1;

-- MAPA PARA LA PARTE PÚBLICA
SELECT mp.id, mp.ruta, mp.descripcion FROM mapa_paquetes mp
WHERE mp.paquete_id = 1
LIMIT 1;


/*
Te hemos enviado un nuevo código de verificación. Por favor, revisa la bandeja de recibidos o SPAM (no deseados) de tu correo electrónico
*/

-- LUGARES A VISITAR PARA LA PARTE PÚBLICA
SELECT l.nombre, atu.nombre_atractivo FROM lugares l
INNER JOIN atractivos_turisticos atu on atu.lugar_id = l.id
INNER JOIN visita_atractivos_paquetes vap on vap.atractivo_id = atu.id
WHERE vap.paquete_id = 3;

-- PAGOS POR SERVICIO PARA LA PARTE PÚBLICA
SELECT bpp.descripcion, bpp.precio FROM boletos_pagar_paquetes as bpp
WHERE bpp.paquete_id = 3;

-- ACTIVIDADES ITINERARIOS PARA LA PARTE PÚBLICA
SELECT ai.nombre_actividad, ip.descripcion FROM actividades_itinerarios ai
INNER JOIN itinerario_paquetes ip on ai.id=ip.actividad_id
WHERE ai.paquete_id = 1;

-- CATEGORÍA DE HOTELES PARA LA PARTE PÚBLICA
SELECT ch.descripcion FROM categoria_hoteles ch
WHERE ch.paquete_id=1;

-- PERSONAL ACOMPAÑANTE PARA LA PARTE PÚBLICA
SELECT tp.nombre_tipo, pt.cantidad FROM tipo_personales tp
INNER JOIN personal_tipos pt on pt.tipo_id = tp.id
WHERE pt.paquete_id = 1;

-- TIPO DE TRANSPORTES PARA LA PARTE PÚBLICA
SELECT tt.nombre_tipo, ttp.cantidad FROM tipo_transportes tt
INNER JOIN tipotransporte_paquetes ttp on ttp.tipotransporte_id = tt.id
WHERE ttp.paquete_id = 1;

-- TIPOS DE ALIMENTACIÓN PARA LA PARTE PÚBLICA
SELECT ta.nombre, tap.descripcion FROM tipo_alimentaciones ta
INNER JOIN tipoalimentacion_paquetes tap on tap.tipoalimentacion_id = ta.id
WHERE tap.paquete_id = 1;

-- EQUIPOS PARA LA PARTE PÚBLICA
SELECT e.nombre, ep.cantidad, ep.observacion FROM equipos e
INNER JOIN equipo_paquetes ep on ep.equipo_id = e.id
WHERE ep.paquete_id = 1;

-- TIPOS DE ACÉMILAS PARA LA PARTE PÚBLICA
SELECT ta.nombre, tap.cantidad FROM tipo_acemilas ta
INNER JOIN tipoacemila_paquetes tap on tap.paquete_id = ta.id
WHERE tap.paquete_id = 1;

-- TIPO DE ALMUERZOS PARA LA PARTE PÚBLICA
SELECT ta.nombre, tap.observacion FROM tipo_almuerzos ta
INNER JOIN tipoalmuerzo_paquetes tap on tap.tipo_almuerzo_id = ta.id
WHERE tap.paquete_id = 1;

-- CONDICIONES DE PUNTUALIDAD PARA LA PARTE PÚBLICA
SELECT cp.descripcion FROM condicion_puntualidades cp
WHERE cp.paquete_id = 1;

-- RIESGOS PARA LA PARTE PÚBLICA
SELECT r.descripcion FROM riesgos r
WHERE r.paquete_id = 1;

-- AUTORIZACIONES MÉDICAS PARA LA PARTE PÚBLICA
SELECT * FROM autorizaciones_medicas
WHERE paquete_id = 1
limit 1;















SELECT * FROM lugares l
right JOIN atractivos_turisticos at on at.lugar_id = l.id;
SELECT atu.id, atu.nombre_atractivo, atu.descripcion FROM atractivos_turisticos atu
WHERE atu.lugar_id = 2;


SELECT * FROM personal_tipos
WHERE tipo_id = 2;



-- PARA EL SELECT EN EL MODO PÚBLICO
SELECT tp.nombre_tipo_pago, cp.id, cp.numero_cuenta FROM tipo_pagos tp
INNER JOIN cuenta_pagos cp on cp.tipo_pagos_id = tp.id
WHERE tp.id != 1;

DESC solicitud_devolucion_dineros;



SELECT * FROM autorizaciones_medicas
WHERE paquete_id = 1
limit 1;

SELECT * FROM autorizaciones_presentadas;










                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 /* BUSCAR CLIENTE*/
-- ///////////RESERVAS /////////////////////////////////////////////**************************

-- CONSULTA DE LA INFORMACIÓN DE UN CLIENTE PARA LAS SOLICITUDES Y DEVOLUCIONES DE DINERO
SELECT concat(p.nombre, " ",p.apellidos) as datos, p.dni, pt.nombre, r.fecha_reserva FROM personas p
INNER JOIN clientes c ON c.persona_id = p.id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
WHERE r.id = 2;


-- SELECCIONAR LAS SOLICITUDES PAGOS DE UNA RESERVA
SELECT sp.id, sp.estdo_solicitud, sp.observacion, p.monto FROM solicitud_pagos sp
INNER JOIN pagos p on sp.pagos_id = p.id
WHERE p.reserva_id = 2;
-- SELECCIONAR LA SOLICITUD PAGO - DEVOLUCIONES PARA PODER DEVOLVER DINERO
SELECT sp.id, sp.estdo_solicitud, sp.observacion, p.monto, 
dd.monto as montoDevolucion, dd.observacion as observacionDevolucion, dd.fecha_hora 
FROM solicitud_pagos sp
INNER JOIN pagos p on sp.pagos_id = p.id
LEFT JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id
WHERE p.reserva_id = 2;

DESC pagos;
SELECT * FROM personas;

-- SELECCIONAR LOS PAGOS QUE TIENE UNA RESERVA EN BASE AL ID DE LA RESERVA PARA LAS SOLICITUDES Y DEVOLUCIONES DE DINERO
SELECT p.id, 	monto, fecha_pago, estado_pago, ruta_archivo_pago, tp.nombre_tipo_pago, cp.numero_cuenta FROM pagos p
INNER JOIN cuenta_pagos cp on cp.id = p.cuenta_pagos_id
INNER JOIN tipo_pagos tp on tp.id = cp.tipo_pagos_id
WHERE p.reserva_id = 1;



CREATE OR REPLACE VIEW v_reserva_lista_clientes_registrados AS
SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos,  p.telefono, c.id as idCliente FROM personas p
LEFT JOIN clientes c on p.id = c.persona_id;
-- WHERE p.dni = "83327-9128";
SELECT * FROM v_reserva_lista_clientes_registrados;
		
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


-- VERIFICAR SI LA RESERVA QUE TIENE EL ID DEL PAQUETE NECESITA ARCHIVOS
SELECT * FROM autorizaciones_medicas am WHERE am.paquete_id = 1; 
-- VERIFICAR QUE HAYAN ARCHIVOS MÉDICOS SUBIDOS POR EL CLIENTE QUE HIZO LA RESERVA
SELECT * FROM autorizaciones_presentadas ap WHERE ap.reserva_id = 1;

/* CONSULTAR LOS CRITERIOS MÉDICOS ACEPTADOS Y POR ACEPTRAR DE UN CLIENTE QUE REALIZÓ UNA RESERVA*/
-- cm.descripcion_criterio_medico, if(ifm.autorizaciones_presentadas_id > 0, ifm.autorizaciones_presentadas_id,0) as a
SELECT cm.descripcion_criterio_medico, cm.id,
-- (SELECT COUNT(*) FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = cm.id AND ifm.autorizaciones_presentadas_id=2), 
(CASE
    WHEN (SELECT COUNT(ifm.criterios_medicos_id) FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = cm.id AND ifm.autorizaciones_presentadas_id=1) > 0 THEN "1"
    ELSE "0"
END) as existe
 FROM criterios_medicos cm;
 
-- CONSULTA PARA ELIMINAR LOS CRITERIOS ACEPTADOS 
SELECT * FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = 2;

/*SELECT cm.descripcion_criterio_medico FROM criterios_medicos cm
WHERE cm.id IN (SELECT ifm.criterios_medicos_id FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = cm.id)
 OR cm.id NOT IN (SELECT ifm.criterios_medicos_id FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = cm.id);
*/

SELECT * FROM item_fichas_medicas ifm WHERE ifm.criterios_medicos_id = 2;
SELECT COUNT(*) FROM item_fichas_medicas;
SELECT * FROM autorizaciones_presentadas;
-- https://www.google.com/search?q=criterios+medicos+de+riesgo+viaje&oq=criterios+medicos++de+riesgo+viaje&aqs=chrome..69i57.14530j0j1&sourceid=chrome&ie=UTF-8
-- https://www.central-vuelos-ambulancia.es/blog/enfermedades-que-impiden-viajar-en-avion_8474.html


SELECT * FROM estado_reservas; /* COMPLETADO, PENDIENTE DE PAGO */


SELECT * FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id;


-- LISTA DE RESERCAS DE LOS CLIENTES
CREATE OR REPLACE VIEW v_reserva_reservas_general as
SELECT p.dni, concat(p.nombre, " ",p.apellidos) as datos,
r.id as idReserva, 
pt.nombre, r.fecha_reserva, 
SUM(pa.monto) as pago, 
(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) as aceptado,
(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "NO ACEPTADO" AND ps.reserva_id = r.id) as no_aceptado,
(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) as en_proceso,
er.nombre_estado, 
(CASE
    WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) = pt.precio THEN "PAGO COMPLETADO"
    WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) <= pt.precio THEN "EN PROCESO"
    ELSE "PENDIENTE DE PAGO"
END) as estado_oficial,
b.numero_boleta,r.id,
(SELECT (DATEDIFF(fecha_reserva, curdate()))) as dias_faltantes,
case 
  when (SELECT fecha_reserva-curdate())>=0 AND (SELECT fecha_reserva-curdate()) <=10  then "PRÓXIMA A CUMPLIRSE"  
  when  (SELECT fecha_reserva-curdate())>10 then "EN PROGRAMACIÓN"  
  when (SELECT fecha_reserva-curdate())<0 then "PASADOS DE FECHA"
end as estado_reserva,
r.slug
FROM personas p
INNER JOIN clientes c on p.id=c.persona_id
INNER JOIN reservas r on r.cliente_id=c.id
INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
INNER JOIN pagos pa on pa.reserva_id = r.id
INNER JOIN boletas b on b.id = pa.boleta_id
GROUP BY pa.reserva_id , pa.estado_pago
ORDER BY r.updated_at;


SELECT * FROM v_reserva_reservas_general;
SELECT * FROM v_reserva_lista_reservas_general vrg 
WHERE vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr);
-- WHERE idReserva NOT IN (SELECT parti.reserva_id FROM participantes parti) OR 
-- idReserva NOT IN (SELECT posr.reserva_id FROM postergacion_reservas posr);





-- CONSULTA PARA VERIFICAR EVENTOS QUE NO ESTAN EN LAS POSTERGACIÓN
SELECT * FROM postergacion_reservas;

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


SELECT * FROM reservas;



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


-- CONSULTA PARA CONOCER SI UN CLIENTE YA SESERVÓ PARA UNA DETERMINADA FECHA
SELECT * FROM reservas WHERE cliente_id = 2 AND fecha_reserva = '2023-03-21';


/* 
CONSULTA PARA FILTRAR INFORMACIÓN EN LA EDICIÓN DE RESERVAS
*/
-- SACAR LOS CLIENTES Y SU FECHA DE RESERVA
SELECT p.id as idPersona, p.dni, p.nombre, p.apellidos, p.genero, p.telefono, p.dirección, n.id as idNacionalidad, c.id as idCliente,
pa.numero_pasaporte, pa.ruta_archivo_pasaporte, pa.id as idPasaporte,
r.fecha_reserva, r.observacion, r.id as idReserva
FROM personas p
INNER JOIN clientes c on c. persona_id=p.id
INNER JOIN nacionalidades n on n.id = c.nacionalidad_id
LEFT JOIN pasaportes pa on pa.cliente_id = c.id
INNER JOIN reservas r on r.cliente_id = c.id
WHERE r.id = 1;

SELECT id as idPago, monto, fecha_pago, numero_de_operacion, estado_pago, observacion_del_pago, 
ruta_archivo_pago, reserva_id, cuenta_pagos_id, boleta_id 
FROM pagos pa WHERE reserva_id = 10;



SELECT id as idAutorizacionMedica, numero_autorizacion, ruta_archivo, reserva_id, autorizaciones_medicas_id FROM autorizaciones_presentadas
WHERE reserva_id = 6
LIMIT 1;

-- CONOCER LOS PAGOS REALIZADOS POR CADA RESERVA
SELECT p.id as idPago, r.id,p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago, p.observacion_del_pago,
p.ruta_archivo_pago,tp.nombre_tipo_pago, cp.numero_cuenta, b.numero_boleta 
FROM reservas r
INNER JOIN pagos p on r.id=p.reserva_id
INNER JOIN cuenta_pagos cp on cp.id = p.cuenta_pagos_id
INNER JOIN tipo_pagos tp on tp.id = cp.tipo_pagos_id
INNER JOIN boletas b on b.id = p.boleta_id
WHERE r.id = 1;
SELECT * FROM pagos;


-- SELECCIONAR LOS TIPOS DE PAGO CON SUS RESPECTIVAS CUENTAS BANCARIAS PARA LAS RESERVAS
SELECT tp.nombre_tipo_pago, cp.id as idCuentaPago, cp.numero_cuenta FROM tipo_pagos tp
INNER join cuenta_pagos cp on tp.id = cp.tipo_pagos_id;

-- CONSULTA PARA CONOCER LOS CLIENTES QUE SOLICITARON DEVOLUCIÓN
SELECT concat(p.nombre,' ', p.apellidos) as datos, sdv.estado, sdv.fecha_presentacion,
pt.nombre, dd.observacion, dd.monto, r.id
FROM personas p
INNER JOIN clientes c on c.persona_id = p.id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
INNER JOIN solicitud_devolucion_dineros sdv on sdv.reserva_id = r.id
INNER JOIN devolucion_dineros dd on dd.solicitud_devolucion_dinero_id = sdv.id;




-- SABER LA LISTA DE SOLICITUDES GENERALES
SELECT concat(p.nombre,' ',p.apellidos) as datos, p.dni, r.slug, ep.nombre_evento, 
sdd.fecha_presentacion, sdd.estado, SUM(pa.monto) as montoTotal 
FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN postergacion_reservas pr on pr.reserva_id =r.id
INNER JOIN evento_postergaciones ep on ep.id = pr.evento_postergaciones_id
INNER JOIN solicitud_devolucion_dineros sdd	on sdd.postergacion_reservas_id = pr.id
LEFT JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
LEFT JOIN pagos pa on pa.id = sp.pagos_id
GROUP BY sdd.id;

DESC solicitud_devolucion_dineros;

SELECT * FROM personas;


-- SABER LA LISTA DE DEVOLUCIONES
SELECT concat(p.nombre, ' ' ,p.apellidos) as datos, p.dni, r.slug, sdd.fecha_presentacion, 
SUM(pa.monto) as montoSolicitado, (SELECT SUM(monto) FROM devolucion_dineros WHERE solicitud_pagos_id = sp.id) as montoDevuelto
-- dd.monto as montoDevuelto 
FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN postergacion_reservas pr on pr.reserva_id = r.id
INNER JOIN solicitud_devolucion_dineros sdd on sdd.postergacion_reservas_id = pr.id
INNER JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
INNER JOIN pagos pa on pa.id = sp.pagos_id
LEFT JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id
GROUP BY sp.solicitud_devolucion_dinero_id, dd.solicitud_pagos_id;

SELECT SUM(dev.monto) FROM devolucion_dineros dev;
SELECT * FROM nacionalidades;


/*
REPORTES
*/
-- COMPROBANTE DE LAS RESERVAS
SELECT CONCAT(p.nombre, ' ',p.apellidos) as datos, p.telefono, pt.nombre, r.fecha_reserva, r.id FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
WHERE r.id = 19;

-- PAGOS ACEPTADOS
SELECT p.monto, p.fecha_pago, b.numero_boleta, r.id FROM reservas r
INNER JOIN pagos p on p.reserva_id = r.id
INNER JOIN cuenta_pagos cp on cp.id = p.cuenta_pagos_id
INNER JOIN tipo_pagos tp on tp.id = cp.tipo_pagos_id
INNER JOIN boletas b on b.id = p.boleta_id
WHERE r.id = 10 AND p.estado_pago = 'ACEPTADO';

SELECT * FROM pagos;
SELECT COUNT(*) FROM reservas;
-- REPORTE DE LAS RESERVAS
SELECT * FROM v_reserva_reservas_general vrg
WHERE (vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR
vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr));

SELECT * FROM v_reserva_reservas_general vrg
WHERE vrg.fecha_reserva between "2023-03-14" and "2023-03-17" AND estado_reserva = "EN PROCESO" AND (vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR
vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr));

SELECT * FROM v_reserva_reservas_general vrg
WHERE vrg.fecha_reserva between "2023-03-14" and "2023-03-17";

SELECT * FROM v_reserva_lista_reservas_general vrg
WHERE estado_oficial = "EN PROCESO";

SELECT DATEDIFF('2023-03-16', curdate());
SELECT * FROM v_reserva_lista_reservas_general vrg
WHERE (vrg.fecha_reserva between "2023-03-14" and "2023-03-17")
AND (vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR
vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr));

-- Visualizar e imprimir el reporte de los pagos realizados por las reservas
-- de los clientes, diario o de un periodo de fechas indicado
SELECT CONCAT(p.nombre, " ",p.apellidos)as datos, p.dni, pa.fecha_pago,pa.estado_pago,pa.monto FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN pagos pa on pa.reserva_id = r.id
ORDER BY pa.fecha_pago;

SELECT CONCAT(p.nombre, " ",p.apellidos) as datos, p.dni, pa.fecha_pago,pa.estado_pago,pa.monto FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN pagos pa on pa.reserva_id = r.id
WHERE pa.fecha_pago BETWEEN "2023-03-10" AND "2023-04-31"
ORDER BY pa.fecha_pago;

/*Visualizar e imprimir el reporte de los montos que fueron devueltos en
un periodo de fechas.	  
*/
SELECT CONCAT(p.nombre," ", p.apellidos)as datos, p.dni, pt.nombre, r.fecha_reserva, 
ep.nombre_evento, pa.monto as solicitado, dd.fecha_hora, dd.monto as devuelto
FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
INNER JOIN postergacion_reservas pr on pr.reserva_id = r.id
LEFT JOIN evento_postergaciones ep on ep.id = pr.evento_postergaciones_id
INNER JOIN solicitud_devolucion_dineros sdd on sdd.postergacion_reservas_id = pr.id
INNER JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
INNER JOIN pagos pa on sp.pagos_id = pa.id
INNER JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id;

SELECT CONCAT(p.nombre," ", p.apellidos)as datos, p.dni, pt.nombre, r.fecha_reserva, 
ep.nombre_evento, pa.monto as solicitado, dd.fecha_hora, dd.monto as devuelto
FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
INNER JOIN postergacion_reservas pr on pr.reserva_id = r.id
LEFT JOIN evento_postergaciones ep on ep.id = pr.evento_postergaciones_id
INNER JOIN solicitud_devolucion_dineros sdd on sdd.postergacion_reservas_id = pr.id
INNER JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
INNER JOIN pagos pa on sp.pagos_id = pa.id
INNER JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id
WHERE dd.fecha_hora between "2023-03-11" and "2023-03-20";




SELECT * FROM personas;





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


-- PAGOS DE BOLETOS DE VIAJES
SELECT id, descripcion, fecha, monto, viaje_paquetes_id FROM pago_boletos_viajes pbv
WHERE pbv.viaje_paquetes_id = 1;




-- ACTIVIDADES DE ACLIMATACIÓN
SELECT id, descripcion, fecha, monto, viaje_paquetes_id FROM actividades_aclimataciones ac
WHERE ac.viaje_paquetes_id = 1;



-- ASISTENTES
SELECT * FROM asistentes;

-- SELECCIONAR LOS ASISTENTES DE LA RESERVA
CREATE OR REPLACE VIEW v_viaje_clientes_participantes_reservas AS
SELECT concat(p.nombre,' ' ,p.apellidos) as datos, par.id, par.viaje_paquetes_id FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN participantes par on par.reserva_id = r.id;
-- where par.viaje_paquetes_id = 2; -- where viaje_paquete_id = al parámetro


-- SELECCIONAR A LOS ASISTENTES QUE ESTÁN PARTICIPANDO EN LAS ACTIVIDADES
CREATE OR REPLACE VIEW v_viaje_clientes_participantes_actividades_aclimatacion AS
SELECT concat(p.nombre,' ' ,p.apellidos) as datos, par.id, par.viaje_paquetes_id, a.actividades_aclimataciones_id, a.id as idAsistente FROM personas p
INNER JOIN clientes c on p.id = c.persona_id
INNER JOIN reservas r on r.cliente_id = c.id
INNER JOIN participantes par on par.reserva_id = r.id
INNER JOIN asistentes a on a.participantes_id = par.id;



select * from v_viaje_clientes_participantes_reservas
WHERE id NOT IN (SELECT a.participantes_id FROM asistentes as a 
	WHERE a.actividades_aclimataciones_id = 1)
AND viaje_paquetes_id = 1;


-- CONOCER LOS HOTELES HOSPEDADOS POR VIAJE
SELECT hos.id, hos.fecha_inicial, hos.fecha_final, hos.monto, h.nombre FROM hospedajes hos
INNER JOIN hoteles h on h.id = hos.hoteles_id
WHERE hos.viaje_paquetes_id = 3;



-- SELECCIONAR LAS ACTIVIDAES QUE LE CORRESPONDEN AL VIAJE POR PAQUETE
SELECT ai.nombre_actividad,ip.id,ip.descripcion, ip.actividad_id, ic.fecha_cumplimiento  
FROM actividades_itinerarios ai
INNER JOIN itinerario_paquetes ip on ai.id = ip.actividad_id
left join itinerarios_cumplidos ic on ic.itinerario_paquetes_id = ip.id
WHERE ai.paquete_id = 1;
SELECT * FROM itinerarios_cumplidos;



-- PERSONAS QUE SON ARRIEROS
CREATE OR REPLACE VIEW v_viaje_personas_arrieros AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, a.id as idArriero FROM personas p
INNER JOIN arrieros a on a.persona_id = p.id;

SELECT * FROM v_viaje_personas_arrieros 
WHERE idArriero NOT IN (select aq.arrieros_id from acemilas_alquiladas aq WHERE aq.viaje_paquetes_id = 1);


-- PERSONAS QUE SON ARRIEROS Y QUE PARTICIPAN DE UN VIAJE
CREATE OR REPLACE VIEW v_viaje_personas_arrieros_participantes_viaje AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, a.id as idArriero, aq.monto, aq.id as idAcemilasAlquiladas,
aq.viaje_paquetes_id
FROM personas p
INNER JOIN arrieros a on a.persona_id = p.id
INNER JOIN acemilas_alquiladas aq on aq.arrieros_id = a.id;


-- PERSONAS QUE SON COCINEROS
CREATE OR REPLACE VIEW v_viaje_personas_cocineros AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, c.id as idCocinero FROM personas p
INNER JOIN cocineros c on c.persona_id = p.id;

SELECT * FROM v_viaje_personas_cocineros 
WHERE idCocinero NOT IN (select vpc.cocinero_id from viaje_paquetes_cocineros vpc WHERE vpc.viaje_paquetes_id = 1);

-- PERSONAS QUE SON COCINEROS Y QUE PARTICIPAN DE UN VIAJE
CREATE OR REPLACE VIEW v_viaje_personas_cocineros_participantes_viaje AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, c.id as idCocinero, vpc.monto_pagar, vpc.id as idViajePaqueteCocinero,
vpc.viaje_paquetes_id
FROM personas p
INNER JOIN cocineros c on c.persona_id = p.id
INNER JOIN viaje_paquetes_cocineros vpc on vpc.cocinero_id = c.id;


-- PERSONAS QUE SON GUÍAS
CREATE OR REPLACE VIEW v_viaje_personas_guias AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, g.id as idGuia FROM personas p
INNER JOIN guias g on g.persona_id = p.id;

SELECT * FROM v_viaje_personas_guias 
WHERE idGuia NOT IN (select vpg.guias_id from viaje_paquetes_guias vpg WHERE vpg.viaje_paquetes_id = 1);

-- PERSONAS QUE SON GUIAS Y QUE PARTICIPAN DE UN VIAJE
CREATE OR REPLACE VIEW v_viaje_personas_guias_participantes_viaje AS
SELECT concat(p.nombre, ' ', p.apellidos) as datos, g.id as idGuia, vpg.monto_pagar, vpg.id as idViajePaqueteCocinero,
vpg.viaje_paquetes_id
FROM personas p
INNER JOIN guias g on g.persona_id = p.id
INNER JOIN viaje_paquetes_guias vpg on vpg.guias_id = g.id;




-- BUSCAR ARRIERO --> MÓDULO VIAJES - ARRIERO
SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idArriero FROM personas p
LEFT JOIN arrieros a on a.persona_id = p.id
WHERE p.dni = '70988855' LIMIT 1;

-- BUSCAR COCINERO --> MÓDULO VIAJES - COCINERO
SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idCocinero FROM personas p
LEFT JOIN cocineros a on a.persona_id = p.id
WHERE p.dni = '70988855' LIMIT 1;

-- BUSCAR GUIA --> MÓDULO VIAJES - GUIA
SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, g.id as idGuia FROM personas p
LEFT JOIN guias g on g.persona_id = p.id
WHERE p.dni = '70988855' LIMIT 1;







-- VISTA PARA CONOCER TODOS LOS VIAJES
CREATE OR REPLACE VIEW v_viajes_all AS
SELECT pt.id as idPaquete,pt.nombre,pt.slug, vp.descripcion, vp.fecha, vp.cantidad_participantes,
vp.hora, vp.estado, vp.id as id
FROM paquetes_turisticos pt
INNER JOIN viaje_paquetes vp on vp.paquete_id = pt.id;

SELECT * FROM v_viajes_all;



-- SACAR LAS EMPRESAS DE TRANSPORTE
SELECT * FROM empresa_transportes;



-- LISTA DE VEHÍCULOS DE UNA EMPRESA
SELECT et.nombre_empresa, v.numero_placa, v.descripcion, v.id FROM empresa_transportes et
INNER JOIN vehiculos v on v.empresa_transportes_id = et.id
WHERE v.empresa_transportes_id = 1;



-- CONOCER LAS PERSONAS QUE SON CHOFERES
CREATE OR REPLACE VIEW v_viajes_pesonas_choferes AS
SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, ch.id as idChofer FROM personas pe
LEFT JOIN choferes ch on pe.id = ch.persona_id;

SELECT * FROM v_viajes_pesonas_choferes
WHERE dni = '09987' LIMIT 1;

SELECT * FROM choferes;


-- CONSULTAR LOS VEHÍCULOS Y EMPRESAS DE UN VIAJE PARA LOS TRASLADOS DE VIAJES
SELECT et.nombre_empresa, v.numero_placa, tv.descripcion, tv.fecha, tv.monto, tv.id as idTraslado FROM empresa_transportes et
INNER JOIN vehiculos v on et.id = v.empresa_transportes_id
INNER JOIN traslado_viajes tv on tv.vehiculos_id = v.id
WHERE tv.viaje_paquetes_id = 2;

SELECT * FROM traslado_viajes;



-- SELECCIONAR PERSONAS QUE SON CHOFERES
select concat(p.nombre, ' ', p.apellidos) as datos, p.dni, c.numero_licencia, c.id as idChofer from personas p
inner join choferes c on c.persona_id = p.id;


-- CONOCER LAS PERSONAS QUE SON COCINEROS Y CUALES NO
CREATE OR REPLACE VIEW v_viajes_pesonas_cocineros AS
SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, co.id as idCocinero FROM personas pe
LEFT JOIN cocineros co on pe.id = co.persona_id;

-- CONOCER LAS PERSONAS QUE SON COCINEROS
select concat(p.nombre, ' ', p.apellidos) as datos, p.dni, co.id as idCocinero from personas p
inner join cocineros co on co.persona_id = p.id; 





-- CONOCER LAS PERSONAS QUE SON GUIAS Y CUALES NO
CREATE OR REPLACE VIEW v_viajes_pesonas_guias AS
SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, gui.id as idGuia FROM personas pe
LEFT JOIN guias gui on pe.id = gui.persona_id;

-- SELECCIONAR PERSONAS QUE SON GUIAS
select concat(p.nombre, ' ', p.apellidos) as datos, p.dni, gui.id as idGuia from personas p
inner join guias gui on gui.persona_id = p.id;

-- SELECCIONAR PERSONAS QUE SON ARRIEROS
select concat(p.nombre, ' ', p.apellidos) as datos, p.dni, aso.nombre, a.id as idArriero from personas p
inner join arrieros a on a.persona_id = p.id
INNER JOIN asociaciones aso on aso.id = a.asociaciones_id;

















/********************** PEDIDOS PROVEEDORES *********************/
SELECT * FROM proveedores;



SELECT b.nombre_banco, b.direccion, cpb.numero_cuenta, cpb.estado, cpb.id FROM bancos b
INNER JOIN cuenta_proveedor_bancos cpb on b.id = cpb.bancos_id
WHERE cpb.proveedores_id = 1;

-- CONOCER LOS EQUIPOS QUE SE HICIERON PEDIDO
SELECT e.nombre, m.nombre as marca, dp.cantidad,dp.precio_real, dp.id FROM equipos e
INNER JOIN marcas m on m.id = e.marca_id
INNER JOIN detalle_pedidos dp on dp.equipo_id = e.id
WHERE dp.pedidos_id = 2;


SELECT * FROM detalle_pedidos
WHERE pedidos_id = 2;




-- LISTA DE PEDIDOS A PROVEEDORES
SELECT p.nombre_proveedor, p.ruc, pe.fecha, pe.monto,
cp.numero_comprobante, ac.ruta_archivo, ep.estado, p.slug, pe.id as idPedido
FROM proveedores p
INNER JOIN pedidos pe on p.id = pe.proveedores_id
INNER JOIN estado_pedidos ep on ep.id = pe.estado_pedidos_id
LEFT JOIN comprobante_pagos cp on cp.pedidos_id = pe.id
LEFT JOIN tipo_comprobantes tc on tc.id = cp.tipo_comprobante_id
LEFT JOIN archivo_comprobantes ac on ac.comprobante_id = cp.id;
-- INNER JOIN detalle_pedidos dp on dp.pedidos_id = pe.id;

-- SELECCIONAR EL PEDIDO Y ARCHIVO DE LOS COMPROBANTES
SELECT cp.id, cp.numero_comprobante, cp.tipo_comprobante_id, cp.fecha_emision, ac.id as idArchivo,ac.ruta_archivo, ac.validez, 
cp.pedidos_id
FROM comprobante_pagos cp
LEFT JOIN archivo_comprobantes ac on ac.comprobante_id = cp.id
WHERE cp.pedidos_id = 13;

SELECT * FROM comprobante_pagos;

SELECT id, monto_deuda, estado, comprobante_id FROM deudas 
WHERE comprobante_id = 3;


-- SELECCIONAR LOS PAGOS CORRESPONDIENTES A UN COMPROBANTE Y UNA RESERVA
SELECT b.nombre_banco, cpb.numero_cuenta, pp.monto_equipos, pp.fecha_pago, 
pp.numero_depósito, pp.ruta_archivo, pp.validez_pago, pp.monto_deuda,
pp.id as idPagoProveedor
FROM bancos b
INNER JOIN cuenta_proveedor_bancos cpb on b.id = cpb.bancos_id
INNER JOIN pago_proveedores pp on pp.cuenta_proveedor_bancos_id = cpb.id
LEFT JOIN deudas d on d.id = pp.deuda_id
WHERE pp.comprobante_id = 8;


SELECT * FROM pago_proveedores;

-- SELECCIONAR LOS PROVEEDRES Y SUS CUENTAS BANCARIAS PARA EL COMBO DE PAGOS A PROVEEDORES
SELECT cpb.id, cpb.numero_cuenta, b.nombre_banco FROM proveedores p
INNER JOIN cuenta_proveedor_bancos cpb on cpb.proveedores_id = p.id
INNER JOIN bancos b on b.id = cpb.bancos_id
WHERE p.id = 2;


-- CONOCER LOS EQUIPOS QUE SE HICIERON PEDIDO PARA LOS DETALLES DE LOS INGRESOS
SELECT e.nombre, m.nombre as marca, dp.cantidad, di.cantidad as cantidadIngresada, dp.precio_real, dp.id, 
e.id as idEquipo
FROM equipos e
INNER JOIN marcas m on m.id = e.marca_id
INNER JOIN detalle_pedidos dp on dp.equipo_id = e.id
LEFT JOIN detalle_ingresos di on di.detalle_pedidos_id = dp.id
WHERE dp.pedidos_id = 2;



SELECT * FROM equipos;





















/**------------------------------------------------ EQUIPOS --------------------------------------------------------------*/
-- SACAR EQUIPOS CON SU MARCA 
SELECT e.id, e.nombre, e.descripcion, e.stock,e.precio_referencial, e.tipo, m.nombre as marca FROM equipos e
INner join marcas m on m.id = e.marca_id;


SELECT * FROM equipos;

SELECT * FROM hoteles;

-- SELECCIONAR LOS EQUIPOS EN MANTENIMIENTO
SELECT m.id as idMantenimiento,date_format(m.fecha_salida_mantenimiento, "%d-%m-%Y") as fecha_salida_mantenimiento, m.cantidad, m.observacion, 
dm.id as idDevolucionMantenimiento,date_format(dm.fecha_entrada_equipo, "%d-%m-%Y") as fecha_entrada_equipo, dm.cantidad_equipos_arreglados_buen_estado, dm.observacion as obsDevolucion
FROM equipos e
LEFT JOIN mantenimientos m on m.equipo_id = e.id
LEFT JOIN devolucion_mantenimientos dm on dm.mantenimientos_id = m.id
WHERE m.equipo_id = 1;




SELECT id, date_format(fecha_baja, "%d-%m-%Y") as fecha_baja, motivo_baja, cantidad, equipo_id FROM baja_equipos
WHERE equipo_id = 1;












































                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           