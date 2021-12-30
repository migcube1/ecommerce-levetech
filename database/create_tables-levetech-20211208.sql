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
    activo int default 1,

    primary key (claveProducto)
    
);

create table ORDEN (
    claveOrden int not null AUTO_INCREMENT,
    fechaCompra varchar(50),
    montoTotal float,
    numeroTarjeta varchar(200),
    vencimiento varchar(200),
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



create table DETALLE_ORDEN(
  claveDetalleOrden int not null AUTO_INCREMENT,
  cantidad int,
  precioUnitario float,
  claveOrden int not null,
  claveProducto int not null,

  primary key (claveDetalleOrden)
);


/** Relaciones de tablas */

alter table DOMICILIO
add foreign key (claveCliente) references CLIENTE(claveCliente) on delete cascade;

alter table DETALLE_ORDEN
add foreign key (claveOrden) references ORDEN (claveOrden) on delete cascade,
add foreign key (claveProducto) references PRODUCTO (claveProducto) on delete cascade;

alter table ORDEN
add foreign key (claveEnvio) references ENVIO (claveEnvio) on delete cascade,
add foreign key (claveDomicilio) references DOMICILIO(claveDomicilio) on delete cascade,
add foreign key (claveCliente) references CLIENTE(claveCliente) on delete cascade;

/** Insertamos datos en la Base de datos **/

insert into ENVIO(medioEnvio, costoEnvio)
values('DHL', 99.99), ('Fedex',99.99);

insert into PRODUCTO(precio, precioOferta, nombre, descripcion,stock, puntuacion,imagen)
values
(619.99, 559.99, 'SSD ADATA SU630 120GB','SSD Adata Ultimate SU630 QLC 3D, 240GB, SATA, 2.5", 7mm',200, 4.3,'LVT-ADATA-ASU630SS-240GQ-R.jpg'),
(1619.00, 1479.00, 'SSD Kingston KC2500 500GB','SSD Kingston KC2500, 500GB, PCI Express 3.0, M.2, Escritura 2500 MB/s,  3500 MB/s',104,4.5,'LVT-KINGSTON-SKC2500M8-500G.jpg'),
(7129.00, 6819.00, 'Procesador AMD Ryzen 5 5600X','Procesador AMD Ryzen 5 5600X, S-AM4, 3.70GHz, 32MB L3 Cache - incluye Disipador Wraith Stealth',175,4.0, 'LVT-AMD-100-100000065BOX.jpg'),
(5880, 5600, 'Tarjeta Madre ASUS Micro ATX','Tarjeta Madre ASUS Micro ATX PRIME B450M-A II, S-AM4, AMD B450, HDMI, 128GB DDR4 para AMD ',91,4.8,'LVT-ASUS-90MB15Z0-M0AAY0.png'),
(1729, 1599, 'Tarjeta Madre Gigabyte Micro ATX H410M','Tarjeta Madre Gigabyte Micro ATX H410M H (REV. 1.0), S-1200, Intel H410 Express, HDMI, 64GB DDR4 para Intel',12,4.0, 'LVT-GIGABYTE-H410MH.jpg'),
(730, 660, 'Memoria RAM Kingston 8GB','Memoria RAM Kingston FURY Beast Black DDR4, 2666MHz, 8GB, Non-ECC, CL16, XMP',270,4.7,'LVT-KINGSTON-KF426C16BB8.jpg'),
(3389.00, 3149.00, 'Monitor LG 24MK430H-B','Monitor LG 24MK430H-B LED 24, Full HD, WideScreen, Free-Sync, 75Hz, HDMI, Negro',239, 5.0,'LVT-LG-24MK430HB.jpg'),
(2999.00, 2439.00, 'Fuente de Poder ASUS ROG','Fuente de Poder ASUS ROG Strix 750W 80 PLUS Gold, 20+4 pin ATX, 150mm, 750W',112, 4.5,'LVT-ASUS-90YE00A0-B0NA00.jpg'),
(1929.00, 1009.00, 'Gabinete Thermaltake V100','Gabinete Thermaltake V100 Window con Ventana RGB, Midi Tower, ATX, USB 2.0/3.0, sin Fuente, Negro',60, 3.5,'LVT-THERMALTAKE-CA-1K7-00M1WN00.jpg'),
(297.50, 250.50, 'Gabinete Thermaltake V100','Teclado Gamer Vorago Start The Game RGB, Alámbrico, Negro (Español)',40, 5.0,'LVT-VORAGO-KB-503.jpg');

commit;
