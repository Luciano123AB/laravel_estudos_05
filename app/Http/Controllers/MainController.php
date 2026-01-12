<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        //INSERT:
        
        //Adicionar um novo cliente:
        // $new_client = [
        //     "client_name" => "João Ribeiro",
        //     "email" => "joao.ribeiro@gmail.com"
        // ];

        // DB::table("clients")->insert($new_client);
        
        // DB::table("clients")
        //     ->insert([
        //         "client_name" => "João Ribeiro",
        //         "email" => "joao.ribeiro@gmail.com"
        //     ]);

        //Adicionar 2 clientes:
        // DB::table("clients")
        //     ->insert([
        //         [
        //             "client_name" => "Client 01",
        //             "email" => "client01@gmail.com",
        //             "created_at" => Carbon::now()
        //         ],

        //         [
        //             "client_name" => "Client 02",
        //             "email" => "client02@gmail.com",
        //             "created_at" => Carbon::now()
        //         ]
        //     ]);

        //UPDATE:
        // DB::table("clients")
        //     ->where("id", 1)
        //     ->update([
        //         "client_name" => "ALTERADO",
        //         "email" => "alterado@gmail.com"
        //     ]);

        // DB::table("clients")
        //     ->where("client_name", "Catarina Melany Cunha")
        //     ->update([
        //         "email" => "novo@gmail.com"
        //     ]);

        //DELETE - hard:
        // DB::table("clients")
        //     ->where("id", 10)
        //     ->delete();
        
        //DELETE - soft:
        DB::table("clients")
            ->where("id", 11)
            ->update([
                "deleted_at" => Carbon::now()
            ]);
    }

    private function showRawTable($data) {
        echo "<pre>";
            print_r($data);
        echo "</pre>";
    }

    private function showDataTable($data) {
        echo "<table border='1'>";
            //Header:
            echo "<tr>";
                foreach ($data[0] as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>" . $value . "</td>";
                    }
                echo "</tr>";
            }
        echo "</table";
    }
}
