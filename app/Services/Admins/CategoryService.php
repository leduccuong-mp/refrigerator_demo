<?php

namespace App\Services\Admins;

use App\Models\Category;

class CategoryService
{
    protected $imageService;

    public function __construct(
        ImageService $imageService
    )
    {
        $this->imageService = $imageService;
    }

    public function create($request)
    {
        $fileName = $this->imageService->image(null, $request->file('icon'));
        $category = new Category;
        $category->name = $request['name'];
        $category->sort = $request['sort'];
        $category->icon = $fileName;
        $category->save();

        return $category;
    }

    public function update($category, $request)
    {
        $category->name = $request['name'];
        $category->sort = $request['sort'];
        if ($request->hasFile('icon')) {
            $fileName = $this->imageService->image($category->icon, $request->file('icon'));
            $category->icon = $fileName;
        }
        $category->update();

        return $category;
    }
}
