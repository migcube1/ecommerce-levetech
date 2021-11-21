start transaction;

insert into categoria(descripcion)
values('Hardware'), ('Impresión'),('Audio y Vídeo');

insert into producto(precio, precioOferta, nombre, descripcion,stock, puntuacion,imagen,claveCategoria)
values(619.99, 569.99, 'SSD ADATA SU630 120GB','SSD Adata Ultimate SU630 QLC 3D, 240GB, SATA, 2.5", 7mmB',200, 4.3,'PRODUCTO01.jpg',1),
(468, 418, 'SSD ADATA SU650 120GB','SSD Adata Ultimate SU650 QLC 3D, 120GB, SATA, 2.5", 7mmB',100,4.5,'PRODUCTO02.jpg',1),
(6100, 5809, 'RYZEN 5 5600G','Procesador AMD Ryzen 5 5600G con Gráficos Radeon 7, S-AM4, 3.90GHz, Six-Core, 16MB L3 Caché',46,4.2, 'PRODUCTO03.jpg',1),
(5880, 5600, 'Tarjeta Madre ASUS ATX','Tarjeta Madre ASUS ATX ROG STRIX B550-F GAMING WI-FI, S-AM4, AMD B550, HDMI, max. 128GB DDR4 para AMD',91,4.8, 'PRODUCTO04.jpg',1),
(1700, 1530, 'Tarjeta Madre Gigabyte micro ATX','Tarjeta Madre Gigabyte micro ATX A520M S2H, S-AM4, AMD A520, HDMI, 64GB DDR4 para AMD',12,4.0, 'PRODUCTO05.jpg',1),
(730, 660, 'RAM Kingston 8GB','Memoria RAM Kingston FURY Beast Black DDR4, 2666MHz, 8GB, Non-ECC, CL16, XMP',270,4.7, 'PRODUCTO06.jpg',1);

commit; 