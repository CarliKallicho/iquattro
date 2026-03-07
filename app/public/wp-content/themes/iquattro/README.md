# Tema iQuattro para WordPress

Tema corporativo para **iQuattro Group**, desarrollado para WordPress con PHP, HTML, CSS y JavaScript. La base de datos se utiliza a través de WordPress (MySQL).

## Estructura del tema

```
iquattro/
├── assets/
│   ├── css/
│   │   └── main.css      # Estilos principales
│   └── js/
│       └── main.js       # Formulario de contacto (AJAX)
├── style.css             # Metadatos del tema y variables CSS
├── functions.php         # Configuración, menús, formulario de contacto
├── header.php            # Cabecera + hero (en portada)
├── footer.php            # Pie con divisiones y datos de contacto
├── index.php             # Plantilla principal
├── front-page.php       # Portada (todas las secciones del mockup)
├── page.php             # Páginas estándar
├── page-contacto.php    # Plantilla "Contacto" (formulario)
├── single.php           # Entradas del blog
├── 404.php              # Página no encontrada
└── README.md
```

## Páginas del sitio (según menú)

Crear en **WordPress → Páginas** las siguientes páginas con el **slug** indicado:

| Título      | Slug         | Notas                          |
|------------|--------------|--------------------------------|
| Inicio     | (portada)    | Usar como página de inicio     |
| Acerca De  | acerca-de    | Contenido libre                |
| Data Center| data-center  | Contenido libre               |
| Seguridad  | seguridad    | Contenido libre               |
| Consultoría| consultoria  | Contenido libre               |
| Servicios  | servicios    | Contenido libre               |
| Capacitación | capacitacion | Contenido libre             |
| Contacto   | contacto     | Asignar plantilla **Contacto** |

## Configuración en WordPress

1. **Subir el tema**  
   Copiar la carpeta `iquattro` (o el contenido del proyecto) en `wp-content/themes/iquattro`.

2. **Activar el tema**  
   En **Apariencia → Temas**, activar **iQuattro Group**.

3. **Página de inicio**  
   En **Ajustes → Lectura**:
   - Marcar “Una página estática”.
   - Página de inicio: **Inicio** (la página que creaste para la portada).
   - Página de entradas: opcional (o crear “Blog”).

4. **Menú principal**  
   En **Apariencia → Menús**:
   - Crear un menú (ej. “Menú principal”).
   - Añadir las páginas anteriores en el orden deseado.
   - Asignarlo a la ubicación **Menú principal**.

5. **Datos de contacto (pie y envío)**  
   En **Apariencia → Personalizar → Datos de contacto** puedes editar:
   - Teléfono (por defecto: +591 71947016)
   - Email de contacto (por defecto: marisol@i-quattro.com)
   - Ubicación (por defecto: Bolivia)

   El formulario de contacto envía por email al **correo del administrador** (**Ajustes → General → Dirección de correo electrónico**).

6. **Logo**  
   En **Apariencia → Personalizar → Identidad del sitio** puedes subir el logo de iQuattro; si no hay logo, se muestra el texto “iQuattro” + “GROUP”.

## Formulario de contacto

- Envío por **AJAX** (sin recargar la página).
- Validación en servidor en `functions.php` (acción `iquattro_contact`).
- Se usa `wp_mail()`; para que lleguen los correos, el servidor (cPanel) debe tener correo o SMTP configurado.

## Base de datos

WordPress ya usa MySQL para páginas, entradas, opciones y menús. Si más adelante quieres guardar envíos del formulario en una tabla propia, se puede añadir en `functions.php` el uso de `$wpdb` para crear una tabla y guardar cada envío.

## Tecnologías

- **PHP**: plantillas WordPress y lógica del tema.
- **HTML**: en los archivos `.php` (header, footer, front-page, page, etc.).
- **CSS**: `style.css` (variables y base) y `assets/css/main.css` (layout y componentes).
- **JavaScript**: `assets/js/main.js` (jQuery para el formulario de contacto).
- **MySQL**: a través de WordPress (wp_posts, wp_options, wp_terms, etc.).

## Créditos

Diseñado y desarrollado por **Stradia** para iQuattro Group.
