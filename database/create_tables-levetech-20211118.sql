/** Crear base de datos*/ 

start transaction;

drop database if exists `levetech`;
create database levetech;
use levetech;

/** Crear tablas*/ 

create table CLIENTE(
    claveCliente  int not null AUTO_INCREMENT,
    nombre varchar(100),
    apaterno varchar(100),
    amaterno varchar(100),
    email varchar(50),
    telefono varchar(15),

    primary key (claveCliente)

);

create table DOMICILIO(
    claveDomicilio int not null AUTO_INCREMENT,
    calle varchar(100),
    numero int,
    cp int,
    colonia varchar(100),
    alcaldia varchar(100),
    estado varchar(100),
    claveCliente int not null,

    primary key (claveDomicilio)
);

create table PRODUCTO (
    claveProducto int not null  AUTO_INCREMENT,
    precio float,
    precioOferta float,
    nombre varchar(50),
    descripcion varchar(200),
    stock int,
    puntuacion float,
    imagen varchar(50),

    primary key (claveProducto)
    
);

create table ORDEN (
    claveOrden int not null AUTO_INCREMENT,
    fechaCompra varchar(50),
    montoTotal float,
    numeroTarjeta varchar(200),
    vecimiento varchar(200),
    codigoSeguridad varchar(200),
    claveEnvio int not null,
    claveCliente int not null,
    claveDomicilio int not null,

    primary key (claveOrden)

);

create table ENVIO (
    claveEnvio int  not null AUTO_INCREMENT,
    medioEnvio varchar(50),
    costoEnvio float,

    primary key (claveEnvio)
);



-- create table DETALLE_ORDEN(
--     claveDetalleOrden int not null AUTO_INCREMENT,
--     cantidad int,
--     claveOrden int not null,
--     claveProducto int not null,

--     primary key (claveDetalleOrden)
-- );


/** Relaciones de tablas */

alter table DOMICILIO
add foreign key (claveCliente) references CLIENTE(claveCliente);

-- alter table DETALLE_ORDEN
-- add foreign key (claveOrden) references ORDEN (claveOrden),
-- add foreign key (claveProducto) references PRODUCTO (claveProducto);

alter table ORDEN
add foreign key (claveEnvio) references ENVIO (claveEnvio),
add foreign key (claveDomicilio) references DOMICILIO(claveDomicilio),
add foreign key (claveCliente) references CLIENTE(claveCliente);

commit;


