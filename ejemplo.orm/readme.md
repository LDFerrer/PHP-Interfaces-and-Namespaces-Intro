proyecto-orm/
├── public/
│   ├── index.php         # Front controller (puente entre las solicitudes y el controlador)
│   ├── css/              # Archivos CSS para la vista
│   ├── js/               # Archivos JavaScript para la vista
├── app/
│   ├── controllers/
│   │   ├── BaseController.php # Clase base para controladores (opcional)
│   │   ├── UserController.php # Controlador específico para usuarios
│   ├── models/
│   │   ├── ORM.php          # Clase base del ORM
│   │   ├── User.php         # Modelo específico para usuarios
│   ├── views/
│       ├── user/
│       │   ├── form.php      # Formulario para crear usuarios
│       │   ├── list.php      # Lista de usuarios
│       ├── layout.php        # Plantilla base (cabeceras y pie de página)
├── config/
│   ├── database.php        # Configuración de la conexión con la base de datos
│   ├── routes.php          # Definición de las rutas del proyecto
├── logs/                   # Archivos de log para errores o debugging
├── libs/                   # Librerías para inyección en el proyecto
├── tests/                  # Pruebas unitarias o funcionales
├── composer.json           # Dependencias gestionadas por Composer
├── .env                    # Variables de entorno (base de datos, API keys, etc.)
