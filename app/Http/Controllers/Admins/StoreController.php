<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $items = Store::query()
                     ->with('ratings')
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.store.index',[
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('admins.store.create');
    }

    public function store(StoreRequest $request)
    {
        $postData = [
            'name' => $request->get('name'),
            'post_code' => $request->get('post_code'),
            'pref21' => $request->get('pref21') ?? null,
            'addr21' => $request->get('addr21') ?? null,
            'strt21' => $request->get('strt21') ?? null,
            'desc' => $request->get('desc') ?? null,
            'latitude' => $request->get('latitude') ?? null,
            'longitude' => $request->get('longitude') ?? null,
            'status' => $request->get('status') ?? null,
        ];
        $store = new Store($postData);
        $store->save();
        return redirect(route('admin.store'))->with('success',  '店舗を登録しました');
    }

    public function update($id, StoreRequest $request)
    {
        $updateData = [
            'name' => $request->get('name'),
            'post_code' => $request->get('post_code'),
            'pref21' => $request->get('pref21') ?? null,
            'addr21' => $request->get('addr21') ?? null,
            'strt21' => $request->get('strt21') ?? null,
            'desc' => $request->get('desc') ?? null,
            'latitude' => $request->get('latitude') ?? null,
            'longitude' => $request->get('longitude') ?? null,
            'status' => $request->get('status') ?? null,
        ];
        Store::where('id', $id)->update($updateData);
        return back()->with('success',  '店舗情報を更新しました');
    }

    public function edit($id)
    {
        $item = Store::query()
                     ->where('id', $id)
                     ->with('ratings')
                     ->first();
        return view('admins.store.edit',[
            'item' => $item,
        ]);
    }

    public function remove($id)
    {
        Store::where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success',  'ストアが削除されました');
    }
}
