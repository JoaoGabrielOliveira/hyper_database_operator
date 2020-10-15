# Database Operation

**Database Operation** is a package with somes class to connect in a database and make CRUD operations.


## Getting Started

The first thing you need the do is set the ````DbConnection```` using the function ````set_instance````.

````php
DbConnection::set_instance([
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
DbConnection::set_instance([
    'db' => [
        "driver" => "sqlite",
        "path" => "/home/bionexo/Documents/projetos_paralelos/HyperPHP/db_operations/main/db/database.db"
]
]);
````


## Namespace

### Hyper

Main namespace.

### ```` Hyper//Database ````

In this namespace, is save the class that make the connection class and operation classes.

### ````Hyper//Database//CRUD````

In this namespace, is save all CRUD operations


## Classes

### ````Hyper//Database//DbConnection````

This class creates the connection with the database.

#### Non Static functions

| Functions     | Parameters | Description                                                                                                          |
|---------------|------------|----------------------------------------------------------------------------------------------------------------------|
| + __construct | $params    | This construction function receive the database params, as name of database driver, database name etc                |
| + connect     |            | This function call the **$connection_params** attribute's, verify what database driver and create the PDO connection |

#### Static functions

| Functions           | Parameters    | Description                                                                         |
|---------------------|---------------|-------------------------------------------------------------------------------------|
| + set_instance      | $params       | This function receive the database params to create a singleton DbConnection class. |
| + get_instance      |               | Return the singleton                                                                |
| + prepare_statement | string $query | Prepare a SQL query and return a statement to create                                |
| - is_instance_null  |               | Verify if singleton instance is null and return a bool                              |



### ````Hyper//Database//CRUD//insert````

This class is a static class to make insert query without SQL.

#### Static functions

| Functions                    | Parameters                           | Description                                                                                                                                                                 |
|------------------------------|--------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| + execute                    | array $values                        | This function execute the query, inserting values inside of **$values**. **$values** follow the key and value model, where key is the column name and value is... you know. |
| - processing_data            | array $values                        | This helper function get the value that will be inserted and preparing the value to SQL injection                                                                           |
| - processing_multiple_data   | array $values                        | This helper function get the values that will be inserted and preparing the values to SQL injection                                                                         |
| - is_multiple_values         | array $data                          | Verify if the values that will be inserted is a one or have a more one data to be insert.This helper function                                                               |
| - convert_data_to_insert_sql | string $table_name, $collumns, $rows | This helper function get informations, as table name, to create a SQL query string Used inside on **convert_data_to_insert_sql** function.                                  |
| - convert_values_to_sql      | array $data                          | This helper function get just the values data, after be processed, and convert to SQL query string.                                                                         |
| - merge_data                 | array $data                          | This helper function just get separate values and merge all in a single array.                                                                                              |



### ````Hyper//Database//CRUD//select````

This class is a static class to make select query without SQL.

#### Static functions

| Functions            | Parameters                                | Description                                                                                                   |
|----------------------|-------------------------------------------|---------------------------------------------------------------------------------------------------------------|
| + execute            | string $table_name, $collumns, $condition | This function execute the query select without SQL. Just parameter $table_name is require, other is optional. |
| - creating_condition | $condition                                | This helper function verify if parameter is a string or a array, convert to a WHERE SQL query.                |



### ````Hyper//Database//CRUD//update````

This class is a static class to make update query without SQL.

#### Static functions

| Functions            | Parameters                                    | Description                                                                                          |
|----------------------|-----------------------------------------------|------------------------------------------------------------------------------------------------------|
| + execute            | string $table_name, $condition, array $params | This function execute the query, update the data specified by **$condition**.                        |
| - creating_condition | $condition                                    | This helper function verify if parameter is a string or a array, convert to a WHERE SQL query.       |
| - creating_setters   | $setters                                      | his helper function get the array with all values that will be updated, follows key and value model. |



### ````Hyper//Database//CRUD//delete````

This class is a static class to make select query without SQL.

#### Static functions

| Functions            | Parameters                     | Description                                                                                          |
|----------------------|--------------------------------|------------------------------------------------------------------------------------------------------|
| + execute            | string $table_name, $condition | This function execute the query, delete the data specified by **$condition**.                        |
| - creating_condition | $condition                     | This helper function verify if parameter is a string or a array, convert to a WHERE SQL query.       |