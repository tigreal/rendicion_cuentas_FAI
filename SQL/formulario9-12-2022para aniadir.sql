create database [formulario]
COLLATE Latin1_General_100_CI_AI
use formulario 
use testing
drop database formulario
CREATE TABLE login(name nvarchar(100) collate Latin1_General_100_CI_AI,carnet nvarchar(100),clave nvarchar(50))
	
CREATE TABLE register(
	id int IDENTITY(1,1) NOT NULL primary key,
	email nvarchar(255),
	username nvarchar(255) collate Latin1_General_100_CI_AI ,
	password nvarchar(255))
	

CREATE TABLE temp_form_datos(
	number_form_temp int,
	fecha date,
	PS_field nvarchar(30),
	nombre nvarchar(300) collate Latin1_General_100_CI_AI,
	ci nvarchar(50),
	area nvarchar(50) collate Latin1_General_100_CI_AI,
	proyecto nvarchar(100) collate Latin1_General_100_CI_AI,
	importe decimal(5, 2),
	destinoFondos nvarchar(100) collate Latin1_General_100_CI_AI,
	fecha_factura date,
	numero_factura nvarchar(300),
	detalle_descripcion_factura nvarchar(500) collate Latin1_General_100_CI_AI,
	monto_factura decimal(5, 2),
	total [decimal](5, 2),
	saldo decimal(5, 2),
	reintegro decimal(5, 2)
) 
select * from temp_form_datos
UPDATE temp_form_datos
SET proyecto = 'HOGAR DE NIÑAS OBRAJES' where number_form_temp = '2'
;

CREATE TABLE temp_number_formulario(
	numero_formulario_temp int IDENTITY(1,1) NOT NULL primary key,
	ps_field nvarchar(30) NOT NULL,
	ci nvarchar(30) NOT NULL)

alter table login
add type_user nvarchar(40) 

use Prueba
select * from OPRJ
select * from login
