<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\VendingMachine;
use App\Services\Admins\ImageService;
use App\Services\Admins\RfidService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $imageService;
    protected $rfidService;

    public function __construct(
        ImageService $imageService,
        RfidService $rfidService
    )
    {
        $this->imageService = $imageService;
        $this->rfidService = $rfidService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::query()
                     ->with(['store' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'vendingMachine' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'category' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'image' => function($q) {
                        return $q->whereNull('deleted_at');
                     }])
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.product.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::whereNull('deleted_at')->get();
        $vendingMachine = VendingMachine::whereNull('deleted_at')->get();
        $categories = Category::whereNull('deleted_at')->get();
        $users = User::pluck('name','id');
        return view('admins.product.create',[
            'stores' => $stores,
            'vendingMachine' => $vendingMachine,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $machine = VendingMachine::find($request->get('vending_machine_id'));
            $postData = [
                'store_id' => $machine->store_id ?? null,
                'category_id' => $request->get('category_id') ?? null,
                'vending_machine_id' => $request->get('vending_machine_id') ?? null,
                'user_id' => $request->get('user_id') ?? null,
                'title' => $request->get('title') ?? null,
                'price' => $request->get('price') ?? null,
                'priority' => $request->get('priority') ?? null,
                'quantity' => $request->get('quantity') ?? null,
                'desc' => $request->get('desc') ?? null,
                'type' => $request->get('type') ?? null,
                'capacity' => $request->get('capacity') ?? null,
            ];
            $product = new Product($postData);
            if ($product->save()) {
                $generateRfid = $this->rfidService->generateRfid($product->id, $product->user_id, $product->quantity);

                if ($generateRfid != '') {
                    DB::rollBack();
                    return back()->with('error',  'Eror: ' . $generateRfid);
                }

                if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    foreach ($files as $index => $file) {
                        $file = $this->imageService->image(null, $file);
                        $imageData = [
                            'imageable_id' => $product->id,
                            'imageable_type' => 'product',
                            'image_url' => $file,
                            'priority' => $index + 1,
                        ];
                        $image = new Image($imageData);
                        $image->save();
                    }
                }
                DB::commit();
                return redirect(route('admin.product.index'))->with('success',  '無事に製品が作成されました');
            } else {
                DB::rollBack();
                return back()->with('error',  'Eror: 製品エラーの作成');
            }
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
        $item = Product::query()
                     ->with(['image' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'store' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'vendingMachine' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'category' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'user'])
                     ->whereNull('deleted_at')
                     ->where('id', $id)
                     ->first();
        $stores = Store::whereNull('deleted_at')->get();
        $vendingMachine = VendingMachine::whereNull('deleted_at')->get();
        $categories = Category::whereNull('deleted_at')->get();
        return view('admins.product.view',[
            'item' => $item,
            'stores' => $stores,
            'vendingMachine' => $vendingMachine,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::query()
                     ->with(['store' => function($q) {
                        return $q->whereNull('deleted_at');
                     },'image' => function($q) {
                        return $q->whereNull('deleted_at');
                     }])
                     ->whereNull('deleted_at')
                     ->where('id', $id)
                     ->first();
        $stores = Store::whereNull('deleted_at')->get();
        $vendingMachine = VendingMachine::whereNull('deleted_at')->get();
        $categories = Category::whereNull('deleted_at')->get();
        $users = User::pluck('name','id');
        return view('admins.product.edit',[
            'item' => $item,
            'stores' => $stores,
            'vendingMachine' => $vendingMachine,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $machine = VendingMachine::find($request->get('vending_machine_id'));
            $request['store_id'] = $machine->store_id;
            $product->update($request->all());
            if ($product->update($request->all())) {
                $generateRfid = $this->rfidService->generateRfid($product->id, $product->user_id, $product->quantity, true);

                if ($generateRfid != '') {
                    DB::rollBack();
                    return back()->with('error',  'Eror: ' . $generateRfid);
                }

                if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    foreach ($files as $index => $file) {
                        $file = $this->imageService->image(null, $file);
                        $imageData = [
                            'imageable_id' => $product->id,
                            'imageable_type' => 'product',
                            'image_url' => $file,
                            'priority' => $index + 1,
                        ];
                        $image = new Image($imageData);
                        $image->save();
                    }
                }
                DB::commit();
                return redirect(route('admin.product.index'))->with('success',  '製品は正常に更新されました');
            } else {
                DB::rollBack();
                return back()->with('error',  'Eror: 製品アップデートエラー');
            }
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
        Product::where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success',  '製品は正常に削除されました');
    }
}
