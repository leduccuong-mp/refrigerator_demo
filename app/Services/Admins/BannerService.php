<?php

namespace App\Services\Admins;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerService
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
        $fileName = $this->imageService->image(null, $request->file('image_url'));
        $data = [
            'title' => $request['title'],
            'url' => $request['url'],
            'image_url' => $fileName,
            'priority' => $request['priority'],
            'started_at' => $request['started_at'],
            'ended_at' => $request['ended_at'],
            'status' => $request['status'],
            'type' => $request['type'],
        ];
        $category = new Banner();
        Banner::create($data);

        return $category;
    }

    public function update($model, $request)
    {
        $data = [
            'title' => $request['title'],
            'url' => $request['url'],
            'priority' => $request['priority'],
            'started_at' => $request['started_at'],
            'ended_at' => $request['ended_at'],
            'status' => $request['status'],
            'type' => $request['type'],
        ];
        if ($request->hasFile('image_url')) {
            $fileName = $this->imageService->image($model->image_url, $request->file('image_url'));
            $data['image_url'] = $fileName;
        }
        $model->update($data);

        return $model;
    }
}
