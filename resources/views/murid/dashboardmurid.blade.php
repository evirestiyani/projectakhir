@extends('layouts.layout')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Nilai Saya</h2>

  
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-pink-100 text-left">
                    <th class="py-2 px-4">Mata Pelajaran</th>
                    <th class="py-2 px-4">Nilai</th>
                    <th class="py-2 px-4">Keterangan</th>
                </tr>
            </thead>
        <tbody>
    @forelse($nilai as $n)
    <tr class="border-b hover:bg-pink-50">
        <td class="py-2 px-4">{{ $n->mataPelajaran->nama }}</td>
        <td class="py-2 px-4">{{ $n->nilai }}</td>
        <td class="py-2 px-4">
            @if($n->nilai >= 75)
                <span class="text-green-600">Lulus</span>
            @else
                <span class="text-red-600">Tidak Lulus</span>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3" class="py-2 px-4 text-center text-gray-500">Belum ada nilai.</td>
    </tr>
    @endforelse
</tbody>

                
        </table>
    </div>
</div>
@endsection
