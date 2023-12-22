<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('produto',[ProdutosController::class,'obtTodos']);
Route::post('produto',[ProdutosController::class,'obtProduto']);
Route::patch('produto/{id}',[ProdutosController::class,'uptProduto']);
Route::delete('produto/{id}',[ProdutosController::class,'delProduto']);

Route::get('categoria',[CategoriaController::class,'Catego']);
Route::post('categoria',[CategoriaController::class,'criarCatego']);
Route::patch('categoria/{id}',[CategoriaController::class,'uptCatego']);
Route::delete('categoria/{id}',[CategoriaController::class,'delCatego']);


Route::get('pedido',[PedidoController::class,'todosPedidos']);
Route::post('pedido',[PedidoController::class,'criarPedido']);
Route::patch('pedido/{id}',[PedidoController::class,'updPedido']);
Route::delete('pedido/{id}',[PedidoController::class,'delPedido']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
