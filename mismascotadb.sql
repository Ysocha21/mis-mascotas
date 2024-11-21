-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-11-2024 a las 20:54:32
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mismascotadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Alimento', 'Productos de alimento para mascotas'),
(2, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(3, 'Alimento', 'Productos de alimento para mascotas'),
(4, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(5, 'Alimento', 'Productos de alimento para mascotas'),
(6, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(7, 'Alimento', 'Productos de alimento para mascotas'),
(8, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(9, 'Alimento', 'Productos de alimento para mascotas'),
(10, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(11, 'Alimento', 'Productos de alimento para mascotas'),
(12, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(13, 'Alimento', 'Productos de alimento para mascotas'),
(14, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(15, 'Alimento', 'Productos de alimento para mascotas'),
(16, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(17, 'Alimento', 'Productos de alimento para mascotas'),
(18, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(19, 'Alimento', 'Productos de alimento para mascotas'),
(20, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(21, 'Alimento', 'Productos de alimento para mascotas'),
(22, 'Juguetes', 'Juguetes para el entretenimiento de mascotas'),
(23, 'Alimentos', 'Productos de alimento para mascotas'),
(24, 'Juguetes', 'Juguetes y entretenimiento para mascotas'),
(25, 'Alimentos', 'Productos de alimento para mascotas'),
(26, 'Juguetes', 'Juguetes y entretenimiento para mascotas'),
(27, 'Alimentos', 'Productos de alimento para mascotas'),
(28, 'Juguetes', 'Juguetes y entretenimiento para mascotas'),
(29, 'Alimentos', 'Productos de alimento para mascotas'),
(30, 'Juguetes', 'Juguetes y entretenimiento para mascotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id_cita` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `mascota_id` int DEFAULT NULL,
  `veterinario_id` int DEFAULT NULL,
  `servicio_id` int DEFAULT NULL,
  `estado` enum('programada','completada','cancelada') COLLATE utf8mb4_general_ci DEFAULT 'programada',
  PRIMARY KEY (`id_cita`),
  KEY `mascota_id` (`mascota_id`),
  KEY `veterinario_id` (`veterinario_id`),
  KEY `servicio_id` (`servicio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha`, `hora`, `mascota_id`, `veterinario_id`, `servicio_id`, `estado`) VALUES
(1, '2024-10-15', '10:00:00', 1, 1, 1, 'programada'),
(2, '2024-10-16', '14:00:00', 2, 2, 2, 'programada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dni` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `dni`, `correo`, `telefono`, `direccion`) VALUES
(1, 'Carlos', 'Gómez', '12345678', 'carlosgomez@mail.com', '3112345678', 'Calle Luna 89'),
(2, 'Ana', 'López', '87654321', 'analopez@mail.com', '3009876543', 'Av. Sol 456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int NOT NULL AUTO_INCREMENT,
  `proveedor_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `proveedor_id`, `fecha`, `total`) VALUES
(1, 1, '2024-09-01', 150000.00),
(2, 2, '2024-09-15', 80000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_clinico`
--

DROP TABLE IF EXISTS `historial_clinico`;
CREATE TABLE IF NOT EXISTS `historial_clinico` (
  `id_historial` int NOT NULL AUTO_INCREMENT,
  `mascota_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `tratamiento` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_historial`),
  KEY `mascota_id` (`mascota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_clinico`
--

INSERT INTO `historial_clinico` (`id_historial`, `mascota_id`, `fecha`, `descripcion`, `tratamiento`) VALUES
(1, 1, '2024-10-15', 'Revisión general; se encuentra en buen estado de salud.', 'No requiere tratamiento'),
(2, 2, '2024-10-16', 'Aplicación de vacunas. Buen estado general.', 'Vacuna antirrábica aplicada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE IF NOT EXISTS `mascotas` (
  `id_mascota` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_mascota_id` int NOT NULL,
  `raza_mascota_id` int DEFAULT NULL,
  `cliente_id` int DEFAULT NULL,
  `sexo` enum('macho','hembra') COLLATE utf8mb4_general_ci NOT NULL,
  `edad` int DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `tamano` enum('pequeño','mediano','grande') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'mediano',
  `descripcion` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_mascota`),
  KEY `tipo_mascota_id` (`tipo_mascota_id`),
  KEY `raza_mascota_id` (`raza_mascota_id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `nombre`, `tipo_mascota_id`, `raza_mascota_id`, `cliente_id`, `sexo`, `edad`, `peso`, `tamano`, `descripcion`) VALUES
(1, 'Max', 1, 1, 1, 'macho', 3, 25.00, 'grande', 'Perro amigable y juguetón'),
(2, 'Luna', 2, 3, 2, 'hembra', 2, 10.00, 'mediano', 'Gata activa y curiosa'),
(3, 'Max', 1, 1, 1, 'macho', 3, 25.00, 'grande', 'Perro amigable y juguetón'),
(4, 'Luna', 2, 3, 2, 'hembra', 2, 10.00, 'mediano', 'Gata activa y curiosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `categoria_id` int DEFAULT NULL,
  `proveedor_id` int DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `medida` enum('pequeño','mediano','grande') COLLATE utf8mb4_general_ci DEFAULT 'mediano',
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `categoria_id` (`categoria_id`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `categoria_id`, `proveedor_id`, `precio_compra`, `precio_venta`, `medida`, `imagen`) VALUES
(1, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(2, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(3, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(4, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(5, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(6, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(7, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(8, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(9, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(10, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(11, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(12, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(13, 'Alimento para perros', 'Alimento balanceado para perros adultos.', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(14, 'Juguete para gatos', 'Juguete de goma para entretener a los gatos.', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(15, 'Alimento para perros', 'Alimento balanceado para perros adultos', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(16, 'Juguete de goma para gatos', 'Juguete interactivo de goma', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(17, 'Alimento para perros', 'Alimento balanceado para perros adultos', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(18, 'Juguete de goma para gatos', 'Juguete interactivo de goma', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg'),
(19, 'Alimento para perros', 'Alimento balanceado para perros adultos', 1, 1, 15000.00, 20000.00, 'mediano', 'alimento_perros.jpg'),
(20, 'Juguete de goma para gatos', 'Juguete interactivo de goma', 2, 2, 5000.00, 8000.00, 'pequeño', 'juguete_gatos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

DROP TABLE IF EXISTS `productos_comprados`;
CREATE TABLE IF NOT EXISTS `productos_comprados` (
  `id_pcompra` int NOT NULL AUTO_INCREMENT,
  `compra_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_pcompra`),
  KEY `compra_id` (`compra_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id_pcompra`, `compra_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 1, 10, 15000.00),
(2, 2, 2, 5, 5000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

DROP TABLE IF EXISTS `productos_vendidos`;
CREATE TABLE IF NOT EXISTS `productos_vendidos` (
  `id_pventa` int NOT NULL AUTO_INCREMENT,
  `venta_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_pventa`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id_pventa`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 1, 2, 20000.00),
(2, 2, 2, 1, 8000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ruc` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`),
  UNIQUE KEY `ruc` (`ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `ruc`, `pais`, `correo`, `telefono`, `direccion`) VALUES
(1, 'Proveedor A', '800123456', 'Colombia', 'contacto@proveedora.com', '3001234567', 'Av. Siempre Viva 123'),
(2, 'Proveedor B', '800987654', 'México', 'contacto@proveedorb.com', '3007654321', 'Calle Falsa 456'),
(11, 'Proveedor Alimentos', '800123456-1', 'Colombia', 'contacto@proveedora.com', '3001234567', 'Av. Siempre Viva 123'),
(12, 'Proveedor Juguetes', '800987654-2', 'México', 'contacto@proveedorb.com', '3007654321', 'Calle Falsa 456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza_mascota`
--

DROP TABLE IF EXISTS `raza_mascota`;
CREATE TABLE IF NOT EXISTS `raza_mascota` (
  `id_raza` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_mascota_id` int DEFAULT NULL,
  PRIMARY KEY (`id_raza`),
  KEY `tipo_mascota_id` (`tipo_mascota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `raza_mascota`
--

INSERT INTO `raza_mascota` (`id_raza`, `nombre`, `tipo_mascota_id`) VALUES
(1, 'Golden Retriever', 1),
(2, 'Bulldog', 1),
(3, 'Persa', 2),
(4, 'Siamesa', 2),
(5, 'Golden Retriever', 1),
(6, 'Bulldog', 1),
(7, 'Persa', 2),
(8, 'Siamesa', 2),
(9, 'Golden Retriever', 1),
(10, 'Bulldog', 1),
(11, 'Persa', 2),
(12, 'Siamesa', 2),
(13, 'Golden Retriever', 1),
(14, 'Bulldog', 1),
(15, 'Persa', 2),
(16, 'Siamesa', 2),
(17, 'Golden Retriever', 1),
(18, 'Bulldog', 1),
(19, 'Persa', 2),
(20, 'Siamesa', 2),
(21, 'Golden Retriever', 1),
(22, 'Bulldog', 1),
(23, 'Persa', 2),
(24, 'Siamesa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Consulta general', 'Revisión general del estado de salud', 30000.00),
(2, 'Vacunación', 'Aplicación de vacunas necesarias', 50000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mascota`
--

DROP TABLE IF EXISTS `tipo_mascota`;
CREATE TABLE IF NOT EXISTS `tipo_mascota` (
  `id_tipom` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_tipom`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`id_tipom`, `nombre`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Perro'),
(4, 'Gato'),
(5, 'Perro'),
(6, 'Gato'),
(7, 'Perro'),
(8, 'Gato'),
(9, 'Perro'),
(10, 'Gato'),
(11, 'Perro'),
(12, 'Gato'),
(13, 'Perro'),
(14, 'Gato'),
(15, 'Perro'),
(16, 'Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cargo` enum('administrador','veterinario') COLLATE utf8mb4_general_ci DEFAULT 'veterinario',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre`, `correo`, `password`, `cargo`) VALUES
(1, 'Admin Principal', 'admin@mail.com', 'admin123', 'administrador'),
(2, 'Veterinario Laura', 'veterinario1@mail.com', 'vet123', 'veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cliente_id`, `fecha`, `total`) VALUES
(1, 1, '2024-09-20', 40000.00),
(2, 2, '2024-09-25', 8000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarios`
--

DROP TABLE IF EXISTS `veterinarios`;
CREATE TABLE IF NOT EXISTS `veterinarios` (
  `id_vet` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_vet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `veterinarios`
--

INSERT INTO `veterinarios` (`id_vet`, `nombre`, `especialidad`, `telefono`, `correo`, `direccion`) VALUES
(1, 'Dr. Juan', 'Consulta general', '3005551234', 'juan.martinez@mail.com', 'Calle Principal 123'),
(2, 'Dra. Laura', 'Vacunación', '3015559876', 'laura.garcia@mail.com', 'Av. Central 456');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`mascota_id`) REFERENCES `mascotas` (`id_mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`veterinario_id`) REFERENCES `veterinarios` (`id_vet`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id_servicio`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  ADD CONSTRAINT `historial_clinico_ibfk_1` FOREIGN KEY (`mascota_id`) REFERENCES `mascotas` (`id_mascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`tipo_mascota_id`) REFERENCES `tipo_mascota` (`id_tipom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`raza_mascota_id`) REFERENCES `raza_mascota` (`id_raza`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_comprados_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `raza_mascota`
--
ALTER TABLE `raza_mascota`
  ADD CONSTRAINT `raza_mascota_ibfk_1` FOREIGN KEY (`tipo_mascota_id`) REFERENCES `tipo_mascota` (`id_tipom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
