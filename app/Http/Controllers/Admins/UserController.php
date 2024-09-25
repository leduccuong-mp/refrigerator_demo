<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $items = User::query()
                     ->orderBy('id', 'desc')
                     ->paginate(10);
        return view('admins.user.index',[
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('admins.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'birthday' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        User::create($request->all());
        return redirect(route('admin.user.index'))->with('success',  '店舗を登録しました');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'birthday' => 'required',
        ]);
        $updateData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone') ?? null,
            'birthday' => $request->get('birthday') ?? null,
        ];
        User::where('id', $id)->update($updateData);
        return back()->with('success',  '店舗情報を更新しました');
    }

    public function edit($id)
    {
        $item = User::query()
                     ->where('id', $id)
                     ->first();
        return view('admins.user.edit',[
            'item' => $item,
        ]);
    }

    public function show($id)
    {
        $item = User::query()
                     ->where('id', $id)
                     ->first();
        return view('admins.user.view',[
            'item' => $item,
        ]);
    }

    public function remove($id)
    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            return back()->with('error',  'ユーザーが見つかりません。');
        }
        $user->delete();

        return back()->with('success',  'ストアが削除されました');
    }

    public function password($id)
    {
        return view('admins.user.new-password',[
            'id' => $id,
        ]);
    }

    public function changePassword($id, Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|confirmed|min:8'
        ]);
        $user = User::find($id);
        if (!Hash::check($request->get('old_password'), $user->password)) {
            return back()->with('error',  'パスワードが正しくありません');
        }

        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return back()->with('success',  'ストアが削除されました');
    }
}
