/* Creación de la Base de Datos */
CREATE DATABASE IF NOT EXISTS xyz_hcicaso01
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;


/* Switch */
/* USE caso01HCIDM; */

/* Elimina las tablas existentes  */

DROP TABLE IF EXISTS contactos;
DROP TABLE IF EXISTS eventos;
DROP TABLE IF EXISTS permiso;
DROP TABLE IF EXISTS permiso_usuario;
DROP TABLE IF EXISTS ubicaciones;
DROP TABLE IF EXISTS usuario;

-- Creando ... tabla contactos
CREATE TABLE contactos (
    identificacion VARCHAR(15)  NOT NULL COMMENT 'Numero de identificacion',
    nombre         CHAR(50)     NOT NULL COMMENT 'Nombre completo',
    saludo         CHAR(10)     NOT NULL COMMENT 'Tipo de Saludo' DEFAULT 'Sr.' CHECK ( saludo IN ( 'Dr.', 'Dra.', 'Ing.', 'Sr.', 'Sra.', 'Srta.' ) ),
    correo         VARCHAR(25)  NOT NULL COMMENT 'Correo elelctronico del Contacto',
    telefono       VARCHAR(15)  NOT NULL COMMENT 'Numero de telefono',
    fotografia     CHAR(35)     COMMENT 'Directorio ubicacion de la fotografia',
	PRIMARY KEY (identificacion)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Creando ... tabla ubicaciones
CREATE TABLE ubicaciones (
    codigo_ubicacion VARCHAR(5) NOT NULL COMMENT 'Codigo de la Ubicacion',
    direccion        CHAR(50)   NOT NULL COMMENT 'Direccion',
	latitud 		 FLOAT 		NOT NULL COMMENT 'Coordenadas geograficas - Latitud',
	longitud 		 FLOAT 		NOT NULL COMMENT 'Coordenadas geograficas - Longitud',
	PRIMARY KEY ( codigo_ubicacion )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Creando ... tabla usuario
CREATE TABLE usuario (
    codigo_usuario VARCHAR(10) NOT NULL COMMENT 'Codigo del usuario',
    nombre         CHAR(50)    NOT NULL COMMENT 'Nombre del usuario',
    correo         VARCHAR(15) NOT NULL COMMENT 'Correo del usuario', 
    contrasenia    VARCHAR(64) NOT NULL COMMENT 'Contrasenia del usuario',
	PRIMARY KEY ( codigo_usuario )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Creando ... tabla eventos
CREATE TABLE eventos (
    codigo_evento    VARCHAR(5)   NOT NULL COMMENT 'Codigo del evento',
    tipo             CHAR(1)      NOT NULL COMMENT 'Tipo de evento' DEFAULT 'C' CHECK ( tipo IN ( 'C', 'S', 'T' ) ),
    descripcion      CHAR(50)     NOT NULL COMMENT 'Descripcion del evento',
    clasificacion    CHAR(1)      NOT NULL COMMENT 'Clasificacion del evento' DEFAULT '1' CHECK ( clasificacion IN ( '1', '2', '3', '4', '5', '6' ) ),
    fecha            DATETIME     NOT NULL COMMENT 'Fecha y hora del evento',
    zona             CHAR(25)     NOT NULL COMMENT 'Zona horaria del evento',
    invitados        INT(2)       NOT NULL COMMENT 'Nomero de invitados',
    repeticion       CHAR(1)      NOT NULL COMMENT 'Repeticion del  evento'  DEFAULT 'N' CHECK ( repeticion IN ( 'N', 'S' ) ),
    recordatorio     CHAR(1)      NOT NULL COMMENT 'Recordatorio del evento' DEFAULT 'N' CHECK ( repeticion IN ( 'N', 'S' ) ),
    identificacion   VARCHAR(15)  NOT NULL COMMENT 'Identificacion del Contacto',
    codigo_ubicacion VARCHAR(5)   NOT NULL COMMENT 'Codigo de la Ubicacion',
	PRIMARY KEY ( codigo_evento ),
	FOREIGN KEY ( identificacion )   REFERENCES contactos ( identificacion ),
	FOREIGN KEY ( codigo_ubicacion ) REFERENCES ubicaciones ( codigo_ubicacion )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Creando ... tabla permiso
CREATE TABLE permiso (
    codigo_permiso VARCHAR(10)  NOT NULL COMMENT 'Codigo del permiso',
    descripcion    CHAR(50)     NOT NULL COMMENT 'Descripcion del permiso',
	PRIMARY KEY ( codigo_permiso )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Creando ... tabla permiso_usuario
CREATE TABLE permiso_usuario (
    codigo_permiso_usuario VARCHAR(10) NOT NULL COMMENT 'Codigo del permiso del  usuario',
    codigo_permiso         VARCHAR(10) NOT NULL COMMENT 'Codigo del permiso',
    codigo_usuario         VARCHAR(10) NOT NULL COMMENT 'Codigo del usuario',
	PRIMARY KEY ( codigo_permiso_usuario, codigo_permiso, codigo_usuario ),
	FOREIGN KEY ( codigo_permiso )   REFERENCES permiso ( codigo_permiso ),
	FOREIGN KEY ( codigo_usuario )   REFERENCES usuario ( codigo_usuario )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
