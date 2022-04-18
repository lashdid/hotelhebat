@component('admin.layout')
@slot('title')
Admin - Kamar
@endslot
@slot('main')
<div class="flex flex-col w-full bg-white shadow rounded p-5">
    <h1 class="text-4xl text-green-500 font-semibold">Fasilitas Kamar</h1>
    @if (count($facilities) >= 1)
    <table class="w-full border table-auto mt-5">
        <tr class="border font-semibold">
            <td class="border p-2">Tipe Kamar</td>
            <td class="border p-2">Nama Fasilitas</td>
            <td class="border p-2">Action</td>
        </tr>
        @foreach ($facilities as $facility)
            <tr class="border-b">
                <td class="p-2">{{$facility->type}}</td>
                <td class="p-2">{{$facility->name}}</td>
                <td class="flex p-2 items-center space-x-3">
                    <a href="/admin/room-facility/edit/{{$facility->id}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Edit</a>
                    <form action="/admin/room-facility/delete/{{$facility->id}}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold p-2 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="flex w-full justify-between mt-5">
        <div>
            <a href="{{$facilities->previousPageUrl()}}" class="@if($facilities->onFirstPage()) hidden @endif ml-auto bg-amber-500 hover:bg-amber-600 text-white font-semibold p-2 rounded">Kembali</a>
            <a href="{{$facilities->nextPageUrl()}}" class="@if(!$facilities->hasMorePages()) hidden @endif ml-auto bg-amber-500 hover:bg-amber-600 text-white font-semibold p-2 rounded">Selanjutnya</a>
        </div>
        <a href="/admin/room-facility/add" class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded">+ Tambah</a>
    </div>
    @else
    <p class="text-gray-500 text-2xl font-semibold mt-5">Tidak Ada Data</p>
    @endif
</div>
@endslot
@endcomponent
