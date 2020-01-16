<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        try {
            return $this->apiResponse(['success' => true], 200);
        } catch (\Exception $e) {
            // @todo Log this error
            return $this->apiResponse(['error' => 'An unknown error occurred'], 500);
        }
    }
}
