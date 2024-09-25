<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Version;
class VersionController extends Controller
{
    /**
     * Display a listing of the version.
     */
    public function index()
    {
        $versions = Version::paginate();
        return view('admins.version.index',[
            'versions' => $versions,
        ]);
    }

    /**
     * Show the form for creating a new version.
     */
    public function create()
    {
        return view('admins.version.create');
    }

    /**
     * Store a newly created version in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'version' => 'required|max:255',
            'device' => 'required',
            'publish_date' => 'required|max:255'
        ]);

        if (isset($request->flag)) {
            $validated['flag'] = $request->input('flag');
        } else {
            $validated['flag'] = 0;
        }

        try {
            Version::create($validated);
            return redirect(route('admin.version.index'))->with('success',  'バージョンの作成に成功しました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified version.
     * @param int $id
     */
    public function show(string $id)
    {
       $version = Version::find($id);
       return view('admins.version.view',[
            'version' => $version
        ]);
    }

    /**
     * Show the form for editing the specified version.
     * @param int $id
     */
    public function edit(string $id)
    {
        $version = Version::find($id);
        return view('admins.version.edit',[
            'version' => $version
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'version' => 'required|max:255',
            'device' => 'required',
            'publish_date' => 'required|max:255'
        ]);

        if (isset($request->flag)) {
            $validated['flag'] = $request->input('flag');
        } else {
            $validated['flag'] = 0;
        }
        
        try {
            $version = Version::findOrFail($id);
            $version->version = $validated['version'];
            $version->device = $validated['device'];
            $version->publish_date = $validated['publish_date'];
            $version->flag = $validated['flag'];
            $version->save();
        
            return redirect(route('admin.version.index'))->with('success',  'バージョンが正常に更新されました');
        } catch (\Throwable $th) {
            return back()->with('error',  'Eror: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified version
     * @param int $id
     */
    public function destroy(string $id)
    {
       Version::find($id)->delete();

        return back()->with('success',  'バージョンは正常に削除されました');
    }
}
