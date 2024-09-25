<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMaintainRequest;
use App\Models\Maintain;
use Illuminate\Http\Request;

class MaintainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Maintain::query()
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.maintain.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.maintain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMaintainRequest $request)
    {
        try {
            Maintain::create($request->all());
            return redirect(route('admin.maintain.index'))->with('success',  '正常に作成された状態を維持する');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintain $maintain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintain $maintain)
    {
        return view('admins.maintain.edit',[
            'item' => $maintain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateMaintainRequest $request, Maintain $maintain)
    {
        try {
            $maintain->update($request->all());
            return redirect(route('admin.maintain.index'))->with('success',  '更新を正常に維持する');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintain $maintain)
    {
        try {
            $maintain->update([
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            return back()->with('success',  'メンテナンスは正常に削除されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }
}
