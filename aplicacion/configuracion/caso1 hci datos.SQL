
-- Poblando... tabla contactos
INSERT INTO contactos VALUES ('17000000000', 'Pepa Rodriguez', 'Sra.', 'pepa01@gmail.com', '0990000000', 'Con Foto'); 
INSERT INTO contactos VALUES ('17000000001', 'Juan Perez', 'Sr.', 'juan.perez@gmail.com', '0990000001', 'Sin Foto');
INSERT INTO contactos VALUES ('17000000002', 'Pedro Martinez', 'Ing.', 'pedro.martinez@gmail.com', '0990000002', 'Con Foto');
INSERT INTO contactos VALUES ('17000000003', 'Ana Lopez', 'Dra.', 'ana.lopez@gmail.com', '0990000003', 'Sin Foto');
INSERT INTO contactos VALUES ('17000000004', 'Luis Garcia', 'Dr.', 'luis.garcia@gmail.com', '0990000004', 'Con Foto');

-- Poblando... ubicaciones 
INSERT INTO ubicaciones (codigo_ubicacion, direccion, latitud, longitud) VALUES ('UB001', 'Av. Naciones Unidas, Quito', -0.176125, -78.480209);
INSERT INTO ubicaciones (codigo_ubicacion, direccion, latitud, longitud) VALUES ('UB002', 'Malecon 2000, Guayaquil', -2.192418, -79.883835);
INSERT INTO ubicaciones (codigo_ubicacion, direccion, latitud, longitud) VALUES ('UB003', 'Plaza Foch, Quito', -0.203340, -78.492793);
INSERT INTO ubicaciones (codigo_ubicacion, direccion, latitud, longitud) VALUES ('UB004', 'Laguna Quilotoa, Cotopaxi', -0.861767, -78.906196);
INSERT INTO ubicaciones (codigo_ubicacion, direccion, latitud, longitud) VALUES ('UB005', 'Banios de Agua Santa, Tungurahua', -1.396944, -78.422778);

-- Poblando... usuario
INSERT INTO usuario (codigo_usuario, nombre, correo, contrasenia) VALUES ('US001', 'Carlos Ruiz', 'carlos.ruiz@example.com', 'contrasena1');
INSERT INTO usuario (codigo_usuario, nombre, correo, contrasenia) VALUES ('US002', 'Sofia Gutierrez', 'sofia.gutierrez@example.com', 'contrasena2');
INSERT INTO usuario (codigo_usuario, nombre, correo, contrasenia) VALUES ('US003', 'Miguel Chavez', 'miguel.chavez@example.com', 'contrasena3');
INSERT INTO usuario (codigo_usuario, nombre, correo, contrasenia) VALUES ('US004', 'Isabel Romero', 'isabel.romero@example.com', 'contrasena4');
INSERT INTO usuario (codigo_usuario, nombre, correo, contrasenia) VALUES ('US005', 'Andres Fernandez', 'andres.fernandez@example.com', 'contrasena5');

-- Poblando ... tabla eventos

INSERT INTO eventos VALUES ('EV001', 'C', 'Conferencia sobre Innovacion Educativa', '3', '2024-12-18 14:30:00', 'UTC-5', 50, 'N', 'S', '17000000000', 'UB002');
INSERT INTO eventos VALUES ('EV002', 'S', 'Seminario de Metodologias Activas', '4', '2024-12-16 10:30:00', 'UTC-5', 30, 'S', 'N', '17000000002', 'UB005');
INSERT INTO eventos VALUES ('EV003', 'T', 'Taller de Capacitacion Docente', '1', '2024-12-17 18:30:00', 'UTC-5', 20, 'N', 'S', '17000000003', 'UB001');
INSERT INTO eventos VALUES ('EV004', 'C', 'Conferencia de Mejoras en infraestructuras', '2', '2024-12-18 12:30:00', 'UTC-5', 100, 'S', 'N', '17000000004', 'UB004');
INSERT INTO eventos VALUES ('EV005', 'T', 'Taller de Habilidades Sociales', '5', '2024-12-19 08:00:00', 'UTC-5', 75, 'N', 'S', '17000000001', 'UB003');

--  Poblando... tabla permiso
INSERT INTO permiso (codigo_permiso, descripcion) VALUES ('P0001', 'Administrador');
INSERT INTO permiso (codigo_permiso, descripcion) VALUES ('P0002', 'Solo Eventos');
INSERT INTO permiso (codigo_permiso, descripcion) VALUES ('P0003', 'Solo Lectura');

--  Poblando... tabla permiso_usuario
INSERT INTO permiso_usuario (codigo_permiso_usuario, codigo_permiso, codigo_usuario) VALUES ('PU001', 'P0001', 'US001');
INSERT INTO permiso_usuario (codigo_permiso_usuario, codigo_permiso, codigo_usuario) VALUES ('PU002', 'P0002', 'US002');
INSERT INTO permiso_usuario (codigo_permiso_usuario, codigo_permiso, codigo_usuario) VALUES ('PU003', 'P0001', 'US003');
INSERT INTO permiso_usuario (codigo_permiso_usuario, codigo_permiso, codigo_usuario) VALUES ('PU004', 'P0001', 'US004');
INSERT INTO permiso_usuario (codigo_permiso_usuario, codigo_permiso, codigo_usuario) VALUES ('PU005', 'P0002', 'US005');
