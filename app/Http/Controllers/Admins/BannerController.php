<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Services\Admins\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(
        BannerService $bannerService
    )
    {
        $this->bannerService = $bannerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Banner::query()
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate(10);
        return view('admins.banner.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        try {
            $this->bannerService->create($request);
            return redirect(route('admin.banner.index'))->with('success',  'バナーが正常に作成されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('admins.banner.view',[
            'item' => $banner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admins.banner.edit',[
            'item' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        try {
            $this->bannerService->update($banner, $request);
            return redirect(route('admin.banner.index'))->with('success',  'バナーが正常に更新されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner->update([
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            return back()->with('success',  'バナーは正常に削除されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }
}
