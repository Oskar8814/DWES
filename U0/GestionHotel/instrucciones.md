Este sistema de gestión de hotel está diseñado para administrar eficientemente las habitaciones, reservas y clientes de un hotel. A continuación, se describe detalladamente cada una de las funcionalidades que ofrece el sistema, su estructura y cómo interactúan entre sí para facilitar la administración del hotel.
1. Inicio de Sesión de Administrador
El sistema cuenta con un sistema de autenticación, donde los administradores deben iniciar sesión con un nombre de usuario y contraseña. Si no están autenticados, se redirige al usuario a la página de inicio de sesión.
Al iniciar sesión correctamente, los administradores tienen acceso a un dashboard o panel principal desde donde pueden gestionar todas las funciones.
2. Gestión de Habitaciones
Visualización de Habitaciones:
En la página principal de habitaciones, se muestran todas las habitaciones del hotel organizadas en tarjetas visuales que incluyen:
Número de habitación: Identificación única de cada habitación.
Tipo de habitación: Ejemplo: Individual, Doble, Suite.
Estado de la habitación: Puede ser disponible, ocupada o en mantenimiento.
Cliente asignado: Muestra el nombre del cliente si la habitación está ocupada. Si no hay cliente, indica que no hay asignación.
Las habitaciones se agrupan por estado, lo que facilita la visualización rápida de la disponibilidad.
Agregar Nueva Habitación:
Los administradores pueden agregar nuevas habitaciones al hotel mediante un formulario que incluye:
Número de habitación.
Tipo: Especifica si es individual, doble o suite.
Estado: La habitación puede estar disponible, ocupada o en mantenimiento.
Al enviar el formulario, los datos se insertan en la base de datos y la nueva habitación queda registrada en el sistema.
Modificar Estado de la Habitación:
Las habitaciones pueden cambiar de estado. Esto incluye:
Disponible: Si la habitación está libre para ser asignada a un cliente.
Ocupada: Si la habitación está reservada por un cliente.
Mantenimiento: Si la habitación está fuera de servicio.
Si una habitación pasa de disponible a ocupada, el sistema actualiza la información en la base de datos y se asigna un cliente.
Observaciones:
Cada habitación puede tener observaciones adicionales. Estas observaciones pueden ser comentarios o detalles específicos sobre el estado de la habitación (por ejemplo, si hay algún daño o requerimiento de mantenimiento).
Las observaciones se gestionan a través de un campo en la base de datos y se pueden visualizar y modificar en la interfaz de gestión de habitaciones.
3. Gestión de Clientes
Registro de Clientes:
El sistema permite registrar nuevos clientes con información básica como nombre, email, teléfono y preferencias. Esta información se almacena en la base de datos para poder asignar clientes a las habitaciones.
Los clientes pueden ser visualizados y administrados por el administrador, permitiendo realizar modificaciones en sus datos si es necesario.
Asignación de Clientes a Habitaciones:
En el caso de que una habitación esté disponible, el administrador puede asignar un cliente a esa habitación. Para ello, se selecciona al cliente de una lista desplegable y se guarda la asignación.
Al asignar un cliente, el estado de la habitación cambia a ocupada y se registran detalles de la reserva en la base de datos.
4. Gestión de Reservas
Realizar Reservas:
Aunque el sistema no tiene un flujo específico de reservas de manera automatizada, el concepto de reservas se gestiona indirectamente mediante la asignación de clientes a las habitaciones.
Al asignar un cliente a una habitación, el estado de la habitación se marca como ocupada, lo que implica que hay una reserva activa para esa habitación.
Cambios en el Estado de la Reserva:
Cuando se actualiza el estado de una habitación (de disponible a ocupada o mantenimiento), el sistema también actualiza los registros de la reserva en la base de datos, lo que refleja la disponibilidad real de las habitaciones.
5. Interfaz y Funcionalidad de Usuario
Interfaz de Usuario:
El sistema tiene una interfaz sencilla y accesible. Los administradores pueden navegar entre las habitaciones, clientes y reservas de manera eficiente a través de menús y formularios visualmente bien organizados.
Se utiliza HTML, CSS (con algunos estilos personalizados) y PHP para manejar las interacciones con la base de datos.
La página de habitaciones muestra las habitaciones como tarjetas, lo que permite una visualización rápida y clara de la disponibilidad y el estado de las habitaciones.
Los formularios de gestión, como los de agregar o editar habitaciones, están diseñados para ser fáciles de usar y con validación para asegurar que la información ingresada sea correcta.
Responsividad:
El diseño del sistema es responsivo, lo que significa que se adapta automáticamente a dispositivos de diferentes tamaños, como teléfonos móviles, tabletas y computadoras de escritorio.