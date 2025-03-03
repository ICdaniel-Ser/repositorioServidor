> [!NOTE]  
> Esto es una nota, puede ser util.

# PRACTICA DESPLIEGUE DOCKER
## Por David Rubio 

Para realiza este trabajo se realizara una estructura que consistira de:

* Una red local virtual para la comunicacion entre los contenedores.
* Un contenedor con una aplicacion PHP que sera levantada por un servidor apache en el puerto 8000.
* Un contenedor con una aplicacion Node que sera levantada por el propio node en el pueto 3000.
* Un contenedor MySQL que servira para los datos de la aplicacion PHP.
* Un contenedor MySQL que servira para los datos de la aplicacion Node.
* Un contenedor NginX que funcionara como proxy y que enviara ambas aplicaciones por el puerto 80 del contenedor que estara enlazado con el puerto 80 de la maquina real.

En total se necesitaran 5 contenedores para realizar la practica, esto es por que mantenemos el principio de un contendor para una utilidad/aplicacion.

* Los contenedores de PHP y Node tendran su propio volumen enlazado a su carpeta correspondiente para guardar el codigo de la aplicacion de forma persistente (Tambien se podria hacer por un dockerfile y con GIT).
* Los contenedores de MySQL tendran cada uno su propio volumen para que los datos sean persistentes tambien.
* El contenedor de NginX tambien tendra su propio volumen para facilitar el levantar la aplicacion.

En resumen cada contenedor tendra asociado un volumen vinculado en la maquina real para hacer que los datos sean persistentes.

### CREACION DE LA RED LOCAL

Crearemos ahora con el comando siguiente una red local a la que llamaremos RedVirtual.

`Docker network create RedVirtual`

![Captura de la creacion de la red local](assets/Captura_RedLocal.png)

### CREACION DEL CONTENEDOR DE NGINX (PROXY)

Empezamos creando la maquina de nginx, para esto la crearemos con un puerto real vinculado a uno virtual (el 80 de cada maquina), ademas le daremos el nombre de nginx_proxy para diferenciarla y le vincularemos un volumen (administrado por Docker) con una carpeta interna donde nginx despliega las aplicaciones (/etc/nginx).

`Docker run -d -p 80:80 -v VolumenNginx:/etc/nginx --name nginx_proxy nginx:latest`

![Captura de un la creacion de la maquina nginx](assets/Captura_CreacionNginX.png)

### CONFIGURACION DEL CONTENEDOR DE NGINX (PROXY)

Para configurar nuestro proxy basta con dejar un archivo llamado nginx.conf modificado en nuestro volumen, de esa manera cuando levantemos el contenedor de nginx esta sera la configuracion que tendra.

![Captura del contenido de la carpeta vinculada](assets/Captura_ConfiguracionNginX_01.png)

El codigo adentro del archivo de configuracion es el siguiente:

`server {
    listen 80;
    server_name aplicacionA.com; # O tu dominio si tienes uno

    location / {
        proxy_pass http://localhost:3000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
    }
}

server {
    listen 80;
    server_name aplicacionB.com; # O tu dominio si tienes uno

    location / {
        proxy_pass http://localhost:8000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
    }
}`

El codigo escuchara por el puerto 3000 la aplicacion web A y por el puerto 8000 la aplicacion B y los sirve por el puerto 80

![Captura mostrando el codigo](assets/Captura_ConfiguracionNginX_02.png)

### CREACION DEL CONTENEDOR DE NODE

Para crear la maquina de node, 

`Docker run -d -p 80:80 -v VolumenNginx:/etc/nginx --name nginx_proxy nginx:latest`

![Captura de un la creacion de la maquina nginx](assets/Captura_CreacionNginX.png)




