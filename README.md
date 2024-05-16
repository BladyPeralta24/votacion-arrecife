
![Logo](https://upload.wikimedia.org/wikipedia/commons/6/6a/Escudo_de_Arrecife.svg)


# Aplicacion de votaciones para los carnavales de Arrecife 2025

Programa hecho con el framework Laravel, de la que trata de un sistema de votaciones para los carnavales de Arrecife del año 2025.


## Installation

Clonar el repositorio

```bash
  git clone https://github.com/BladyPeralta24/votacion-arrecife.git
```

Moverse al directorio votacion-arrecife
```bash
  cd votacion-arrecife
```

Instalar las dependencias con Composer
```bash
  composer install
```
Hacer una copia de `.env.example` y renombrarlo como `.env`
```bash
  cp .env.example .env
```
Generar una nueva clave
```bash
  php artisan key:generate
```
Configurar la base de datos con los siguientes parámetros y modifique el archivo `.env`
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=encuesta_carnavales
  DB_USERNAME=root
  DB_PASSWORD=
```
Ejecute las migraciones
```bash
  php artisan migrate
```
Active el servidor
```bash
  php artisan serve
```
    
## 🚀 About Me
Me llamo Bladimir Peralta Herrera y soy un desarrollador de aplicaciones web. Estoy especializado tanto en el backend como el frontend


## Used By

Este proyecto ha sido realizado por:

- Bladimir Peralta Herrear


## License

[Ayuntamiento de Arrecife](https://www.arrecife.es/)

