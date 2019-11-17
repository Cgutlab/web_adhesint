-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-02-2019 a las 10:01:14
-- Versión del servidor: 10.2.21-MariaDB-cll-lve
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `osolelar_adhesint`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_categorias`
--

CREATE TABLE `aplicacion_categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aplicacion_categorias`
--

INSERT INTO `aplicacion_categorias` (`id`, `imagen`, `titulo`, `orden`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Packaging', 'ac', '2019-01-21 21:55:03', '2019-02-05 16:46:16'),
(2, NULL, 'Automotor', 'aa', '2019-02-05 16:45:23', '2019-02-05 16:45:23'),
(3, NULL, 'Conversión de Papel', 'ab', '2019-02-05 16:45:42', '2019-02-05 16:45:42'),
(4, NULL, 'Otras aplicaciones', 'az', '2019-02-05 16:45:56', '2019-02-05 16:45:56'),
(5, NULL, 'Tabaco', 'ad', '2019-02-05 16:46:24', '2019-02-05 16:46:24'),
(6, NULL, 'Colchones', 'ae', '2019-02-05 16:46:43', '2019-02-13 23:03:43'),
(7, NULL, 'Línea Blanca', 'af', '2019-02-05 16:47:46', '2019-02-05 16:47:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_productos`
--

CREATE TABLE `aplicacion_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aplicacion_productos`
--

INSERT INTO `aplicacion_productos` (`id`, `imagen`, `titulo`, `texto`, `orden`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'gallery_aplicacion__imagen cajas corrugado.jpg', 'Cerrado de cajas y estuches', '<p>Nuestra l&iacute;nea de soluciones de adhesivos para cerrado de cajas y estuches se desempe&ntilde;a bien a trav&eacute;s de sustratos variados y temperaturas de servicio, en una variedad de mercados, incluyendo:<br />\r\n&middot; Alimentos secos y cereales<br />\r\n&middot; Alimentos congelados y supercongelados<br />\r\n&middot; Cervezas, licores, agua y otras bebidas<br />\r\n&middot; Productos l&aacute;cteos y otros alimentos refrigerados</p>', 'AA', 1, '2019-01-21 22:35:06', '2019-02-14 15:53:08'),
(2, 'gallery_aplicacion__aplicacion_Etiquetado-de-envases-plasticos-y-vidrio.jpg', 'Etiquetado de envases plásticos y vidrio', '<p>Nuestra l&iacute;nea de adhesivos para etiquetado de envases pl&aacute;sticos y vidrio, presenta una gama muy variada de soluciones adhesivas, adapt&aacute;ndose a las mejoras tecnol&oacute;gicas en m&aacute;quinas de alta velocidad Ya sea de tecnolog&iacute;a de fusi&oacute;n en caliente o a base de agua, con un rendimiento excelente en una amplia gama de condiciones ambientales, en una variedad de mercados, incluyendo:<br />\r\n&bull; Cervezas, licores, vinos, sidras, gaseosas, aguas minerales y otras bebidas<br />\r\n&bull; Aceites ,vinagres, salsas y otros productos alimenticios<br />\r\n&bull; Detergentes, limpiadores y otros productos de limpieza</p>', 'bb', 1, '2019-01-21 22:40:14', '2019-02-05 20:35:04'),
(3, 'gallery_aplicacion__aplicacion_filtro_automotor.jpg', 'Filtros', '<p>Nuestra l&iacute;nea de adhesivos&nbsp;presenta una&nbsp;soluci&oacute;n vers&aacute;til para los mercados de:<br />\r\n&bull; Filtros de Aire<br />\r\n&bull; Filtros de Habit&aacute;culo</p>', 'aa', 2, '2019-02-05 16:54:29', '2019-02-05 16:54:29'),
(8, 'gallery_aplicacion__aplicacion_encuadernacion.jpg', 'Artes Gráficas y Encuadernación', '<p>Nuestros adhesivos para artes gr&aacute;ficas y encuadernaci&oacute;n son para:<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Libros de tapa dura<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Libros de tapa blanda<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Cat&aacute;logos de tapa blanda<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Cuadernos y Bibloratos<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Formularios Continuos<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Sobres y Bolsas<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Estuches con o sin ventana<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Resmas de papel</p>', 'aa', 3, '2019-02-05 20:34:27', '2019-02-05 20:34:27'),
(19, 'gallery_aplicacion__aplicacion_tabaco.jpg', 'Cigarrillos', '<p>&bull;&nbsp;&nbsp; &nbsp;Costura Lateral<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Tipping<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Armado de Filtros<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Armado de marquillas<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Armado de paquetes</p>', 'aa', 5, '2019-02-05 22:51:22', '2019-02-05 22:51:22'),
(20, 'gallery_aplicacion__aplicacion_manualidad.jpg', 'Artesanías y Manualidades', '<p>Contamos con&nbsp;adhesivos de la m&aacute;s alta calidad para&nbsp;mercados como</p>\r\n\r\n<p>&bull;&nbsp;&nbsp; &nbsp;Porcelana Fr&iacute;a<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Adhesivo Escolar</p>', 'aa', 4, '2019-02-05 22:51:29', '2019-02-05 22:51:29'),
(21, 'gallery_aplicacion__aplicacion_colchones.jpg', 'Colchones', '<p>Nuestros adhesivos en este rubro se aplican en:<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Montaje de Espuma de Poliuretano<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Armado de Resortes Pocket</p>', 'aa', 6, '2019-02-06 17:12:27', '2019-02-06 17:12:27'),
(22, 'gallery_aplicacion__aplicaciones_linea-blanca.jpg', 'Heladeras y Freezer', '<p>Utilizados en el mercado&nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Sellado de Gabinetes&nbsp;</p>', 'aa', 7, '2019-02-06 17:14:35', '2019-02-06 17:14:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_productos_pivo`
--

CREATE TABLE `aplicacion_productos_pivo` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product_producto` int(10) UNSIGNED DEFAULT NULL,
  `id_aplicacion_producto` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aplicacion_productos_pivo`
--

INSERT INTO `aplicacion_productos_pivo` (`id`, `id_product_producto`, `id_aplicacion_producto`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(13, 4, 21, NULL, NULL),
(14, 4, 22, NULL, NULL),
(15, 4, 3, NULL, NULL),
(16, 4, 8, NULL, NULL),
(17, 11, 8, NULL, NULL),
(18, 6, 8, NULL, NULL),
(19, 10, 8, NULL, NULL),
(20, 4, 2, NULL, NULL),
(21, 4, 19, NULL, NULL),
(22, 11, 19, NULL, NULL),
(23, 5, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `imagen`, `titulo1`, `titulo2`, `caption1`, `caption2`, `texto`, `item1`, `item2`, `item3`, `seccion`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'banners__home.jpg', 'Póngase en contacto con un especialista', NULL, '###', NULL, '<p>&iquest;En qu&eacute; podemos ayudarte? Nuestro equipo se comunicar&aacute; para una atenci&oacute;n personalizada.</p>', NULL, NULL, NULL, 'home', 'AA', '2019-01-18 15:57:44', '2019-02-13 22:35:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `imagen`, `titulo1`, `titulo2`, `caption1`, `caption2`, `text1`, `text2`, `seccion`, `orden`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Adhesint distribuidor oficial de HB Fuller', NULL, NULL, NULL, '<p>Tenemos el producto adecuado para su necesidad. Nuestro amplio cat&aacute;logo abastece los requerimientos de un mercado exigente en constante crecimiento y avance tecnol&oacute;gico.</p>', NULL, 'home', '', '2019-01-18 14:52:02', '2019-02-13 15:48:33'),
(2, 'contenidos__destacado.png', 'Ofrecemos calidad en soluciones adhesivas', NULL, NULL, NULL, NULL, NULL, 'home', 'AA', '2019-01-18 15:16:33', '2019-02-13 22:49:08'),
(3, 'contenidos__icono1.png', 'Calidad', NULL, NULL, NULL, NULL, NULL, 'home', 'BB', '2019-01-18 15:18:27', '2019-02-05 16:02:40'),
(4, 'contenidos__icono2.png', 'Asesoramiento Técnico', NULL, NULL, NULL, NULL, NULL, 'home', 'CC', '2019-01-18 15:18:30', '2019-02-05 16:02:53'),
(5, 'contenidos__icono3.png', 'Productos Certificados', NULL, NULL, NULL, NULL, NULL, 'home', 'DD', '2019-01-18 15:18:33', '2019-02-05 16:02:56'),
(6, 'contenidos__img_1.jpg', NULL, NULL, NULL, NULL, '<p><span style=\"color:#3498db\">Adhesint S.R.L. </span>fue fundada en Buenos Aires en 1989, para proveer adhesivos al mercado industrial.</p>\r\n\r\n<p>En 1996, se lleva a cabo un acuerdo con la firma HB Fuller para realizar la distribuci&oacute;n de sus productos Hot Melt y PVA.&nbsp;</p>\r\n\r\n<p>En el transcurso de los a&ntilde;os, a la actualidad, la empresa fue ampliando sus instalaciones, acompa&ntilde;ando el crecimiento obtenido.&nbsp;</p>\r\n\r\n<p><strong><span style=\"color:#3498db\">Somos especialistas en adhesivos de tipo industrial</span></strong>. Contamos con <strong>30 a&ntilde;os de experiencia</strong> y trayectoria.</p>', NULL, 'empresa', 'AA', '2019-01-18 17:04:07', '2019-02-13 15:52:14'),
(7, NULL, 'Acepto los términos y condiciones de privacidad', NULL, NULL, NULL, '<p>T&eacute;rminos y condiciones de privacidad</p>', NULL, 'condiciones', NULL, '2019-01-22 15:40:25', '2019-01-22 15:40:25'),
(8, NULL, NULL, NULL, NULL, NULL, '<p>&middot; Especificaci&oacute;n t&eacute;cnica</p>\r\n\r\n<p>&middot; Aplicador que use</p>\r\n\r\n<p>&middot; Cualquier documento o imagen orientativa que considere de utilidad</p>', NULL, 'presupuesto', NULL, '2019-01-22 15:42:56', '2019-01-22 15:42:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `type`, `text`, `created_at`, `updated_at`) VALUES
(2, 'correo', 'jsraino@adhesint.com', NULL, '2019-01-22 21:12:02'),
(3, 'telefono', '(54-11) 4482-5480 / 2062 / 5447', NULL, '2019-01-22 16:06:02'),
(4, 'direccion', 'Inclán 3059, San Justo,  Prov. de Buenos Aires', NULL, '2019-02-13 15:35:53'),
(5, 'mapa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.639426117231!2d-58.5530747845895!3d-34.68904876952541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc8a10fbb95db%3A0xf5e5df2435b3eeb8!2sIncl%C3%A1n+3059%2C+B1754GIW+San+Justo%2C+Buenos+Aires!5e0!3m2!1ses!2sar!4v1548163241837', NULL, '2019-01-22 16:21:29'),
(6, 'telefono2', '(54-11) 4441-7774', NULL, '2019-01-22 16:06:02'),
(7, 'whatsapp', '011 15-6868-8262', NULL, '2019-02-13 22:49:44'),
(8, 'mensaje-presupuesto', '· Especificación técnica<br>\r\n· Aplicador que use<br>\r\n· Cualquier documento o imagen orientativa que considere de utilidad', NULL, '2019-01-22 16:06:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iconos`
--

CREATE TABLE `iconos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logos`
--

INSERT INTO `logos` (`id`, `imagen`, `type`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'logos__favi.jpg', 'favicon', 'favicon', NULL, '2019-01-28 21:36:47'),
(2, 'logos__carga logo.jpg', 'header', 'header', NULL, '2019-02-05 15:55:41'),
(3, 'logos__adhesint logo footer.png', 'footer', 'footer', NULL, '2019-02-05 16:17:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_home` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `imagen`, `visible_home`, `titulo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'marcas__1.jpg', '1', 'H.B. Fuller.', 'AA', '2019-01-18 22:37:12', '2019-01-18 22:39:43'),
(2, 'marcas__22.jpg', '1', 'Advantra', 'BB', '2019-01-21 18:14:45', '2019-01-21 18:14:45'),
(3, 'marcas__333.jpg', '1', 'Adecol', 'CC', '2019-01-21 18:15:00', '2019-01-21 18:15:00'),
(4, 'marcas__adhesint logo footer.png', '0', 'Adhesint', 'cc', '2019-02-06 17:33:36', '2019-02-06 17:33:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadata`
--

CREATE TABLE `metadata` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metadata`
--

INSERT INTO `metadata` (`id`, `seccion`, `keyword`, `orden`, `text`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 'home', 'home', NULL, NULL),
(2, 'empresa', 'empresa', 'empresa', 'empresa', NULL, NULL),
(3, 'productos', 'productos', 'productos', 'productos', NULL, NULL),
(4, 'aplicaciones', 'aplicaciones', 'aplicaciones', 'aplicaciones', NULL, NULL),
(5, 'presupuesto', 'presupuesto', 'presupuesto', 'presupuesto', NULL, NULL),
(6, 'contacto', 'contacto', 'contacto', 'contacto', NULL, NULL),
(7, 'buscador', 'buscador', 'buscador', 'buscador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_07_121840_create_users_table', 1),
(2, '2019_01_07_123241_create_contents_table', 1),
(3, '2019_01_07_123314_create_sliders_table', 1),
(4, '2019_01_07_123434_create_banners_table', 1),
(5, '2019_01_07_123434_create_marcas_table', 1),
(6, '2019_01_07_123434_create_presentaciones_table', 1),
(7, '2019_01_07_124050_create_data_table', 1),
(8, '2019_01_07_124100_create_metadata_table', 1),
(9, '2019_01_07_132813_create_logos_table', 1),
(10, '2019_01_08_154719_create_destacados_table', 1),
(11, '2019_01_16_133048_create_product_categorias_table', 1),
(12, '2019_01_16_133106_create_product_productos_table', 1),
(13, '2019_01_16_133159_create_aplicacion_categorias_table', 1),
(14, '2019_01_16_133221_create_aplicacion_productos_table', 1),
(15, '2019_01_16_181858_create_iconos_table', 1),
(16, '2019_01_17_170934_create_textos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `ico` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `presentaciones`
--

INSERT INTO `presentaciones` (`id`, `ico`, `imagen`, `titulo`, `peso`, `orden`, `created_at`, `updated_at`) VALUES
(1, NULL, 'presentacion__1.jpg', 'Cajas', '12 kg.', 'AA', '2019-01-21 18:20:22', '2019-01-21 18:22:10'),
(2, NULL, 'presentacion__2.jpg', 'Bolsas', '25 kg.', 'bb', '2019-01-21 18:20:35', '2019-02-06 16:14:38'),
(3, NULL, 'presentacion__presentacion_1.jpg', 'Cajas', '15 kg.', 'ab', '2019-02-06 15:43:28', '2019-02-06 15:43:28'),
(4, NULL, 'presentacion__presentacion_barril metalico.jpg', 'Barril Metálico', '17,68 Kg.', 'cc', '2019-02-06 16:14:21', '2019-02-06 16:14:44'),
(5, NULL, 'presentacion__presentacion_barril papel.jpg', 'Barril Papel', '2 Kg. - 20 Kg.', 'dd', '2019-02-06 16:17:52', '2019-02-06 16:17:52'),
(6, NULL, 'presentacion__presentacion_bidones.jpg', 'Bidones', '20 Kg.', 'ee', '2019-02-06 16:21:45', '2019-02-06 16:21:45'),
(7, NULL, 'presentacion__presentacion_barril metalico.jpg', 'Tambores', '200 Kg.', 'ff', '2019-02-06 16:22:30', '2019-02-06 16:22:30'),
(8, NULL, 'presentacion__presentacion_contenedor.jpg', 'Contenedores', '1000 Kg.', 'gg', '2019-02-06 16:36:15', '2019-02-06 16:36:15'),
(9, NULL, 'presentacion__presentacion_1.jpg', 'Cajas', '25 Kg.', 'ac', '2019-02-06 16:36:48', '2019-02-06 16:36:48'),
(10, NULL, 'presentacion__presentacion_bolsas.jpg', 'Bolsas', '20 Kg.', 'bc', '2019-02-06 16:38:02', '2019-02-06 16:38:02'),
(11, NULL, 'presentacion__presentacion_bidones.jpg', 'Bidones', '18 Kg.', 'ef', '2019-02-06 16:38:37', '2019-02-06 16:38:37'),
(12, NULL, 'presentacion__presentacion_1.jpg', 'Cajas', '20 Kg.', 'ad', '2019-02-06 17:21:35', '2019-02-06 17:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categorias`
--

CREATE TABLE `product_categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_home` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_categorias`
--

INSERT INTO `product_categorias` (`id`, `imagen`, `titulo`, `orden`, `visible_home`, `created_at`, `updated_at`) VALUES
(1, 'gallery_productos__categoria-01.jpg', 'Adhesivos Vinílicos', 'aa', '1', '2019-01-17 22:46:54', '2019-02-13 22:01:58'),
(2, 'gallery_productos__categoria-02.jpg', 'Adhesivos Hot Melts', 'BB', '1', '2019-01-24 16:41:13', '2019-02-13 22:02:02'),
(3, 'gallery_productos__categoria-03_b.jpg', 'Adhesivos Naturales', 'CC', '1', '2019-01-24 16:41:21', '2019-02-13 22:32:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_productos`
--

CREATE TABLE `product_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ficha` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_productos`
--

INSERT INTO `product_productos` (`id`, `imagen`, `titulo`, `texto`, `caption`, `ficha`, `keywords`, `orden`, `id_categoria`, `created_at`, `updated_at`) VALUES
(3, 'gallery_productos__Locote.jpg', 'Hot Melt Base Metaloceno', '<p>Los adhesivos de fusi&oacute;n en caliente para empaque a base de metaloceno ofrecen lo &uacute;ltimo en rendimiento del mercado, son <span style=\"color:#3498db\">adhesivos Premium</span>, muy confiables que aseguran un pegado superior, maquinado limpio.<br />\r\nPosee una <span style=\"color:#3498db\">gran estabilidad t&eacute;rmica y soporta temperaturas extremadamente bajas</span>. Tambi&eacute;n reduce el mantenimiento, la reparaci&oacute;n y sustituci&oacute;n de piezas.<br />\r\nLa tecnolog&iacute;a de pol&iacute;meros de metaloceno reduce un 30% la aplicaci&oacute;n con respecto a los EVA tradicionales.&nbsp;</p>', '<p>Alta flexibilidad</p>\r\n\r\n<p>Altas y Bajas temperaturas</p>\r\n\r\n<p>Excelente estabilidad t&eacute;rmica</p>\r\n\r\n<p>Alto tack en caliente</p>\r\n\r\n<p>Buena resistencia a bajas temperaturas</p>\r\n\r\n<p>R&aacute;pida velocidad de secado</p>', 'gallery_productos__i1.jpg', 'Producto', 'AA', 2, '2019-01-21 20:36:57', '2019-02-13 15:45:02'),
(4, 'gallery_productos__hotmelt_base_eva.jpg', 'Hot Melt Base EVA', '<p>Ofrecemos una gama completa de <span style=\"color:#3498db\">adhesivos de fusi&oacute;n en caliente a base de EVA</span>.<br />\r\nPara ser utilizados en la fabricaci&oacute;n de una amplia variedad de productos.<br />\r\nContamos con varias presentaciones como pellets, pillows y esferas.</p>', '<p>S&oacute;lidos a temperatura ambiente</p>\r\n\r\n<p>Resistente bajo o alta temperatura</p>\r\n\r\n<p>Alta adhesividad y fuerza cohesiva en superficies dif&iacute;ciles</p>', NULL, 'hot melt, hot melt base eva, eva, adhesint', 'aa', 2, '2019-01-24 17:44:20', '2019-02-06 15:40:05'),
(5, 'gallery_productos__hotmelt_base_psa.jpg', 'Adhesivos Hot melt Base PSA', '<p>Ofrecemos una gama completa de adhesivos termopl&aacute;sticos sensibles a la presi&oacute;n que permiten la <span style=\"color:#3498db\">uni&oacute;n de sustratos dif&iacute;ciles</span> para diversas aplicaciones.<br />\r\nContamos con la <span style=\"color:#3498db\">presentaci&oacute;n en Pillows</span>, &uacute;nica en el mercado que garantiza una fusi&oacute;n m&aacute;s r&aacute;pida y adecuada para utilizar en los equipos fundidores.</p>', NULL, NULL, 'Adhesivos Hot melt Base PSA, hot melt, psa, base psa,', 'ab', 2, '2019-02-06 15:47:31', '2019-02-06 15:47:31'),
(6, 'gallery_productos__adhesivos-pur.jpg', 'Adhesivos PUR', '<p>Los adhesivos reactivos PUR <span style=\"color:#3498db\">combinan las ventajas</span> de procesamiento de una fusi&oacute;n en caliente con el rendimiento de uso final de un poliuretano. Estos adhesivos confieren con &eacute;xito una <span style=\"color:#3498db\">excelente adhesi&oacute;n de los sustratos</span> y una <span style=\"color:#3498db\">estabilidad en el uso </span>que mejora la eficiencia en las l&iacute;neas de producci&oacute;n.<br />\r\nEstos productos poseen una gran resistencia a las altas y bajas temperaturas, manteniendo una excelente flexibilidad.<br />\r\nLa l&iacute;nea Pur que ofrecemos para Encuadernacion ha sido desarrollada para la aplicaci&oacute;n con Pico, Boquilla, o Rodillo.</p>', '<p>Altas y Bajas temperaturas</p>\r\n\r\n<p>Excelente&nbsp;flexibilidad</p>\r\n\r\n<p>Excelente adhesi&oacute;n de los sustratos</p>\r\n\r\n<p>Gran estabilidad en el uso</p>', NULL, 'Adhesivos PUR, pur, adhesint, adhesivos', 'ac', 2, '2019-02-06 15:57:13', '2019-02-06 16:48:49'),
(10, 'gallery_productos__cola-animal.jpg', 'Cola Animal', '<p><span style=\"color:#3498db\">Producto natural</span>, fabricado a base de Prote&iacute;nas animales, con una temperatura de aplicaci&oacute;n entre 50&deg; y 70&deg;C.<br />\r\nDespu&eacute;s de aplicado, se solidifica a temperatura ambiente, formando as&iacute; una <span style=\"color:#3498db\">pel&iacute;cula flexible de alta adhesi&oacute;n</span>.</p>', '<p>Temperatura de aplicaci&oacute;n entre 50&ordm; y 70&ordm;</p>', NULL, 'cola animal, adhesivos, adhesivo natural, adhesivo animal', 'ae', 3, '2019-02-06 17:21:55', '2019-02-13 15:47:44'),
(11, 'gallery_productos__cola-pva.jpg', 'PVA', '<p>La l&iacute;nea de adhesivos vin&iacute;licos a base de PVA (dispersi&oacute;n acuosa de acetato de vinilo) que tenemos es muy amplia, <span style=\"color:#3498db\">son adhesivos blancos, sin olor, libres de solventes</span>.<br />\r\nOfrecemos en toda su l&iacute;nea vin&iacute;lica - Homopolimera &ndash; Copolimera y Etilenica.<br />\r\nSon Adhesivos formulados para diferentes aplicaciones en maquina: (Picos HHS &ndash; Inyectores &ndash; Picos convencionales &ndash; Rodillo - Rueda) como tambi&eacute;n para pegados manuales.</p>', '<p>Adhesivos Blancos</p>\r\n\r\n<p>Sin olor</p>\r\n\r\n<p>Libres de solventes</p>', NULL, 'hb fuller, adhesint, adhesivo vinílico a base de pva, pva, adhesivo vinílico, vinílico', 'aa', 1, '2019-02-06 17:30:54', '2019-02-06 17:30:54'),
(12, 'gallery_productos__hotmel-en-barra.jpg', 'HotMelt en Barra', '<p>El adhesivo hot melt en Barra es un <span style=\"color:#3498db\">adhesivo muy vers&aacute;til</span>, tanto para pegados manuales como para l&iacute;neas de producci&oacute;n y terminaci&oacute;n que pueden ser utilizados en <span style=\"color:#3498db\">diversos mercados</span>.<br />\r\nContamos con varias caracter&iacute;sticas que se amoldan a la necesidad del pegado.&nbsp;</p>', '<p>Di&aacute;metro 11 mm / 12 mm</p>\r\n\r\n<p>Colores: Transparente y &aacute;mbar claro</p>\r\n\r\n<p>Alta versatilidad</p>\r\n\r\n<p>Diversos mercados</p>', NULL, 'hotmelt en barra, barra, adhesivo en barras, adecol, adhesint,', 'af', 2, '2019-02-06 17:42:06', '2019-02-13 15:45:36'),
(13, 'gallery_productos__limpiadores.jpg', 'Limpiadores', '<p>Contamos con dos tipos de limpiadores para coleros:<br />\r\n<span style=\"color:#3498db\">Coleros de Hot melt,</span> mezcla de aceites org&aacute;nicos para retirar las impurezas en fundidor y manguera.<br />\r\n<span style=\"color:#3498db\">Coleros PUR,</span> producto a base de poli&eacute;ster color azul (para poder distinguirlo del producto incoloro) es utilizable en fundidores y mangueras.<br />\r\nExcelentes productos de limpieza que deben ser utilizados seg&uacute;n los procedimientos informados en las fichas t&eacute;cnicas y de seguridad.</p>', '<p>Limpiadores para coleros</p>', NULL, 'limpiadores, limpieza, limpiadores para coleros, coleros hot melt, coleros PUR,', 'ah', 2, '2019-02-06 17:58:52', '2019-02-13 15:46:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_productos_marcas`
--

CREATE TABLE `product_productos_marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED DEFAULT NULL,
  `id_marca` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_productos_marcas`
--

INSERT INTO `product_productos_marcas` (`id`, `id_producto`, `id_marca`, `created_at`, `updated_at`) VALUES
(3, 3, 3, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 4, 1, NULL, NULL),
(7, 4, 3, NULL, NULL),
(8, 5, 1, NULL, NULL),
(9, 5, 3, NULL, NULL),
(11, 6, 3, NULL, NULL),
(12, 10, 1, NULL, NULL),
(13, 10, 3, NULL, NULL),
(14, 11, 1, NULL, NULL),
(15, 11, 4, NULL, NULL),
(16, 12, 3, NULL, NULL),
(17, 13, 1, NULL, NULL),
(18, 13, 4, NULL, NULL),
(19, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_productos_present`
--

CREATE TABLE `product_productos_present` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED DEFAULT NULL,
  `id_presentacion` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_productos_present`
--

INSERT INTO `product_productos_present` (`id`, `id_producto`, `id_presentacion`, `created_at`, `updated_at`) VALUES
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 5, 3, NULL, NULL),
(8, 6, 4, NULL, NULL),
(9, 6, 5, NULL, NULL),
(10, 10, 12, NULL, NULL),
(11, 11, 6, NULL, NULL),
(12, 11, 7, NULL, NULL),
(13, 11, 8, NULL, NULL),
(14, 12, 9, NULL, NULL),
(15, 13, 10, NULL, NULL),
(16, 13, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `imagen`, `titulo`, `subtitulo`, `seccion`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'sliders__slider.jpg', '<p>Tecnolog&iacute;a Avanzada en<br />\r\nAdhesivos Industriales&nbsp;</p>', '<p>Con 30 a&ntilde;os de trayectoria en el rubro, somos<br />\r\nespecialistas en Adhesivos de tipo Industrial</p>', 'home', 'AA', '2019-01-18 14:47:55', '2019-02-13 22:01:29'),
(2, 'sliders__portada-empresa.jpg', '<p>EMPRESA</p>', NULL, 'empresa', 'AA', '2019-01-18 16:59:29', '2019-02-13 22:50:34'),
(3, 'sliders__solicitar.jpg', NULL, NULL, 'presupuesto', 'AA', '2019-01-22 15:45:40', '2019-02-13 23:00:45'),
(4, 'sliders__portada-02.jpg', '<p>PRODUCTOS</p>', NULL, 'productos', 'AA', '2019-01-24 16:16:16', '2019-02-13 22:54:07'),
(5, 'sliders__portada-03-b.jpg', '<p>APLICACIONES</p>', NULL, 'aplicaciones', 'aa', '2019-02-05 16:11:42', '2019-02-13 22:59:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `firstname`, `lastname`, `address`, `email`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'carlos', '$2y$10$JV2pnYu44XP6XgEJMc4do.apsPebY/oGGRHpM6QNI6kIy4rAuFVFy', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-17 20:20:13', '2019-01-17 20:20:13'),
(2, 'pablo', '$2y$10$U3.9o1ZY/taWf0lhh9dBgOTrtVi0AUIrYSk7vdGpjM1782UKEmrd6', 'pablo', 'pablo', 'pablo', 'pablo', 'pablo', 'PxgVLEzdyajQc6RJtpAVaPXqtqUDQ0f1JEQOCsbYREULUxJ7zdhPE6YCOn48', '2019-01-28 21:35:01', '2019-01-28 21:35:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicacion_categorias`
--
ALTER TABLE `aplicacion_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aplicacion_productos`
--
ALTER TABLE `aplicacion_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplicacion_productos_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `aplicacion_productos_pivo`
--
ALTER TABLE `aplicacion_productos_pivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplicacion_productos_pivo_id_product_producto_foreign` (`id_product_producto`),
  ADD KEY `aplicacion_productos_pivo_id_aplicacion_producto_foreign` (`id_aplicacion_producto`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iconos`
--
ALTER TABLE `iconos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_categorias`
--
ALTER TABLE `product_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_productos`
--
ALTER TABLE `product_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_productos_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `product_productos_marcas`
--
ALTER TABLE `product_productos_marcas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_productos_marcas_id_producto_foreign` (`id_producto`),
  ADD KEY `product_productos_marcas_id_marca_foreign` (`id_marca`);

--
-- Indices de la tabla `product_productos_present`
--
ALTER TABLE `product_productos_present`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_productos_present_id_producto_foreign` (`id_producto`),
  ADD KEY `product_productos_present_id_presentacion_foreign` (`id_presentacion`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicacion_categorias`
--
ALTER TABLE `aplicacion_categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `aplicacion_productos`
--
ALTER TABLE `aplicacion_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `aplicacion_productos_pivo`
--
ALTER TABLE `aplicacion_productos_pivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iconos`
--
ALTER TABLE `iconos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `product_categorias`
--
ALTER TABLE `product_categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product_productos`
--
ALTER TABLE `product_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `product_productos_marcas`
--
ALTER TABLE `product_productos_marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `product_productos_present`
--
ALTER TABLE `product_productos_present`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicacion_productos`
--
ALTER TABLE `aplicacion_productos`
  ADD CONSTRAINT `aplicacion_productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `aplicacion_categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `aplicacion_productos_pivo`
--
ALTER TABLE `aplicacion_productos_pivo`
  ADD CONSTRAINT `aplicacion_productos_pivo_id_aplicacion_producto_foreign` FOREIGN KEY (`id_aplicacion_producto`) REFERENCES `aplicacion_productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aplicacion_productos_pivo_id_product_producto_foreign` FOREIGN KEY (`id_product_producto`) REFERENCES `product_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_productos`
--
ALTER TABLE `product_productos`
  ADD CONSTRAINT `product_productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `product_categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_productos_marcas`
--
ALTER TABLE `product_productos_marcas`
  ADD CONSTRAINT `product_productos_marcas_id_marca_foreign` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_productos_marcas_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `product_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_productos_present`
--
ALTER TABLE `product_productos_present`
  ADD CONSTRAINT `product_productos_present_id_presentacion_foreign` FOREIGN KEY (`id_presentacion`) REFERENCES `presentaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_productos_present_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `product_productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
