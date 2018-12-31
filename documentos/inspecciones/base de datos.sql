-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 10-03-2017 a las 21:18:01
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `proyecto`
-- 
CREATE DATABASE `proyecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto`;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `aseguradora`
-- 

CREATE TABLE `aseguradora` (
  `codAseguradora` varchar(4) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `rif` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fechaFundacion` date NOT NULL,
  `mision` varchar(600) collate utf8_spanish_ci NOT NULL,
  `Vision` varchar(600) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codAseguradora`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `aseguradora`
-- 

INSERT INTO `aseguradora` VALUES ('0001', 'Los Andes', 'j-000936-hgte-980', '2000-01-05', 'Cumplir la valiosa labor social de proteger a las personas y su patrimonio, asumiendo riesgos e indemnizando las pérdidas cubiertas por las pólizas, ofreciendo productos innovadores, atención personalizada y excelente servicio, con un personal altamente capacitado e identificado con la organización, tecnología de punta, una fuerza de ventas comprometida con la empresa y criterios de negocio: técnico, administrativo, financiero y comercial, que nos permitan lograr la satisfacción de nuestros clientes, intermediarios, empleados y proveedores y niveles de utilidad acorde a las expectativas de los', 'Ser líderes del mercado asegurador, consolidándonos como empresa responsable, dinámica, eficiente y altamente competitiva, ofreciendo respuestas efectivas y oportunas, logrando la satisfacción de nuestros asegurados, intermediarios, empleados y accionistas.', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `certificadoseguro`
-- 

CREATE TABLE `certificadoseguro` (
  `codCertificado` int(10) NOT NULL auto_increment,
  `PolizaDeSeguroCodPoliza` varchar(4) collate utf8_spanish_ci NOT NULL,
  `Vehiculoplaca` varchar(7) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codCertificado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `certificadoseguro`
-- 

INSERT INTO `certificadoseguro` VALUES (11, '0002', 'ART-123', 'A');
INSERT INTO `certificadoseguro` VALUES (10, '0002', 'KTR-2L1', 'A');
INSERT INTO `certificadoseguro` VALUES (9, '0002', 'KKK-123', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cita`
-- 

CREATE TABLE `cita` (
  `codCita` int(4) NOT NULL auto_increment,
  `Tomadorcedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `comentario` varchar(255) collate utf8_spanish_ci NOT NULL,
  `SucursalcodSucursal` varchar(4) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codCita`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `cita`
-- 

INSERT INTO `cita` VALUES (1, '2383321', '2017-02-27', 'sadasd', '0001', 'A');
INSERT INTO `cita` VALUES (2, '34252', '2017-03-01', 'fsdgs', '0003', 'E');
INSERT INTO `cita` VALUES (3, '1234', '2017-03-06', 'estem', '0002', 'A');
INSERT INTO `cita` VALUES (4, '1111', '2017-02-07', '', '0002', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cliente`
-- 

CREATE TABLE `cliente` (
  `cedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `edad` int(10) NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) collate utf8_spanish_ci NOT NULL,
  `e-mail` varchar(20) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `cliente`
-- 

INSERT INTO `cliente` VALUES ('23746292', 12, 'Pablo', 'Suarez', '1990-02-04', 27, 'Quibor, la Ermita. Calle 13', '04162837171', 'juan@hotmail.com', 'A');
INSERT INTO `cliente` VALUES ('20123123', 24, 'Maria', 'Perez', '1999-02-04', 18, 'Petare, casa 15', '04242939292', 'Maria@gmail.com', 'A');
INSERT INTO `cliente` VALUES ('20300400', 10, 'Juana', 'De Arco', '1989-02-05', 26, 'Calle 15, callejo 13, casa 20', '04249487362', 'Juana@hotmail.com', 'A');
INSERT INTO `cliente` VALUES ('26141319', 24, 'Hanny', 'Kahuan', '1990-07-01', 26, 'Petare', '04164857328', 'hanny@gmail.com', 'A');
INSERT INTO `cliente` VALUES ('2383321', 3, 'Prueba', 'Cita', '1999-03-09', 18, 'asdasd', '1231231', 'dasd@hotmail.com', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cobertura`
-- 

CREATE TABLE `cobertura` (
  `codCobertura` varchar(4) collate utf8_spanish_ci NOT NULL,
  `SegurocodSeguro` varchar(4) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipoCobertura` varchar(15) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codCobertura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `cobertura`
-- 

INSERT INTO `cobertura` VALUES ('0001', '0001', 'Daño a cosas', 'Cubre los daños materiales a cosas propiedad de terceros', 'Basica', 'A');
INSERT INTO `cobertura` VALUES ('0002', '0001', 'Daño a Personas', 'cubre las lesiones corporales o daños a personas como consecuencia de un accidente de tránsito.', 'Basica', 'A');
INSERT INTO `cobertura` VALUES ('0003', '0001', 'Defensa penal', 'Cubre los gastos de asistencia legal para gestionar la liberación del conductor y/o del vehículo, así como los correspondientes a su defensa penal, en caso de ocurrir un accidente de tránsito.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0004', '0001', 'Accidentes personales', 'Cubre la muerte accidental, invalidez, gastos médicos y de entierro para los ocupantes del vehículo hasta por la suma asegurada preestablecida, como consecuencia de un accidente de tránsito cubierto por la póliza.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0005', '0001', 'Exceso de límites', ' Cobertura complementaria de responsabilidad civil que ampara el excedente de los montos cubiertos por la póliza básica de daños a cosas y personas.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0006', '0002', 'Amplia', 'Ampara los daños materiales causados al vehículo como consecuencia de accidentes de tránsito o la pérdida total por robo y/o choque.', 'Basica', 'A');
INSERT INTO `cobertura` VALUES ('0007', '0002', 'Pérdida total', 'Ampara los daños materiales causados al vehículo, siem­pre que estos excedan del 75% del va­lor asegurado y/o la desaparición por robo o hurto del mismo.', 'Basica', 'A');
INSERT INTO `cobertura` VALUES ('0008', '0002', 'Riesgos catastróficos', 'Cobertura complementaria de casco, que ampara los daños causados al vehículo por eventos naturales como terremotos, maremotos, tsunamis, etc.; ideal para aquellas perso­nas que desean protección máxima.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0009', '0002', 'Indemnización diaria por pérdida total', 'Cobertura complementaria de casco, ideada para aminorar los gastos de movilización por la desaparición del auto debido a robo, hurto o pérdida total por choque del vehículo y se extiende hasta la reparación en caso de recuperación.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0010', '0002', 'Accesorios', 'Cobertura complementa­ria de casco, diseñada para amparar los daños, robo o hurto de los accesorios no originales hasta por la suma asegurada convenida.', 'Opcional', 'A');
INSERT INTO `cobertura` VALUES ('0011', '0002', 'Asistencia en viajes', ' Cubre entre otras cosas traslado del vehículo inmovi­lizado hasta el centro de reparación o do­micilio. Servicio de taxi para el conductor, reparación de averías menores y asesoría legal 24 horas 7 días a la semana.', 'Opcional', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `coberturaporpoliza`
-- 

CREATE TABLE `coberturaporpoliza` (
  `CoberturacodCobertura` varchar(4) collate utf8_spanish_ci NOT NULL,
  `PolizaDeSeguroCodPoliza` varchar(4) collate utf8_spanish_ci NOT NULL,
  `montoPrima` double NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`CoberturacodCobertura`,`PolizaDeSeguroCodPoliza`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `coberturaporpoliza`
-- 

INSERT INTO `coberturaporpoliza` VALUES ('0007', '0001', 3500, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0005', '0001', 2500, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0004', '0001', 2000, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0002', '0002', 1200, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0001', '0002', 600, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0009', '0002', 5400, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0006', '0002', 3600, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0004', '0002', 2400, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0003', '0002', 1800, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0001', '0001', 500, 'A');
INSERT INTO `coberturaporpoliza` VALUES ('0002', '0001', 1000, 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empresaafiliada`
-- 

CREATE TABLE `empresaafiliada` (
  `codEmpresa` varchar(4) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `rif` varchar(255) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nroCuenta` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codEmpresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `empresaafiliada`
-- 

INSERT INTO `empresaafiliada` VALUES ('0001', 12, 'Grúas los guaros', 'carrera 28 con calles 22-23', 'j-757575757', 'gruasguros@hotmail.com', '02516778899', '010934934343355534', 'A');
INSERT INTO `empresaafiliada` VALUES ('0002', 12, 'Taller los primos', 'carrera 20 con calles 10-11', 'j-765432122', 'losprimos@hotmail.com', '02516645533', '01054434444433232232', 'A');
INSERT INTO `empresaafiliada` VALUES ('0003', 1, 'Taller Anzoátegui ', 'Av-22 calles 16-17', 'J-3432232434', 'talleranzo@gmail.com', '024423425223', '010422232323223223', 'A');
INSERT INTO `empresaafiliada` VALUES ('0004', 12, 'Firma de abogados lara', 'carrera 18 con calles 10-11', 'j-7878455221', 'abogadoslara@gmail.com', '02514434545', '0105100220003348800', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estado`
-- 

CREATE TABLE `estado` (
  `codEstado` int(10) NOT NULL auto_increment,
  `estado` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codEstado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=25 ;

-- 
-- Volcar la base de datos para la tabla `estado`
-- 

INSERT INTO `estado` VALUES (1, 'Amazonas', 'A');
INSERT INTO `estado` VALUES (2, 'Anzoátegui', 'A');
INSERT INTO `estado` VALUES (3, 'Apure', 'A');
INSERT INTO `estado` VALUES (4, 'Aragua', 'A');
INSERT INTO `estado` VALUES (5, 'Barinas', 'A');
INSERT INTO `estado` VALUES (6, 'Bolívar', 'A');
INSERT INTO `estado` VALUES (7, 'Carabobo', 'A');
INSERT INTO `estado` VALUES (8, 'Cojedes', 'A');
INSERT INTO `estado` VALUES (9, 'Delta Amacuro', 'A');
INSERT INTO `estado` VALUES (10, 'Falcón', 'A');
INSERT INTO `estado` VALUES (11, 'Guárico', 'A');
INSERT INTO `estado` VALUES (12, 'Lara', 'A');
INSERT INTO `estado` VALUES (13, 'Mérida', 'A');
INSERT INTO `estado` VALUES (14, 'Miranda', 'A');
INSERT INTO `estado` VALUES (15, 'Monagas', 'A');
INSERT INTO `estado` VALUES (16, 'Nueva Esparta', 'A');
INSERT INTO `estado` VALUES (17, 'Portuguesa', 'A');
INSERT INTO `estado` VALUES (18, 'Sucre', 'A');
INSERT INTO `estado` VALUES (19, 'Táchira', 'A');
INSERT INTO `estado` VALUES (20, 'Trujillo', 'A');
INSERT INTO `estado` VALUES (21, 'Vargas', 'A');
INSERT INTO `estado` VALUES (22, 'Yaracuy', 'A');
INSERT INTO `estado` VALUES (23, 'Zulia', 'A');
INSERT INTO `estado` VALUES (24, 'Distrito Capital', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `factura`
-- 

CREATE TABLE `factura` (
  `codFactura` varchar(4) collate utf8_spanish_ci NOT NULL,
  `SiniestrocodSiniestro` int(10) NOT NULL,
  `EmpresaAfiliadacodEmpresa` varchar(4) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `monto` double NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codFactura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `factura`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `inspeccion`
-- 

CREATE TABLE `inspeccion` (
  `codInspeccion` varchar(4) collate utf8_spanish_ci NOT NULL,
  `SiniestrocodSiniestro` int(10) default NULL,
  `Vehiculoplaca` varchar(7) collate utf8_spanish_ci default NULL,
  `TipoInspeccioncodTipo` int(10) NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `Usuariocedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(255) collate utf8_spanish_ci NOT NULL,
  `evaluacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  `nombreArchivo` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codInspeccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `inspeccion`
-- 

INSERT INTO `inspeccion` VALUES ('0007', NULL, '2IQ-OQ9', 1, 14, '25570887', '2017-03-05', 'Calle 13', 'Óptimas condiciones', 'A', 'Inspeccion 2IQ-OQ9.xls');
INSERT INTO `inspeccion` VALUES ('0006', NULL, 'Q28-KKE', 1, 3, '25570887', '2017-03-05', 'Autoservicios rodispri', 'Bien', 'A', 'Inspeccion Q28-KKE.xls');
INSERT INTO `inspeccion` VALUES ('0005', NULL, 'AQW-21Q', 1, 11, '26141319', '2017-02-28', 'Sambil', 'Buenas condiciones', 'A', 'Inspeccion AQW-21Q.xls');
INSERT INTO `inspeccion` VALUES ('0004', NULL, 'OU2-A29', 1, 13, '26141319', '2017-03-05', 'Taller shaddai', 'Falta cambio de aceite.', 'A', 'Inspeccion OU2-A29.xls');
INSERT INTO `inspeccion` VALUES ('0003', NULL, 'KTR-2L1', 1, 12, '26141319', '2017-03-06', 'Estacionamiento', 'Perfecto estado.', 'A', 'Inspeccion KTR-2L1.xls');
INSERT INTO `inspeccion` VALUES ('0002', NULL, 'OPI-293', 1, 15, '26141319', '2017-02-28', 'Estacionamiento', 'Todo correcto. Necesita un poco de mantenimiento', 'A', 'Inspeccion OPI-293.xls');
INSERT INTO `inspeccion` VALUES ('0001', NULL, 'ART-123', 1, 12, '26141319', '2017-03-02', 'Taller el chunior', 'Todo correcto.', 'A', 'Inspeccion ART-123.xls');
INSERT INTO `inspeccion` VALUES ('0008', NULL, 'KKK-123', 1, 9, '25570887', '2017-02-26', 'Calle 15', 'Necesita cambio de llantas, todo lo demás OK.', 'A', 'Inspeccion KKK-123.xls');
INSERT INTO `inspeccion` VALUES ('0009', NULL, 'QUW-293', 1, 14, '25570887', '2017-03-06', 'Taller el chunior', 'Pésimas condiciones, fallo en el motor y suspensión.', 'A', 'Inspeccion QUW-293.xls');
INSERT INTO `inspeccion` VALUES ('0010', 5, 'Q28-KKE', 1, 18, '26141319', '2017-03-01', 'asd', 'asdasd', 'A', 'base de datos.sql');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `marca`
-- 

CREATE TABLE `marca` (
  `codMarca` varchar(4) collate utf8_spanish_ci NOT NULL,
  `nombreDeMarca` varchar(255) collate utf8_spanish_ci NOT NULL,
  `pais` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codMarca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `marca`
-- 

INSERT INTO `marca` VALUES ('0001', 'CHEVROLET', 'EEUU', 'A');
INSERT INTO `marca` VALUES ('0002', 'FORD', 'EEUU', 'A');
INSERT INTO `marca` VALUES ('0000', '...', 'no', 'A');
INSERT INTO `marca` VALUES ('0003', 'Hyundai', '', 'A');
INSERT INTO `marca` VALUES ('0004', 'Hummer', 'EEUU', 'A');
INSERT INTO `marca` VALUES ('0005', 'FIAT', 'Venezuela', 'A');
INSERT INTO `marca` VALUES ('0006', 'Chery', 'EEUU', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `modelo`
-- 

CREATE TABLE `modelo` (
  `codModelo` varchar(4) collate utf8_spanish_ci NOT NULL,
  `MarcaCodMarca` varchar(4) collate utf8_spanish_ci NOT NULL,
  `nombreModelo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `annoDelModelo` year(4) NOT NULL,
  `cotizacion` double NOT NULL,
  `tipo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codModelo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `modelo`
-- 

INSERT INTO `modelo` VALUES ('0001', '0001', 'SPARK', 2010, 3000000, 'SINCRONICO', 'A');
INSERT INTO `modelo` VALUES ('0002', '0001', 'OPTRA', 2011, 4500000, 'AUTOMATICO', 'A');
INSERT INTO `modelo` VALUES ('0003', '0002', 'FIESTA', 2010, 3500000, 'SINCRONICO', 'A');
INSERT INTO `modelo` VALUES ('0004', '0002', 'SUPER-DUTY', 2012, 7000000, 'SINCRONICO', 'A');
INSERT INTO `modelo` VALUES ('0000', '0000', '...', 2000, 0, '1', 'A');
INSERT INTO `modelo` VALUES ('0005', '0003', 'Excel', 2008, 4000000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0006', '0003', 'XG', 2008, 4500000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0007', '0004', 'H1', 2006, 50000000, 'Manual', 'A');
INSERT INTO `modelo` VALUES ('0008', '0004', 'H3', 2010, 60000000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0009', '0005', 'Palio', 2010, 1500000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0010', '0005', 'Ducato', 2013, 40000000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0011', '0006', 'Arauca', 2016, 50000000, 'Automático', 'A');
INSERT INTO `modelo` VALUES ('0012', '0006', 'Grand Tiger', 2015, 35000000, 'Manual', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `polizadeseguro`
-- 

CREATE TABLE `polizadeseguro` (
  `codPoliza` varchar(4) collate utf8_spanish_ci NOT NULL,
  `Vehiculoplaca` varchar(7) collate utf8_spanish_ci default NULL,
  `Tomadorcedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `TipoPolizacodTipo` int(10) NOT NULL,
  `SucursalcodSucursal` varchar(4) collate utf8_spanish_ci NOT NULL,
  `Usuariocedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `fechaEmision` date NOT NULL,
  `fechaCaducidad` date NOT NULL,
  `prima` double NOT NULL,
  `montoAsegurado` double NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codPoliza`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `polizadeseguro`
-- 

INSERT INTO `polizadeseguro` VALUES ('0001', 'Q28-KKE', '23746292', 1, '0001', '0000', '2017-03-08', '2018-03-08', 9500, 70000, 'C');
INSERT INTO `polizadeseguro` VALUES ('0002', NULL, '20123123', 2, '0002', '23833676', '2017-03-10', '2018-03-10', 15000, 60000, 'C');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `primaportipovehiculo`
-- 

CREATE TABLE `primaportipovehiculo` (
  `CoberturacodCobertura` varchar(4) collate utf8_spanish_ci NOT NULL,
  `TipoVehiculocodTipo` int(10) NOT NULL,
  `montoPrima` double NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`CoberturacodCobertura`,`TipoVehiculocodTipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `primaportipovehiculo`
-- 

INSERT INTO `primaportipovehiculo` VALUES ('0009', 8, 7200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 8, 6400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 8, 5600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 8, 4800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 8, 4000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 8, 3200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 8, 2400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 8, 1600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 8, 800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 7, 6300, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 7, 5600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 7, 4900, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 7, 4200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 7, 3500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 7, 2800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 7, 2100, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 7, 1400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 7, 700, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 6, 5400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 6, 4800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 6, 4200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 6, 3600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 6, 3000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 6, 2400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 6, 1800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 6, 1200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 6, 600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 5, 4500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 5, 4000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 5, 3500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 5, 3000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 5, 2500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 5, 2000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 5, 1500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 5, 1000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 5, 500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 4, 3600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 4, 3200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 4, 2800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 4, 2400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 4, 2000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 4, 1600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 4, 1200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 4, 800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 4, 400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 3, 2700, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 3, 2400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 3, 2100, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 3, 1800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 3, 1500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 3, 1200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 3, 900, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 3, 600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 3, 300, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 2, 1800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 2, 1600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 2, 1400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 2, 1200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 2, 1000, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 2, 800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 2, 600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 2, 400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 2, 200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0009', 1, 900, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0008', 1, 800, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0007', 1, 700, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0006', 1, 600, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0005', 1, 500, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0004', 1, 400, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0003', 1, 300, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0002', 1, 200, 'A');
INSERT INTO `primaportipovehiculo` VALUES ('0001', 1, 100, 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rol`
-- 

CREATE TABLE `rol` (
  `codRol` int(10) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `permisos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codRol`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `rol`
-- 

INSERT INTO `rol` VALUES (1, 'Analista', 'Gestionar clientes, gestionar pólizas, gestionar siniestros.', 'A');
INSERT INTO `rol` VALUES (2, 'Ajustador (perito)', 'Gestionar inspecciones, gestionar reportes de siniestro.', 'A');
INSERT INTO `rol` VALUES (3, 'Productor (corredor de seguro)', 'Usuario invitado (sin login)', 'A');
INSERT INTO `rol` VALUES (4, 'Administrador', 'Ver reportes, gestionar seguros, gestionar cotizaciones, gestionar coberturas, gestionar usuarios.', 'A');
INSERT INTO `rol` VALUES (5, 'Tomador', 'Usuario invitado (sin login)', 'A');
INSERT INTO `rol` VALUES (6, 'Asegurado', 'Usuario invitado (sin login)', 'A');
INSERT INTO `rol` VALUES (7, 'Tomador y asegurado', 'Usuario invitado (sin login)', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `seguro`
-- 

CREATE TABLE `seguro` (
  `codSeguro` varchar(4) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codSeguro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `seguro`
-- 

INSERT INTO `seguro` VALUES ('0001', 'Responsabilidad civil de vehículos', 'Ofrecemos la Póliza de Responsabilidad Civil de Vehículos que ampara los daños ocasionados por el vehículo del asegurado a terceros.', 'A');
INSERT INTO `seguro` VALUES ('0002', 'Casco Automóvil', 'Esta póliza brinda protección al casco de su vehículo en caso de daños o pérdida. Ofrecemos también coberturas opcionales que puede contratar para mayor protección de su automóvil.', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `servicio`
-- 

CREATE TABLE `servicio` (
  `EmpresaAfiliadacodEmpresa` varchar(4) collate utf8_spanish_ci NOT NULL,
  `TipoServiciocodTipoServicio` varchar(4) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`EmpresaAfiliadacodEmpresa`,`TipoServiciocodTipoServicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `servicio`
-- 

INSERT INTO `servicio` VALUES ('0001', '0001', 'A');
INSERT INTO `servicio` VALUES ('0002', '0002', 'A');
INSERT INTO `servicio` VALUES ('0002', '0004', 'A');
INSERT INTO `servicio` VALUES ('0003', '0002', 'A');
INSERT INTO `servicio` VALUES ('0004', '0003', 'A');
INSERT INTO `servicio` VALUES ('0004', '0005', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `siniestro`
-- 

CREATE TABLE `siniestro` (
  `codSiniestro` int(10) NOT NULL auto_increment,
  `TipoSiniestrocodTipoSiniestro` int(10) NOT NULL,
  `Vehiculoplaca` varchar(7) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `fechaSiniestro` date NOT NULL,
  `fechaReporte` date NOT NULL,
  `fechaDecision` date NOT NULL,
  `montoReserva` double NOT NULL,
  `montoAprobado` double NOT NULL,
  `montoTotalSiniestro` double NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nombreArchivo` varchar(255) collate utf8_spanish_ci default NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codSiniestro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `siniestro`
-- 

INSERT INTO `siniestro` VALUES (5, 6, 'Q28-KKE', 14, '2017-03-08', '2017-03-08', '0000-00-00', 0, 0, 0, 'sadasd', NULL, 'P');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `sucursal`
-- 

CREATE TABLE `sucursal` (
  `codSucursal` varchar(4) collate utf8_spanish_ci NOT NULL,
  `AseguradoracodAseguradora` varchar(10) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) collate utf8_spanish_ci NOT NULL,
  `e-mail` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codSucursal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `sucursal`
-- 

INSERT INTO `sucursal` VALUES ('0001', '0001', 12, 'Sucursal1', 'Av 1 calle 15', '04163993827', 'sucursal1@hotmail.com', 'A');
INSERT INTO `sucursal` VALUES ('0002', '0001', 12, 'Sucursal2', 'Av rotaria calle 6', '025122223', 'eleste@hotmail.com', 'A');
INSERT INTO `sucursal` VALUES ('0003', '0001', 1, 'sucursal3', 'av 8 calle 12', '0244332331', 'sucursal3@hotmail.com', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipoinspeccion`
-- 

CREATE TABLE `tipoinspeccion` (
  `codTipo` int(10) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `tipoinspeccion`
-- 

INSERT INTO `tipoinspeccion` VALUES (1, 'Inspección de riesgo', 'Inspección que se realiza al solicitar un seguro', 'A');
INSERT INTO `tipoinspeccion` VALUES (2, 'Inspección de siniestro', 'Inspección al momento de un siniestro', 'A');
INSERT INTO `tipoinspeccion` VALUES (3, 'Inspección postreparación', 'Inspección luego de la reparación del vehículo siniestrado', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipopoliza`
-- 

CREATE TABLE `tipopoliza` (
  `codTipo` int(10) NOT NULL auto_increment,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tipopoliza`
-- 

INSERT INTO `tipopoliza` VALUES (1, 'Cuando la póliza es de un sólo vehículo.', 'Particular', 'A');
INSERT INTO `tipopoliza` VALUES (2, 'Cuando la póliza es para una flota de vehículos, el tomador paga la prima y a cada vehículo se le da un certificado de seguro.', 'Flota', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tiposervicio`
-- 

CREATE TABLE `tiposervicio` (
  `codTipoServicio` varchar(10) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codTipoServicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `tiposervicio`
-- 

INSERT INTO `tiposervicio` VALUES ('0001', 'Grua', 'servicio especial de grúas para auxilio vial ', 'A');
INSERT INTO `tiposervicio` VALUES ('0002', 'Latoneria y pintura', 'servicio de latoneria  y pintura para cubrir daños', 'A');
INSERT INTO `tiposervicio` VALUES ('0003', 'Asesoría Legal', 'servicios especiales de abogados', 'A');
INSERT INTO `tiposervicio` VALUES ('0004', 'Reparación de motor', 'reparacion de motores en caso de daños del mismo al vehiculo', 'A');
INSERT INTO `tiposervicio` VALUES ('0005', 'Defensa penal', 'defensa legal en caso de siniestros que impliquen daño de bienes a terceros', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tiposiniestro`
-- 

CREATE TABLE `tiposiniestro` (
  `codTipoSiniestro` int(10) NOT NULL auto_increment,
  `tipo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codTipoSiniestro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `tiposiniestro`
-- 

INSERT INTO `tiposiniestro` VALUES (1, 'Robo del vehículo', 'Cuando se despoja al asegurado del vehículo mediante sucesos violentos.', 'A');
INSERT INTO `tiposiniestro` VALUES (2, 'Robo de accesorios', 'Cuando se despoja al asegurado de accesorios del vehículo mediante sucesos violentos.', 'A');
INSERT INTO `tiposiniestro` VALUES (3, 'Choque a cosas', 'Cuando el vehículo choca a otros objetos (carros, casas, postes, etc)', 'A');
INSERT INTO `tiposiniestro` VALUES (4, 'Choque a personas', 'Cuando el vehículo choca a otras personas.', 'A');
INSERT INTO `tiposiniestro` VALUES (5, 'Incendio', 'Cuando el vehículo sufre un incendio', 'A');
INSERT INTO `tiposiniestro` VALUES (6, 'Daños menores', 'Daños como rayones, vidrios rotos, retrovisores dañados, etc.', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipovehiculo`
-- 

CREATE TABLE `tipovehiculo` (
  `codTipo` int(10) NOT NULL auto_increment,
  `nombreTipo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL default 'A',
  PRIMARY KEY  (`codTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `tipovehiculo`
-- 

INSERT INTO `tipovehiculo` VALUES (1, 'Automóvil', 'A');
INSERT INTO `tipovehiculo` VALUES (2, 'Autobús', 'A');
INSERT INTO `tipovehiculo` VALUES (3, 'Microbús', 'A');
INSERT INTO `tipovehiculo` VALUES (4, 'Pick up', 'A');
INSERT INTO `tipovehiculo` VALUES (5, 'Remolques', 'A');
INSERT INTO `tipovehiculo` VALUES (6, 'Camioneta', 'A');
INSERT INTO `tipovehiculo` VALUES (7, 'Chuto', 'A');
INSERT INTO `tipovehiculo` VALUES (8, 'Furgoneta', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `cedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `AseguradoracodAseguradora` varchar(4) collate utf8_spanish_ci NOT NULL,
  `RolcodRol` int(10) NOT NULL,
  `user` varchar(255) collate utf8_spanish_ci NOT NULL,
  `pass` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(255) collate utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fechaIngreso` date NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES ('26141319', 10, '0001', 2, 'jorge', '1234', 'Jorge', 'Chiquín', '1995-08-23', 'jorgechiquinv@hotmail.com', '2131241', '2017-02-03', 'A');
INSERT INTO `usuario` VALUES ('0000', 0, '', 3, '', '', 'Sin corredor', '', '0000-00-00', '', '', '0000-00-00', 'A');
INSERT INTO `usuario` VALUES ('23833676', 2, '0001', 3, 'corredor', '1234', 'Jonathan', 'Falcón', '1995-02-05', 'jonatha@hotmail.com', '04162736271', '2016-12-05', 'A');
INSERT INTO `usuario` VALUES ('25638459', 14, '0001', 1, 'ysidro', '1234', 'Ysidro', 'Fernandez', '1995-12-30', 'ysidro@hotmail.com', '04249487362', '2017-02-05', 'A');
INSERT INTO `usuario` VALUES ('25570887', 8, '0001', 2, 'maria', '1234', 'Maria', 'Cuicas', '1995-04-06', 'mariacuicas@hotmail.com', '04163564543', '2017-03-06', 'A');
INSERT INTO `usuario` VALUES ('24145115', 12, '0001', 4, 'admin', '1234', 'Jonathan', 'Falcon', '1995-09-08', 'elunicco.falcon@gmail.com', '098765435', '2017-03-05', 'A');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vehiculo`
-- 

CREATE TABLE `vehiculo` (
  `placa` varchar(7) collate utf8_spanish_ci NOT NULL,
  `ModelocodModelo` varchar(4) collate utf8_spanish_ci NOT NULL,
  `Aseguradocedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `EstadocodEstado` int(10) NOT NULL,
  `TipoVehiculoCodTipo` int(10) NOT NULL,
  `color` varchar(255) collate utf8_spanish_ci NOT NULL,
  `serial` varchar(255) collate utf8_spanish_ci NOT NULL,
  `kilometraje` double NOT NULL,
  `estatus` char(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`placa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `vehiculo`
-- 

INSERT INTO `vehiculo` VALUES ('ART-123', '0004', '20300400', 16, 7, 'Verde', '12837281', 20, 'A');
INSERT INTO `vehiculo` VALUES ('OPI-293', '0002', '20300400', 24, 2, 'Amarrillo', '283672981', 250, 'I');
INSERT INTO `vehiculo` VALUES ('KTR-2L1', '0002', '20123123', 1, 4, 'Negro', '2173822jsd82j123', 230, 'A');
INSERT INTO `vehiculo` VALUES ('OU2-A29', '0003', '26141319', 19, 5, 'Naranja', '392992882', 200, 'I');
INSERT INTO `vehiculo` VALUES ('AQW-21Q', '0003', '26141319', 3, 4, 'Negro con azul', '42323u23j2', 100, 'I');
INSERT INTO `vehiculo` VALUES ('Q28-KKE', '0003', '26141319', 15, 7, 'Naranja', '29382iwi38273', 60, 'A');
INSERT INTO `vehiculo` VALUES ('2IQ-OQ9', '0003', '20300400', 23, 8, 'Gris', '212321i23u2332', 30, 'I');
INSERT INTO `vehiculo` VALUES ('KKK-123', '0008', '23746292', 13, 1, 'Naranja', '32y3298e23', 150, 'A');
INSERT INTO `vehiculo` VALUES ('QUW-293', '0003', '20123123', 10, 4, 'Verde con blanco', 'fwer2323e3ewe', 200, 'P');
