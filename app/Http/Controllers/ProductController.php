<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repository\ProductRepository;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('tokenVerify');
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        $graterThen = (int)Input::get('gt');
        if ($graterThen) {

            return response()
                ->json($this->productRepository->findByAmountGraterThen($graterThen), 200);
        }

        return response()
            ->json($this->productRepository->paginate($page = 30), 200);
    }

    public function getAvailable()
    {
        return response()
            ->json($this->productRepository->findByAmountGraterThen(0), 200);
    }

    public function getUnavailable()
    {
        return response()
            ->json($this->productRepository->findByAmount(0), 200);
    }

    public function updateProduct(UpdateProductRequest $request, int $id)
    {
        $product = $this->productRepository->find($id);
        $isUpdated = $product->update([
            'name' => $request->input('name'),
            'amount' => $request->input('amount')
        ]);

        return response()->json($isUpdated);
    }

    public function storeProduct(CreateProductRequest $request)
    {
        $isSaved = $this->productRepository->create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount')
        ]);

        return response()->json($isSaved);
    }

    public function deleteProduct(int $id)
    {
        return response()
            ->json($this->productRepository->delete($id), 200);
    }

    public function getProduct(int $id)
    {
       return response()
            ->json($this->productRepository->find($id, ['id', 'name', 'amount']), 200);
    }

}
