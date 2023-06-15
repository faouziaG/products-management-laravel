<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        // get available filters from request
        $filters = $request->only([
            "name",
            "description",
            "type",
            "size",
            "price",
            "quantity",
            "created_at",
            "keyword"
        ]);

        $products = $this->productRepository->getAll(
            $request->integer('per_page'),
            $filters
        );
        return response()->json([
            'products' => $products,
        ]);
    }

    public function show($productId)
    {
        $product = $this->productRepository->findById($productId);

        return response()->json([
            'product' => $product,
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $product = $this->productRepository->create($request->validated());

        return response()->json([
            'product' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->productRepository->update($product, $request->validated());

        return response()->json([
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        $this->productRepository->delete($product);

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
}
