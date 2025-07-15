# Galleta de la Fortuna – Examen Final Producción Web

## Descripción
Aplicación web desarrollada en PHP (estructura tipo Laravel, pero lógica principal en PHP procedural y PDO) que simula el juego de la galleta de la fortuna. Los usuarios pueden registrarse, iniciar sesión y recibir frases aleatorias. Los administradores pueden gestionar (agregar) nuevas frases.

## Requisitos Técnicos
- **Backend:** PHP (estructura inspirada en Laravel, pero lógica principal en PHP procedural y PDO)
- **Frontend:** HTML, CSS, AngularJS (usado para mostrar frases sin recargar la página)
- **Base de datos:** MySQL (estructura y datos de prueba en `database/dbb.sql`)
- **Persistencia:** Exclusivamente con PDO y consultas preparadas
- **Separación de capas:** Modelo, Vista y Controlador

## Instalación y Ejecución
1. **Clonar el repositorio o descomprimir el archivo entregado.**
2. **Configurar la base de datos:**
   - Crear una base de datos MySQL (por defecto: `fortune_cookie_db`).
   - Importar el archivo `database/dbb.sql` para crear las tablas y datos de prueba.
3. **Configurar la conexión:**
   - Editar los parámetros de conexión en `config/Database.php` según tu entorno.
4. **Ejecutar la aplicación:**
   - Levantar un servidor local apuntando a la carpeta `public/` (por ejemplo, usando XAMPP, MAMP, Laragon, etc.).
   - Acceder a `index.php` para registrarse o iniciar sesión.

## Funcionalidades Implementadas
- **Registro de usuarios:**
  - Validación de email único.
  - Contraseña encriptada (bcrypt).
- **Login y logout:**
  - Control de sesión y acceso.
- **Juego de la galleta de la fortuna:**
  - Muestra una frase aleatoria al usuario logueado.
  - Botón para obtener otra frase (sin recargar la página, usando AngularJS).
- **Gestión de frases (solo admin):**
  - Vista privada para agregar nuevas frases.
  - Validación para evitar frases repetidas (excepción controlada y mensaje en la interfaz).
- **Control de roles:**
  - Solo los administradores pueden acceder a la gestión de frases.
- **Interfaz en español, lógica interna en inglés.**

## Criterios de Validación y Manejo de Errores
- **Mensajes claros** en la interfaz ante errores de registro, login, duplicados, etc.
- **Validación de datos** en backend y frontend.
- **Excepciones controladas** (por ejemplo, frase o email repetido).
- **Control de acceso**: rutas protegidas según sesión y rol.

## Mejoras respecto al parcial anterior
- Lógica y estructura renombradas a inglés para cumplir estándares y claridad.
- Separación clara de modelo, vista y controlador.
- Uso de AngularJS para experiencia fluida en el juego.
- Base de datos y código alineados en inglés.
- Mensajes de error y éxito mejorados y claros para el usuario.

## Datos de prueba
- **Usuarios:**
  - Admin: `admin@mail.com` / contraseña (hash a definir en la base de datos)
  - Usuario: `usuario@mail.com` / contraseña (hash a definir en la base de datos)
- **Frases:**
  - Varias frases de ejemplo incluidas en la tabla `phrases`.

## Notas
- Si necesitas generar un hash de contraseña para los usuarios de prueba, puedes usar la función `password_hash('tu_contraseña', PASSWORD_BCRYPT)` en PHP.
- El sistema está preparado para ser extendido fácilmente a vistas Blade o rutas de Laravel si se desea.

## Autoría y entrega
- Entrega individual/grupal según consigna.
- Repositorio GitHub y archivo comprimido incluyen todo el código fuente, base de datos y documentación.
