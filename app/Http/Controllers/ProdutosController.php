<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function obtTodos(){
        $produtos = DB::table('produtos')->distinct()->get();
        return $produtos;
    }

    public function obtProduto(Request $request){
        $data = $request->all();
        $produto = DB::table('produtos')->insert($data);
        return response(
            "produto criado com sucesso", 200
        );
    }

    public function uptProduto(Request $request, string $id){
        $produto = DB::table('produtos')->where('id', $id)->first();
        if ($produto === null) {
            return response(
                "produto com ID {$id} não foi encontrado.", 404
            );
        }

        $data = $request->all();
        $produto = DB::table('produtos')->where('id', $id)->update($data);
        return response(
                "produto alterado com sucesso", 202
            );
    }

    public function delProduto(Request $request, string $id){
        $produto = DB::table('produtos')->where('id', $id)->first();
        if ($produto === null) {
            return response(
                "produto com ID {$id} não foi encontrado.", 404
            );
        }
        DB::table('produtos')->where('id', $id)->delete();
        return response(
            "Post deletado com sucesso", 202
        );
    }
}
