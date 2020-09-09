<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
        //teste
    }

    public function index()
    {
        return response()->json($this->product->paginate(5)); //formata o retorno para Json
    }

    public function show($id) // ja passsa o id para o objeto da model product que faz a pesquisa e retorna o dados do produto
    {
        //$data = ['data' => $id];
        $product = $this->product->find($id);

        if (! $product) {
            return response()->json(['data' => ['msg' => 'Produto nao encontrado']], 404);
        }
        $data = ['data' => $product];
        return response()->json($data);
    }

    public function store(ProductRequest $request)
    {
        /*
        $e = [
            a=>"aa",
            b="bb"
        ];
        */

        try {
            //dd($request);
            $productData = $request->all();
            $this->product->create($productData);
            return response()->json(['data'=>['msg' => 'Produto criado com sucesso'],200]);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                //return ['data' => response()->json($e->getMessage(),201)];
                //return response()->json(['execption' => $e->getMessage(), 'cod' => 201]);
                return response()->json([
                                            'Error' => $e->getMessage(),
                                            'cod'   => 201
                                        ], 500);
            }
            return ApiError::errorMessage($cod = 201);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $productData = $request->all();
            $productFind = $this->product->find($id);

            $update = $productFind->update($productData);
            /*
            if($update)
            {
                return response()->json(['data'=>['msg' => 'Produto atualizado com com sucesso'],200]);
            }
            */
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return ['data' => response()->json(ApiError::errorMessage($e->getMessage(), 1010))];
            }
            return [
                'data' => response()->json(ApiError::errorMessage(
                    'Houve um arro ao realizar operaçao de atualizaçao',
                    1011
                ))];
        }
    }
    public function delete($id)
    {
        try {
            $product = $this->product->find($id)->delete();
            return response()->json(['data'=>['msg' => "Produto Deletado com sucesso"], 200]);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return ['data' => response()->json(ApiError::errorMessage($e->getMessage(), 1010))];
            }
            return [
                'data' => response()->json(ApiError::errorMessage(
                    'Houve um arro ao realizar operacao de remocao',
                    1012
                ))];
        }
    }
}
