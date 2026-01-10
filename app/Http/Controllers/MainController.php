<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {

        $clients = DB::table("clients")->get();

        // $this->showRawTable($clients);
        $this->showDataTable($clients);
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
