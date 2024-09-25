<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Admins\CategoryService;
use App\Services\Admins\ImageService;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService
    )
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::query()
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.category.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {   
            $this->categoryService->create($request);
            DB::commit();
            return redirect(route('admin.category.index'))->with('success',  'カテゴリが正常に作成されました');
        } catch (\Throwable $th) {
            dd($th->getMessage());

            DB::rollBack();
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admins.category.edit',[
            'item' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();
        try {
            $this->categoryService->update($category, $request);
            DB::commit();
            return redirect(route('admin.category.index'))->with('success',  'カテゴリが正常に更新されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->update([
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            return back()->with('success',  'カテゴリが正常に削除されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }
}
