<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {

        //Devolver todos os dados de uma tabela:
        // $clients = DB::table("clients")->get();

        //Apresentar num array associativo:
        // $clients = DB::table("clients")->get()->toArray();

        //Apresentar num array de arrays associativos:
        // $results = DB::table("products")->get()->map(function($item) {
        //     return (array) $item;
        // });

        //Apresentar os dados a partir dos resultados:
        // $products = DB::table("products")->get();

        // foreach ($products as $product) {
        //     echo $product->product_name . "<br>";
        // }

        //Apresentar apenas algumas colunas:
        // $products = DB::table("products")->get(["product_name", "price"]);

        //pluck - Obter de forma simples os dados de uma coluna específica:
        // $results = DB::table("products")->pluck("product_name");

        //Devolver apenas a primeira linha de um resultado:
        // $results = DB::table("products")->get()->first();

        //Devolver apenas a última linha de um resultado:
        // $results = DB::table("products")->get()->last();

        //SELECT * FROM products WHERE id = 10:
        $results = DB::table("products")->find(10);

        $this->showRawTable($results);
        // $this->showDataTable($results);
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
