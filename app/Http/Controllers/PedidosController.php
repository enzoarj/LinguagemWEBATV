<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function todosPedidos(){
        $pedido = DB::table('pedidos')->distinct()->get();
        return $pedido;
    }

    public function criarPedido(Request $request){
        $data = $request->all();
        $pedido = DB::table('pedidos')->insert($data);
        return response(
            "pedido criado com sucesso", 200
        );
    }

    public function updPedido(){
        $pedido = DB::table('pedidos')->where('id', $id)->first();
        if ($pedido === null) {
            return response(
                "pedido com ID {$id} não foi encontrado.", 404
            );
        }

        $data = $request->all();
        $pedido = DB::table('pedidos')->where('id', $id)->update($data);
        return response(
                "pedido alterado com sucesso", 202
            );
    }

    public function delPedido(){
        $pedido = DB::table('pedidos')->where('id', $id)->first();
        if ($pedido === null) {
            return response(
                "pedido com ID {$id} não foi encontrado.", 404
            );
        }
        DB::table('pedidos')->where('id', $id)->delete();
        return response(
            "pedido deletado com sucesso", 202
        );
    }
}
