<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function Catego(){
        $categoria = DB::table('categorias')->distinct()->get();
        return $categoria;
    }

    public function criarCatego(Request $request){
        $data = $request->all();
        $categoria = DB::table('categorias')->insert($data);
        return response(
            "categoria criado com sucesso", 200
        );
    }

    public function uptCatego(Request $request, string $id){
        $categoria = DB::table('categorias')->where('id', $id)->first();
        if ($categoria === null) {
            return response(
                "categoria com ID {$id} não foi encontrado.", 404
            );
        }

        $data = $request->all();
        $categoria = DB::table('categorias')->where('id', $id)->update($data);
        return response(
                "Categoria alterado com sucesso", 202
            );
    }

    public function delCatego(Request $request, string $id){
        $categoria = DB::table('categorias')->where('id', $id)->first();
        if ($categoria === null) {
            return response(
                "categoria com ID {$id} não foi encontrado.", 404
            );
        }
        DB::table('categorias')->where('id', $id)->delete();
        return response(
            "Categoria deletado com sucesso", 202
        );
    }
}
