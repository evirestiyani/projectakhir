<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;


class DataGuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::with('mataPelajaran');
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%");
            });
        }
        
    
        if ($request->has('subject') && $request->subject != '') {
            $query->whereHas('mataPelajaran', function($q) use ($request) {
                $q->where('kode', $request->subject); // kode mapel
            });
        }
    
    
        $guru = $query->paginate(10)->withQueryString();
    
        return view('admin.dataguru.index', compact('guru'));
    }
    
    public function create()
{
    $guru = Guru::all();
    return view('admin.dataguru.create');
}

public function store(Request $request)
{
    Guru::create($request->all());
    return redirect('/dataguru')->with('success', 'Guru berhasil ditambahkan.');
}

public function edit($id)
{
    $guru = Guru::findOrFail($id);
    $mapel = MataPelajaran::all(); // ✅ benar
    return view('admin.dataguru.edit', compact('guru', 'mapel'));
}

public function update(Request $request, $id)
{
    $guru = Guru::findOrFail($id);
    $guru->update($request->all());
    return redirect('/dataguru')->with('success', 'Guru berhasil diperbarui.');
}


    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.dataguru')->with('success', 'Data guru berhasil dihapus.');
    }
}
