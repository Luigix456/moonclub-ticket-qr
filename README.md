# MOONCLUB

MOONCLUB es una plataforma digital diseñada para que los RRPP (Relaciones Públicas) de una discoteca gestionen la venta de entradas en formato QR. Los usuarios pueden registrarse, iniciar sesión y vender entradas de manera eficiente. Los administradores tienen acceso a estadísticas como la cantidad de entradas vendidas y el dinero recaudado. Una característica clave es la generación de códigos QR que se envían tanto al cliente como al RRPP, y se invalidan una vez escaneados en el evento.

## **Tecnologías Utilizadas**

- **Lenguaje de Programación**:
  - PHP: Para la lógica del servidor y la interacción con la base de datos.

- **Base de Datos**:
  - MySQL: Para el almacenamiento y gestión de datos.

- **Frontend**:
  - HTML/CSS: Para la estructura y el estilo de las páginas web.

- **Servidor Web**:
  - Apache: Servidor web para manejar las solicitudes HTTP.

- **Gestión de Dependencias**:
  - Composer: Para gestionar las dependencias de PHP como PHPMailer y QRCode.

- **Generación de Códigos QR**:
  - chillerlan/php-qrcode: Biblioteca de PHP para la generación de códigos QR.

- **Envío de Correos Electrónicos**:
  - PHPMailer: Biblioteca de PHP para el envío de correos electrónicos.


## **Características Principales**

- **Inicio de Sesión y Registro**: Autenticación de usuarios.
- **Panel de Administración**: Estadísticas y gestión de RRPP y entradas.
- **Generación de Códigos QR**: Creación y envío de códigos QR únicos.
- **Escaneo y Validación de Entradas**: Invalida los QR una vez escaneados para evitar reutilización.

