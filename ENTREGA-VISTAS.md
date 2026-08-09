# Entrega de vistas

## Archivos incluidos

- `app/Views/encabezado.php`
- `app/Views/inicio.php`
- `app/Views/registrar_cita.php`
- `app/Views/listar_citas.php`
- `app/Views/editar_cita.php`
- `app/Views/pie.php`
- `app/Views/error404.php`
- `public/css/estilos.css`
- `public/js/script.js`

## Campos de los formularios

Los atributos `name` se mantuvieron exactamente así:

- `nombre_cliente`
- `telefono`
- `correo`
- `servicio`
- `fecha`
- `hora`
- `notas_adicionales`

El texto visible de `nombre_cliente` es **Nombre y apellido**, pero su nombre interno no fue modificado.

## Estado inicial de las vistas

- El inicio muestra contadores en `0`.
- El listado no contiene clientes ni citas escritos manualmente.
- Cuando no se recibe información desde la base de datos, aparece el mensaje **No hay citas registradas**.
- `listar_citas.php` está preparado para recibir un arreglo llamado `$citas`.
- `editar_cita.php` está preparado para recibir un arreglo llamado `$cita`.

## Trabajo pendiente del backend

El desarrollador del backend debe conectar el guardado, la actualización, la eliminación, la búsqueda, el filtro por fecha y la base de datos.
