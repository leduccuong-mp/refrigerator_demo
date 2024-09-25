<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Rfid;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Rfid::query()
                     ->whereHas('product', function($q) {
                        $q->whereNull('deleted_at');
                     })
                     ->whereNull('deleted_at')
                     ->orderBy('id', 'desc')
                     ->paginate();
        return view('admins.rfid.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rfid $rfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rfid $rfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rfid $rfid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rfid $rfid)
    {
        //
    }
}
