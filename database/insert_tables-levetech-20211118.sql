start transaction;

insert into categoria(descripcion)
values('Hardware'), ('Impresión'),('Audio y Vídeo');

insert into producto(precio, precioOferta, nombre, descripcion,stock, puntuacion,imagen,claveCategoria)
values(1000, 950.99, 'SSD ADATA 120GB','Unidad de Estado Sólido ADATA 120 GB',200, 4.3,'PRODUCTO01.jpg',1),
(1500, 999.99, 'SSD ADATA 240GB','Unidad de Estado Sólido ADATA 240 GB',100,4.5,'PRODUCTO02.jpg',1),
(7000, 6700.00, 'RYZEN 5 3800','Procesador Ryzen 5 3800 a 5 GHz',200,3.9, 'PRODUCTO03.jpg',1);

commit; 