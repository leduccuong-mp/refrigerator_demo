<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Admin::query()
                     ->orderBy('id', 'desc')
                     ->paginate(10);
        return view('admins.admin.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        Admin::create($request->all());
        return redirect(route('admin.admin.index'))->with('success',  '管理者が正常に作成されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::where('id',$id)->first();
        return view('admins.admin.view',[
            'item' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::where('id',$id)->first();
        return view('admins.admin.edit',[
            'item' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $admin = Admin::where('id',$id)->first();
        $admin->update($request->all());
        return back()->with('success',  '管理者は正常に更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::where('id',$id)->first();
        $admin->update([
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success',  '管理者は正常に削除されました');
    }

    public function password($id)
    {
        return view('admins.admin.new-password',[
            'id' => $id,
        ]);
    }

    public function changePassword($id, Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|confirmed|min:8'
        ]);
        $admin = Admin::find($id);
        if (!Hash::check($request->get('old_password'), $admin->password)) {
            return back()->with('error',  'パスワードが正しくありません');
        }

        $admin->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return back()->with('success',  'ストアが削除されました');
    }
}
