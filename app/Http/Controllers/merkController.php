<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{

    public function index()
    {
        $merk = Merk::latest()->get();
        return view('merk.index', compact('merk'));
    }

    public function create()
    {
        return view('merk.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_merk' => 'required|unique:merks',
        ]);

        $merk = new Merk();
        $merk->nama_merk = $request->nama_merk;
        $merk->save();
        return redirect()->route('merk.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_merk' => 'required',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->nama_merk = $request->nama_merk;
        $merk->save();
        return redirect()->route('merk.index');
    }

    public function destroy(string $id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('merk.index');

    }
}
