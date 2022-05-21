<h1 align="center">
    <img height="80" src="https://img.icons8.com/material-rounded/96/000000/api-settings.png" />
    <p>API Product Registration</p>
</h1>

## 🚨 About

**API Product Registration** It is an API built with the LARAVEL 8 framework to register products, this API is a study environment ituit. 


## 🔨 Tools

- [PHP](https://www.php.net/)
- [MYSQL](https://www.mongodb.com/try/download/community)
- [DOCKER](https://docs.docker.com/desktop/windows/install/)

## Libraries/Frameworks

- [LARAVEL 8](https://laravel.com/docs/8.x/installation)

### Requisitos

You must have [Docker](https://docs.docker.com/desktop/windows/install/) installed to run the commands

## 👨‍💻 How to Setup

```bash
    # Clone the project
    $ git clone https://github.com/gabrielteixeira-0814/api-laravel-product.git
```

```bash
    # Enter directory
    $ cd  api-laravel-product
```

```bash
    # Run command to use Sail or use default command 
    $ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail' or ./vendor/bin/sail up
```

```bash
    # Run command to use Sail
    $ sail up or sail up -d
```

```bash
    # Run the code to create fake profiles to populate the database
    $ sail artisan migrate:fresh --seed
```
```bash
    # To start the server at address: 
    http://localhost:80
```

### Application Routes

- **`POST /api/register`**: Route to register a user.

- **`POST /api/login`**: User login route.

- **`POST /api/logout`**: Route for user logout, and must use the token generated at the time the user logged into the API for the request.

- **`POST /api/products`**: Route to register a product.

- **`POST /api/:id`**: Route to edit a product.

- **`DELETE /api/:id`**: Route to delete a product.

- **`GET /api`**: Route to fetch a product list.

- **`GET /api/:id`**: Route to search for a product.


## 📝 License

This project is under the MIT license. See the file <a href="https://github.com/gabrielteixeira-0814/Node-lista-tarefa/blob/main/LICENCE">LICENCE</a> for more details.

---

<p align="center">Created by Gabriel Teixeira</p>
