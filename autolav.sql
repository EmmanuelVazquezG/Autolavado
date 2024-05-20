/*-Gafes 7w7-*/
/*--------------------------------------------Creacion BD------*/
DROP DATABASE if EXISTS AutoLav;
CREATE DATABASE AutoLav;
USE AutoLav;

/*-------------------------------------------TABLAS DE BD------*/
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL UNIQUE,
contra VARCHAR(50) NOT NULL,
permisos ENUM('admin','empleado') NOT NULL);

DROP TABLE IF EXISTS puntaje;
CREATE TABLE puntaje(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fkidempleado INT,
FOREIGN KEY (fkidempleado) REFERENCES usuarios(id),
generado DOUBLE NOT NULL,
paga DOUBLE NOT NULL,
fecha DATE NOT null);

CREATE TABLE vehiculos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL UNIQUE,
formacobro VARCHAR(50) NOT NULL,
valor DOUBLE NOT NULL);

CREATE TABLE registro(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
cliente VARCHAR(100) NOT NULL,
fkvehiculo INT NOT NULL,
FOREIGN KEY (fkvehiculo) REFERENCES vehiculos(id),
fkidempleado INT,
FOREIGN KEY (fkidempleado) REFERENCES usuarios(id),
matricula VARCHAR(100) NOT NULL,
fecha DATE NOT NULL,
cantidad DOUBLE NOT null,
Estado ENUM('Espera','Aceptado','Finalizado')NOT NULL);

DROP TABLE IF EXISTS pagos;
CREATE TABLE pagos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fkidempleado INT NOT NULL,
FOREIGN KEY (fkidempleado) REFERENCES usuarios(id),
fecha DATE NOT NULL,
cantidad DOUBLE NOT NULL);

DROP TABLE IF EXISTS EmpleadoDia;
CREATE TABLE EmpleadoDia(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fecha DATE NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
total DOUBLE NOT NULL);

/*-------------------------------------------Procedures-----*/
/*-Insertar registro-*/
DELIMITER //
DROP PROCEDURE IF EXISTS InsertarRegistro //
CREATE PROCEDURE InsertarRegistro(
    IN cliente VARCHAR(100),
    IN fkvehiculo INT,
    IN matricula VARCHAR(100)
)
BEGIN
    DECLARE fecha_actual DATE;
    SET fecha_actual = CURDATE();
    
    INSERT INTO registro(cliente, fkvehiculo, matricula, fecha, Estado)
    VALUES (cliente, fkvehiculo, matricula, fecha_actual, 'Espera');
    
    SELECT 'Registro insertado correctamente.';
END //
DELIMITER ;

/*-Insertar registro usuario-*/
DELIMITER //
DROP PROCEDURE if EXISTS InsertarUsuario //
CREATE PROCEDURE InsertarUsuario(
    IN p_nombre VARCHAR(50),
    IN p_contra VARCHAR(50)
)
BEGIN
    DECLARE exit handler for SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;
    START TRANSACTION;
    INSERT INTO usuarios (nombre, contra, permisos)
    VALUES (p_nombre, p_contra, 'empleado');
    COMMIT;
END //
DELIMITER ;

/*--------------------PAga estimada---------------------*/
CREATE VIEW vista_paga_estimada AS
SELECT u.nombre AS empleado, 
       c.fecha AS fecha, 
       SUM(c.total) AS totalxDia,
       SUM(c.total * 0.5) AS PagaEstimada
		FROM cobros c
		INNER JOIN vehiculos v ON c.fkvehiculo = v.id
		INNER JOIN usuarios u ON c.fkempleado = u.id
		GROUP BY u.nombre, c.fecha
		ORDER BY c.fecha;



/*---------------------Vista para mostrar clientes atendidos----------------*/
CREATE VIEW vista_lista_reserva AS
SELECT r.id AS turno, r.cliente,v.nombre AS nombre_vehiculo, r.fecha, r.estado
FROM registro r
INNER JOIN vehiculos v ON r.fkvehiculo = v.id
ORDER BY r.id

SELECT * FROM vista_lista_reserva;

/*----------VIsta para el empleado del dia--------------*/
DROP VIEW IF EXISTS vista_empleadodia;
CREATE VIEW vista_empleadodia AS
SELECT e.id AS turno, e.fecha,u.nombre AS nombre_usuario, e.total
FROM empleadodia e
INNER JOIN usuarios u ON e.fkempleado = u.id
ORDER BY e.id

SELECT * FROM vista_empleadodia;

/*-------------Vista de pagos diarios---------------*/
DROP VIEW IF EXISTS vista_pagosdiarios;
CREATE VIEW vista_pagosdiarios AS
SELECT p.id AS turno, u.nombre AS nombre_usuario, p.fecha,p.cantidad
FROM pagos p
INNER JOIN usuarios u ON p.fkidempleado = u.id
ORDER BY p.id

SELECT * FROM vista_pagosdiarios;
SELECT * FROM pagos;
/*V------------------------Vista para mostrar trabajos------------------*/
CREATE VIEW vista_trabajos AS 
SELECT r.id AS turno, r.cliente,v.nombre AS nombre_vehiculo, r.matricula, r.Estado
FROM registro r
INNER JOIN vehiculos v ON r.fkvehiculo = v.id
ORDER BY r.id

SELECT * FROM vista_trabajos;
select * from vista_trabajos where Estado = 'Espera';


/*-------------------VIsta para pagar empleado----------------------*/
CREATE VIEW VistaPuntaje AS
SELECT u.nombre AS nombre_empleado, p.fecha, p.paga AS Cantidad
FROM puntaje p
JOIN usuarios u ON p.fkidempleado = u.id;

SELECT * FROM VistaPuntaje;
select * from VistaPuntaje where nombre_empleado = '%';

/*-----------Vista del clientes atendidos-------------------*/
CREATE VIEW VistaClientesA AS
SELECT r.cliente, v.nombre AS Tipo_Vehiculo, u.nombre AS Nombre_Empleado, r.matricula, r.fecha, r.cantidad
FROM registro r
JOIN vehiculos v ON r.fkvehiculo = v.id
LEFT JOIN usuarios u ON r.fkidempleado = u.id;

SELECT * FROM VistaClientesA;
/*----------------------Procedure para insertar registro---------------*/
DELIMITER //
DROP PROCEDURE IF EXISTS InsertarRegistro;
CREATE PROCEDURE InsertarRegistro(
    IN p_cliente VARCHAR(100),
    IN p_fkvehiculo INT,
    IN p_matricula VARCHAR(100),
    IN p_fecha DATE,
    IN p_cantidad DOUBLE
)
BEGIN
    -- Se inserta el nuevo registro en la tabla registro
    INSERT INTO registro (cliente, fkvehiculo, fkidempleado, matricula, fecha, cantidad, Estado)
    VALUES (p_cliente, p_fkvehiculo, 4, p_matricula, p_fecha, p_cantidad, 'Espera');
END//

DELIMITER ;

/*----------------Procedure para insertar un nuevo usuario-------------------*/
DELIMITER //
DROP PROCEDURE if EXISTS InsertarUsuario;
CREATE PROCEDURE InsertarUsuario(
    IN nombre_param VARCHAR(50),
    IN contra_param VARCHAR(50)
)
BEGIN
    DECLARE nuevo_id INT;
    
    -- Insertar en la tabla usuarios
    INSERT INTO usuarios (nombre, contra, permisos)
    VALUES (nombre_param, contra_param, 'empleado');
    
    -- Obtener el ID del usuario insertado
    SET nuevo_id = LAST_INSERT_ID();
    
    -- Insertar en la tabla puntaje
    INSERT INTO puntaje (fkidempleado, generado, paga, fecha)
    VALUES (nuevo_id, 0.0, 0.0, CURDATE());
    
END //

DELIMITER ;

/*-------------Trigger para tabla de puntaje--------------------*/
DELIMITER //
DROP TRIGGER IF EXISTS Cantidadpato;
CREATE TRIGGER Cantidadpato
AFTER UPDATE ON registro
FOR EACH ROW
BEGIN 
	IF NEW.Estado = 'Aceptado' then
		IF NEW.fkidempleado != 1 then
			IF NEW.fkvehiculo = 1 then
				UPDATE puntaje SET generado = (generado+(NEW.cantidad * 4)), paga = (paga+(NEW.cantidad * 2))  WHERE fkidempleado = NEW.fkidempleado;
			END IF;
			IF NEW.fkvehiculo = 2 then
				UPDATE puntaje SET generado = (generado+(NEW.cantidad * 8)), paga = (paga+(NEW.cantidad * 4)) WHERE fkidempleado = NEW.fkidempleado;
			END IF;
			IF NEW.fkvehiculo = 3 then
				UPDATE puntaje SET generado = (generado+(NEW.cantidad * 10)), paga = (paga+(NEW.cantidad * 5)) WHERE fkidempleado = NEW.fkidempleado;
			END IF;
		END if;
	END if;
END//
delimiter //



/*-------Trigger para el empleado del dia------------*/
DELIMITER //
DROP TRIGGER IF EXISTS EmpDia;
CREATE TRIGGER EmpDia
AFTER UPDATE ON puntaje
FOR EACH ROW
BEGIN 
    DECLARE max_generado DECIMAL(10, 2);
    IF (SELECT COUNT(*) FROM empleadodia WHERE fecha = CURDATE()) = 0 THEN
        INSERT INTO empleadodia (fecha, fkempleado, total) VALUES (CURDATE(), 2, 0.0);
    END IF;
    IF (SELECT fecha FROM empleadodia) = CURDATE() THEN
        SELECT MAX(generado) INTO max_generado FROM puntaje;
        UPDATE empleadodia SET fkempleado = NEW.fkidempleado, total = max_generado WHERE fecha = CURDATE();
    END IF;
END //
DELIMITER //

/*-------------------------------------------Prueba-----*/
UPDATE registro SET Estado = 'Espera' WHERE Estado = 'Aceptado' AND cliente = 'Marce';
UPDATE registro SET Estado = 'Espera' WHERE Estado = 'Aceptado' AND cliente = 'Sakura';
UPDATE registro SET fkidempleado = 4 WHERE cliente = 'Marce';
UPDATE registro SET fkidempleado = 4 WHERE cliente = 'Sakura';
SELECT * FROM registro;
SELECT * FROM usuarios;
SELECT * FROM puntaje;
SELECT * FROM vehiculos;
SELECT * FROM vista_trabajos;
SELECT * FROM pagos;
SELECT * FROM empleadodia;
select * from vista_empleadodia where turno LIKE '%';
INSERT INTO usuarios VALUES(NULL,'Gretel','1234','empleado');
INSERT INTO usuarios VALUES(NULL,'Miguel','1234','empleado');
INSERT INTO usuarios VALUES(NULL,'Pan','1234','empleado');
INSERT INTO usuarios VALUES(NULL,'Naruto','1234','empleado');
INSERT INTO usuarios VALUES(NULL,'Jusepe','1234','admin');
INSERT INTO vehiculos VALUES(NULL,'Automovil','Pieza',4);
INSERT INTO vehiculos VALUES(NULL,'Camioneta','Puertas',8);
INSERT INTO vehiculos VALUES(NULL,'Tracto Camión','Metros',12);


INSERT INTO puntaje VALUES(NULL,'sagid45','1234','admin');
CALL Insertarusuario('gretel','123');
INSERT INTO registro VALUES(NULL,'Marce',1,'2001106','2024-05-16','Espera');
INSERT INTO registro VALUES(NULL,'Dulce',2,'2001107','2024-05-16','Aceptado');

DELETE FROM registro WHERE cliente = 'Dulce';
SELECT * FROM registro;
SELECT * FROM pagos;




