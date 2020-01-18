<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Product\ProductService;
use Base\DomainException;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct()
    {
        $this->productService = \DI\Container::instance()->get('product_service');
    }

    public function all(Request $request)
    {
        try {
            $products = $this->productService->getAll();

            return $this->apiResponse($products->toArray(), 200);
        } catch (DomainException $e) {
            return $this->apiResponse(['error' => $e->getMessage()], $e->getHttpCode());
        } catch (\Exception $e) {
            // @todo Log this error
            return $this->apiResponse(['error' => 'An unknown error occurred'], 500);
        }
    }

    public function get($id)
    {
        try {
            $product = $this->productService->getByID($id);

            return $this->apiResponse($product->toArray(), 200);
        } catch (DomainException $e) {
            return $this->apiResponse(['error' => $e->getMessage()], $e->getHttpCode());
        } catch (\Exception $e) {
            // @todo Log this error
            return $this->apiResponse(['error' => 'An unknown error occurred'], 500);
        }
    }
}
