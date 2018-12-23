-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-06-2018 a las 02:55:21
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finalweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) NOT NULL,
  `Contra` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Id`, `Usuario`, `Contra`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` text NOT NULL,
  `Nombre` text NOT NULL,
  `Precio` double NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `SubTotal` double NOT NULL,
  `NumeroVenta` int(11) NOT NULL,
  `Entrega` varchar(30) NOT NULL,
  `Accion` varchar(50) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9;

--
-- Volcado de datos para la tabla `compras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text CHARACTER SET latin1 NOT NULL,
  `Descripcion` text CHARACTER SET latin1 NOT NULL,
  `Imagen` text CHARACTER SET latin1 NOT NULL,
  `Precio` double NOT NULL,
  `Categoria` text CHARACTER SET latin1 NOT NULL,
  `FechaReg` date NOT NULL,
  `Agotado` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT 'No',
  `Especial` varchar(5) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Off',
  `Descuento` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=22  ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Descripcion`, `Imagen`, `Precio`, `Categoria`, `FechaReg`, `Agotado`, `Especial`, `Descuento`) VALUES
(1, 'IPHONE 6S PLUS 32GB Gray', 'SMARTPHONE APPLE IPHONE 6S PLUS 32GB SPACE GRAY (MN2V2LZ/A) :\nModelo : iPhone 6S Plus\nPantalla : Retina HD con 3D Touch de 5.5 pulgadas (diagonal) retroiluminada por LED.\nProcesador : Dual-core 1.84 GHz Twister.\nSistema operativo : IOS 10.2\nA prueba de salpicaduras y derrames : Si\nBanda : LTE\nSistema Operativo : iOs\nProcesador : A9\nAlmacenamiento Interno : 32GB\nAlmacenamiento Externo : No\nMemoria Ram : 2 GB\nCamara : 12 MP\nCamara Frontal : 5 MP\nConectividad : Wi-Fi / Bluetooth 4.2\nTamaño de Pantalla : 5.5\"\nResolucion de Pantalla : 1920 x 1080 pixeles\nFormato : Ligtning\nIncluye : Auriculares EarPods, Cable lightning a USB y Adap corriente USB 5W', 'iphone6.jpg', 36058.44, 'Apple', '2018-05-26', 'No', 'On', 0.7),
(2, 'IPHONE 8 64GB Grey', 'SMARTPHONE APPLE IPHONE 8 4.7" 64GB GREY (MQ6G2LZ/A) :
Capacidad : 64GB
Pantalla Retina HD : Pantalla widescreen LCD Multi-Touch de 4.7 pulgadas (diagonal) con tecnología IPS,
Resolución : 1334 x 750 pixeles a 326 ppi
Relación de contraste : 1400
Resistente a las salpicaduras, al agua y al polvo : Clasificación IP67 según la norma IEC 60529
Chip : Chip A11 Bionic con arquitectura de 64 bits,
Procesador neural y Coprocesador de movimiento : M11 integrado
Camara Frontal : 7 MP
Cámara : 12 MP
Gran angular : apertura de ƒ/1.8
Zoom Digital : hasta 5x
Cámara FaceTime HD : 7MP
Grabación de Video : 4K a 24 cps, 30 cps o 60 cps
Memoria Ram : 2 GB
Conectividad : 802.11 b/g/n Bluetooth
Sistema operativo : iOS 11
Tarjeta SIM : Nano SIM
Audífonos : EarPods con conector Lightning', 'iphone8.jpg', 46840.1, 'Apple', '2018-05-27', 'No', 'On', 0.1),
(3, 'IPHONE 8 64GB Gold', 'SMARTPHONE APPLE IPHONE 8 4.7" 64GB SILVER(MQ6H2LZ/A) :
Capacidad : 64GB
Pantalla Retina HD : Pantalla widescreen LCD Multi-Touch de 4.7 pulgadas (diagonal) con tecnología IPS,
Resolución : 1334 x 750 pixeles a 326 ppi
Relación de contraste : 1400
Resistente a las salpicaduras, al agua y al polvo : Clasificación IP67 según la norma IEC 60529
Chip : Chip A11 Bionic con arquitectura de 64 bits,
Procesador neural y Coprocesador de movimiento : M11 integrado
Camara Frontal : 7 MP
Cámara : 12 MP
Gran angular : apertura de ƒ/1.8
Zoom Digital : hasta 5x
Cámara FaceTime HD : 7MP
Grabación de Video : 4K a 24 cps, 30 cps o 60 cps
Memoria Ram : 2 GB
Conectividad : 802.11 b/g/n Bluetooth
Sistema operativo : iOS 11
Tarjeta SIM : Nano SIM
Audífonos : EarPods con conector Lightning', 'iphone8rose.jpg', 46840.1, 'Apple', '2018-05-27', 'No', 'On', 0),
(4, 'IPHONE 8 64GB Silver', 'SMARTPHONE APPLE IPHONE 8 4.7" 64GB SILVER(MQ6H2LZ/A) :
Capacidad : 64GB
Pantalla Retina HD : Pantalla widescreen LCD Multi-Touch de 4.7 pulgadas (diagonal) con tecnología IPS,
Resolución : 1334 x 750 pixeles a 326 ppi
Relación de contraste : 1400
Resistente a las salpicaduras, al agua y al polvo : Clasificación IP67 según la norma IEC 60529
Chip : Chip A11 Bionic con arquitectura de 64 bits,
Procesador neural y Coprocesador de movimiento : M11 integrado
Camara Frontal : 7 MP
Cámara : 12 MP
Gran angular : apertura de ƒ/1.8
Zoom Digital : hasta 5x
Cámara FaceTime HD : 7MP
Grabación de Video : 4K a 24 cps, 30 cps o 60 cps
Memoria Ram : 2 GB
Conectividad : 802.11 b/g/n Bluetooth
Sistema operativo : iOS 11
Tarjeta SIM : Nano SIM
Audífonos : EarPods con conector Lightning', 'iphone8silver.jpg', 46840.1, 'Apple', '2018-05-27', 'No', 'Off', 0),
(5, 'iPHONE SE 16GB Gray ', 'Este producto ha sido probado y certificado, con el mínimo de señales de desgaste por un vendedor especializado de terceros aprobado por Amazon. Los accesorios podrían ser genéricos y no directamente del fabricante.
Los teléfonos iPhones desbloqueado de fábrica son compatibles con proveedores de servicio GSM como AT&T y T-Mobile así como otras redes GSM en todo el mundo, etc. No son compatibles con portadores CDMA, como Verizon y Sprint. El teléfono requiere una tarjeta Nano SIM (no está incluida en el paquete).
Pantalla Retina de 4 pulgadas (diagonal), multitáctil, de led retro iluminado, con cámara iSight de 12 megapíxeles con 1.22 pixeles; apertura de f/2.2; filtro de infrarrojos híbrido; panorama (hasta 63 megapíxeles).
Sensor de huellas dactilares integrada en el botón de inicio; chip A9 con ingeniería de 64bits; coprocesador de movimiento empotrado de M9.
Cámara HD FaceTime: fotos de 1.2 megapíxeles; apertura f/2.4; mapeo de tono local mejorado; Retina Flash; tiempo de conversación: hasta 14 horas en 3G.
Grabación de vídeo 4K (3840 por 2160) a 30fps; soporte Slomo para video 1080p a 120fps y 720p a 240fps; se puede tomar fotografías de 8 megapíxeles mientras haces una grabación de vídeo de 4K.
Este producto reacondicionado y certificado está probado y certificado para verse y no funcionar como nuevo, con limitado a desgaste. El proceso incluye pruebas de funcionalidad, inspección, y reembalaje. - El producto trae un cargador y cable, pero no incluye auriculares ni manual ni tarjeta SIM. -
La unidad se presenta en caja embalada con certificado y cargador de pared.
Pantalla Retina de 4 pulgadas (diagonal), táctil.
Grabación de vídeo de 4K (3840 por 2160) a 30fps; soporte Slomo para video 1080p a 120fps y 720p a 240fps; se puede tomar fotografías de 8 megapíxeles mientras se realiza una grabación de vídeo de 4K.', 'iphonese.jpg', 7595.99, 'Apple', '2018-05-27', 'No', 'Off', 0),
(6, 'Samsung Galaxy S9', 'Pantalla Infinity: abre tu vista con esta gran pantalla de borde a borde que se adapta cómodamente a tu mano.
Se curva hacia los lados para una vista que parece ilimitada con mínimas distracciones visuales.
Super cámara lenta: la cámara que ralentiza el tiempo, haciendo que los momentos cotidianos sean épicos. Super Slow-mo le permite ver las cosas que podría haber perdido en un abrir y cerrar de ojos. Configura el video en música o conviértalo en un GIF en bucle y compártelo con un toque. Luego siéntese y observe cómo entran las reacciones.
Apertura dual: captura imágenes sorprendentes con luz diurna brillante y luz muy baja.
Resolución de la cámara - frontal: 8 MP AF, trasero: 12 MP OIS AF; Memoria: memoria interna 64 GB, RAM 6GB.
Funcionando en Android 8.0, AR Emoji, Motion photo, los planes se venden por separado.
', 's9.jpg', 39200.5, 'Samsung', '2018-05-27', 'No', 'Off', 0),
(7, 'Funda para iPhone 6 JETech Apple iPhone 6/6S funda, absorción de golpes, bumper y anti-arañazos, parte posterior transparente para iPhone 6S iPhone 6 4.7 pulgadas, HD Transparente', 'Diseñado para Apple iPhone 6S (modelo 2015) y iPhone 6 (modelo 2014) 5.5 pulgadas
Hecho con PC y TPU fusión para ofrecer protección completa a todo el dispositivo
Protección integral para tu dispositivo con un diseño delgado; avanzada tecnología de absorción de choque: aire amortiguado en 4 esquinas
Acceso a todos los controles y características; recortes perfectos para los altavoces, cámara y otros puertos.', 'Protector.jpg', 343, 'Accesorios', '2018-05-27', 'No', 'Off', 0),
(8, '[3-Pack] Protector de visualización de vidrio templado Mr Shield para iPhone 6/iPhone 6s', 'Protector de visualización de vidrio templado. Incluye 3 piezas. Compatible con iPhone 6/iPhone 6S
De arañazos a gotas de alto impacto, estás protegido con el vidrio claro de balística Mr Shield HD
Vidrio templado de corte láser preciso con bordes pulidos y redondeados. Claridad 99.99% HD y precisión de visualización táctil
-
Por favor note: las pantallas iPhone 6/iPhone 6S tiene bordes curvos que nuestros protectores de visualización no cubren al 100%, ya que con el tiempo se pelan causando al cliente frustración. Hemos diseñado nuestros protectores de visualización por lo que tendrás máxima cobertura en tu dispositivo con facilidad de instalación y durabilidad. Para más protección completa, recomendamos combinar el protector de visualización de tu elección con un iPhone 6/iPhone 6S', 'gorilas.jpg', 294, 'Accesorios', '2018-05-27', 'No', 'Off', 0),
(9, 'Huawei P20', 'Tamaño de la visualización: 5.8 inches; FHD + 1080 x 2244 píxeles; ppi
4 GB de RAM + ROM de 128 GB 
Huawei Kirin 970 CPU octa-core + i7 co-procesador, 4 × Cortex A73 2,36 GHz + 4 x Cortex A53 1.8 GHz
Cámara trasera: 12 MP (color, apertura de f/1.8) + 20mp (monocromo, apertura f/1.6), es compatible con enfoque automático (fase de láser, profundo Focus, Focus, contraste)
cámara frontal: 24 MP, F/2.0 de apertura, es compatible con distancia focal fija
El polvo y resistente al agua Apoyo (IP53) Nota: el dispositivo ha sido probado en un entorno controlado y certificado para ser resistente al polvo, agua y salpicaduras en situaciones (cumple con los requisitos específicos de clasificación IP53 como se describe por la norma internacional IEC 60529).
Sensor de gravedad, sensor de luz ambiental, sensor de proximidad frontal sensor de huellas dactilares hall-sensor giroscopio brújula color sensor de temperatura Rango de sensor del láser', '232758_473053_huaweip20.jpg', 29399.51, 'Otros', '2018-05-06', 'No', 'Off', 0),
(10, 'Huawei P20 Pro', '4 G FDD-LTE, TD-LTE: B1/B2/B3/B4/B5/B6/B7/B8/B9/B12/B17/B18/B19/B20/B26/B28/3 G WCDMA: B1/B3/B4/B5 B32/B34/B38/B39/B40/B6/B8/B19
Sólo g/m2. No funcionará con CDMA portadores
Kirin 970 con npu integrada, visualización OLED, 2240 x 1080px
Batería de 4000 mAh, 128 GB de ROM, 6 GB de RAM
Leica triple (40mp cámara trasera, 24 MP cámara frontal)', '528992_861389_pro.jpg', 46501, 'Otros', '2018-05-06', 'No', 'Off', 0),
(11, 'Huawei P20 Lite', 'HSDPA 850/900/1900/2100
LTE de banda 2/4/5/7/12/17/28 – híbrido de doble SIM (Nano-SIM, doble en espera)
32 GB, Memoria RAM de 4 GB – Ranura para microSD, hasta 128 GB (utiliza SIM 2 ranura)
Android 8.0 (Oreo) – Octa-Core
Cámara principal: Dual: 16 MP f/2.2, 1.0 μm () + 2 MP, cámara secundaria: 16 MP f/2.0, 1.12 μm (), 1080p, video: 1080p @ 30 fps – Huella (parte trasera)
5.84 inches 1080 x 2280 pixeles (~ 432 ppi densidad) LTPS LCD IPS visualización táctil capacitiva, 52.5 foot colores no desmontable Li-Po batería de 3000 mAh
teléfono celular desbloqueado son compatibles con la mayoría de las compañías GSM como AT & T y T-Mobile, pero no son compatibles con portadores CDMA como Verizon y Sprint.', '943084_486908_lite.jpg', 14552.51, 'Otros', '2018-05-06', 'No', 'Off', 0),
(12, 'ALCATEL OneTouch Idol 3', 'El IDOL 3 viene integrada con LTE es de hasta 2 x más rápido que el estándar 4 G LTE velocidades de datos. cuando usando los datos en su teléfono, si quieres transmitir música, o descargar un show, o incluso ver una actualización de tiempo... no se preocupe, nuestro IDOL 3 le cubre con LTE.
Fiel a la vida de la música con JBL audio con galardonado frontales JBL audio, IDOL 3 ofrece una increíble experiencia musical on-the-go. con dos altavoces estéreo, la IDOL 3 paquetes de calidad de audio profesional para un sonido.
Idol 3 ha sido especialmente diseñado para líder color y tecnología de innovación a través de Technicolor mejora del color de imagen, dando la IDOL 3 una experiencia de color Vivid cinematográfica. obtener una visión clara de sus fotos y vídeos desde cualquier ángulo, incluso en luz directa del sol
Idol 3 viene equipado con un gran angular de 8 MP cámara frontal y 13 MP cámara principal que se despierta incluso el más apasionados photophilic con una aplicación de cámara con todas las funciones, incluyendo, Time-lapse, HDR, panorámica y modo manual
Equipado con un procesador Octa-Core Qualcomm Snapdragon 615, la IDOL 3 ofrece conectividad ultrarrápida 4 G LTE perderse en increíbles vídeos HD y juegos console-quality, fabricado con los más realista con sonido envolvente 5.1.', '504211_alcatelone.jpg', 5577.67, 'Otros', '2018-05-06', 'No', 'Off', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Cedula` varchar(30) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contra` varchar(50) NOT NULL,
  `FechaReg` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `Cedula`, `Ciudad`, `Email`, `Contra`, `FechaReg`) VALUES
(1, 'Luis', 'Martinez', '456123', 'Santiago', 'LUIS@PRUEBA.COM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-06-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
