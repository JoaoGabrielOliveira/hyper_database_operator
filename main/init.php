<?php

use Hyper\Console;

use Hyper\Database\ConnectionManagement as ConnectionM;

require_once dirname(__DIR__) . "/vendor/autoload.php";


ConnectionM::set_instance([
    'db' => [
        "driver" => "sqlite",
        "path" => "/home/bionexo/Documents/projetos_paralelos/PHP/db_operations/main/db/database.db"
    ]
]);

print_r(ConnectionM::get_instance()->connect());

//Demonstrate how to create or prepare your SQL string
//$stmt = ConnectionM::prepare_statement("SELECT * FROM tB_cliente");
//print_r($stmt);

//Using CRUD to make some operations

//Select / READ
//print_r ( select::execute("tb_cliente") );

//print_r (Operations::get_all_collumns('clientes'));
//print_r (Operations::get_all_collumns('tb_cliente'));
/*foreach (Operations::get_all_collumns('tb_cliente') as $column)
{
    echo $column->name . "\n";
}*/

//print_r(Operations::create_table('t_clientes',[]));

/*$result = new Result([
    ['nome'=> 'Cleber', 'endereco_id' => '100'],['nome'=> 'Antonio', 'endereco_id' => '100']
    ]);
    print_r ($result->result);
*/

?>