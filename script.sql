create table TopicosWeb.usuarios
(
	id int auto_increment
		primary key,
	nombre varchar(20) not null,
	usuario varchar(20) not null,
	pass varchar(8) not null,
	constraint usuarios_usuario_uindex
		unique (usuario)
);

create table TopicosWeb.notas
(
	id int auto_increment
		primary key,
	titulo varchar(50) not null,
	nota text not null,
	creada date default curdate() null,
	id_usuario int null,
	constraint notas_ibfk_1
		foreign key (id_usuario) references TopicosWeb.usuarios (id)
);

create index id_usuario
	on TopicosWeb.notas (id_usuario);
INSERT INTO TopicosWeb.usuarios (id, nombre, usuario, pass) VALUES (1, 'Mario', 'mario_1', 'mario123');


INSERT INTO TopicosWeb.notas (id, titulo, nota, creada, id_usuario) VALUES (2, 'segunda--editada', 'Segunda nota creada por el mismo usuario', '2021-09-16', 1);
INSERT INTO TopicosWeb.notas (id, titulo, nota, creada, id_usuario) VALUES (5, 'Prueba Home', 'Prueba desde el home.php para probar el redireccionamiento y la excepcion.', '2021-09-16', 1);
INSERT INTO TopicosWeb.notas (id, titulo, nota, creada, id_usuario) VALUES (6, 'Probando estilos -- formulario editar', 'Esta es una nota para probar estilos, la prueba consiste en tener mas de 3 notas con div card', '2021-09-16', 1);
INSERT INTO TopicosWeb.notas (id, titulo, nota, creada, id_usuario) VALUES (7, 'Formulario a un lado', 'Con esta nota se pretende ver que el formulario a la derecha se ve adecuadamente.', '2021-09-17', 1);
INSERT INTO TopicosWeb.notas (id, titulo, nota, creada, id_usuario) VALUES (8, 'Comida Méxicana', 'La noche del 15 de septiembre es muy común que las personas coman pozole, tamales, tacos entre otras comidas típicas de nuestro país', '2021-09-17', 1);

