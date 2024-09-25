<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendingMachineRequest;
use App\Models\Image;
use App\Models\Store;
use App\Models\VendingMachine;
use App\Models\VendingMachineCategory;
use App\Services\Admins\ImageService;
use Illuminate\Support\Facades\DB;

class VendingMachineController extends Controller
{
    protected $imageService;

    public function __construct(
        ImageService $imageService
    )
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = VendingMachine::query()
                     ->with(['image' => function($q) {
                        return $q->whereNull('deleted_at');
                     }, 'store' => function($q) {
                        return $q->whereNull('deleted_at');
                     }])
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.vending-machine.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::whereNull('deleted_at')->get();
        return view('admins.vending-machine.create',[
            'stores' => $stores,
            'machine_categories' => VendingMachineCategory::query()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendingMachineRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('icon')) {
                $file = $this->imageService->image(null, $request->file('icon'));
            }

            $postData = [
                'store_id' => $request->get('store_id'),
                'category_id' => $request->get('category_id'),
                'title' => $request->get('title'),
                'post_code' => $request->get('post_code'),
                'pref21' => $request->get('pref21') ?? null,
                'addr21' => $request->get('addr21') ?? null,
                'strt21' => $request->get('strt21') ?? null,
                'desc' => $request->get('desc') ?? null,
                'status' => $request->get('status') ?? null,
                'latitude' => $request->get('latitude') ?? '88.67281600',
                'longitude' => $request->get('longitude') ?? '12.72093000',
                'ip_address' => $request->get('ip_address') ?? null,
                'icon' => $file ?? 'https://via.placeholder.com/640x480.png/006644?text=aperiam',
            ];
            $vendingMachine = new VendingMachine($postData);
            $vendingMachine->save();

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $index => $file) {
                    $file = $this->imageService->image(null, $file);
                    $imageData = [
                        'imageable_id' => $vendingMachine->id,
                        'imageable_type' => 'machine',
                        'image_url' => $file,
                        'priority' => $index + 1,
                    ];
                    $image = new Image($imageData);
                    $image->save();
                }
            }
            DB::commit();
            return redirect(route('admin.vending-machine.index'))->with('success',  '自動販売機の作成に成功しました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = VendingMachine::query()
                     ->with(['store' => function($q) {
                        return $q->whereNull('deleted_at');
                     }])
                     ->whereNull('deleted_at')
                     ->where('id', $id)
                     ->first();
        $stores = Store::whereNull('deleted_at')->get();
        return view('admins.vending-machine.view',[
            'item' => $item,
            'stores' => $stores,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = VendingMachine::query()
                     ->with(['image' => function($q) {
                        return $q->whereNull('deleted_at');
                     }, 'store' => function($q) {
                        return $q->whereNull('deleted_at');
                     }])
                     ->whereNull('deleted_at')
                     ->where('id', $id)
                     ->first();
        $stores = Store::whereNull('deleted_at')->get();
        return view('admins.vending-machine.edit',[
            'item' => $item,
            'stores' => $stores,
            'machine_categories' => VendingMachineCategory::query()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendingMachineRequest $request, VendingMachine $vendingMachine)
    {
        DB::beginTransaction();

        try {
            $vendingMachine->update($request->all());
            $vendingMachine->products()->update(['store_id' => $request->get('store_id')]);

            if ($request->hasFile('icon')) {
                $file = $this->imageService->image($vendingMachine->icon, $request->file('icon'));
                $vendingMachine->icon = $file;
                $vendingMachine->save();
            }

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $index => $file) {
                    $file = $this->imageService->image(null, $file);
                    $imageData = [
                        'imageable_id' => $vendingMachine->id,
                        'imageable_type' => 'machine',
                        'image_url' => $file,
                        'priority' => $index + 1,
                    ];
                    $image = new Image($imageData);
                    $image->save();
                }
            }
            DB::commit();
            return redirect(route('admin.vending-machine.index'))->with('success',  '自動販売機が正常に更新されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VendingMachine::where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success',  '自動販売機は正常に削除されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function removeImage(string $id)
    {
        Image::where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return response()->json([
            'success' => 'success',
            'message' => 'success'
        ]);
    }
}
