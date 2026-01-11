<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
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
        // $results = DB::table("products")->find(10);

        //select com where:
        // $products = DB::table("products")->where("id", ">=", 10)->get();

        // $products = DB::table("products")
        //               ->select("product_name", "price")
        //               ->get();

        //SELECT * FROM products WHERE price > 70:
        // $products = DB::table("products")
        //               ->where("price", ">", 70)
        //               ->get();

        //SELECT * FROM products WHERE price > 50 AND product_name LIKE "A%":
        // $products = DB::table("products")
        //               ->where("price", ">", 50)
        //               ->where("product_name", "like", "A%")
        //               ->get();

        //SELECT * FROM products WHERE price > 80 OR product_name LIKE "A%":
        // $products = DB::table("products")
        //               ->where("price", ">", 80)
        //               ->orWhere("product_name", "like", "A%")
        //               ->get();

        // $products = DB::table("products")
        //               ->where([
        //                   ["price", ">", 50],
        //                   ["product_name", "like", "A%"]
        //               ])->get();

        $products = DB::table("products")
                      ->where("price", ">", 90)
                      ->orWhere(function(Builder $query) {
                          $query->where("product_name", "Banana")
                                ->orWhere("product_name", "Cereja");
                      })->get();

        // $this->showRawTable($products);
        $this->showDataTable($products);
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
