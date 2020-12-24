# Database Operator

**Database Operation** is a package with somes class to connect in a database and make CRUD operations.


## Getting Started

The first thing you need the do is set the ````DbConnection```` using the function ````set_instance````.

````php
ConnectionManagement::set_instance([
'db' => [
    "driver" => "psql",
    "host" => "localhost",
    "port" => "8080",
    "dbname" => "clients_db",
    "user" => "root",
    "password" => "1234",
]
]);
````

This example the two configuration to pass for the database is driver and path, but to another databases could have more less configurations.

Another example:

````php
ConnectionManagement::set_instance([
    'db' => [
        "driver" => "sqlite",
        "path" => "/home/bionexo/Documents/projetos_paralelos/HyperPHP/db_operations/main/db/database.db"
]
]);
````

Look at [documentation](docs/documentation.md)
