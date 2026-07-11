<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Traits\ResponseTrait;

class CategoryController extends Controller
{
    use ResponseTrait;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategories()
    {
        $categories = $this->categoryService->getCategories();
        return $this->success($categories, 'Categories fetched successfully');
    }
}
