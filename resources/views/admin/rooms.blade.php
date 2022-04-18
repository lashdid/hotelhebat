@component('admin.layout')
@slot('title')
Admin - Kamar
@endslot
@slot('main')
<div class="flex flex-col w-full bg-white shadow rounded p-5">
    <h1 class="text-4xl text-green-500 font-semibold">Kamar</h1>
    @if (count($rooms) >= 1)
    <table class="w-full border table-auto mt-5">
        <tr class="border font-semibold">
            <td class="border p-2">Tipe Kamar</td>
            <td class="border p-2">Jumlah Kamar</td>
            <td class="border p-2">Ukuran</td>
            <td class="border p-2">Action</td>
        </tr>
        @foreach ($rooms as $room)
            <tr class="border-b">
                <td class="p-2">{{$room->type}}</td>
                <td class="p-2">{{$room->amount}}</td>
                <td class="p-2">{{$room->size}}</td>
                <td class="flex p-2 items-center space-x-3">
                    <a href="/admin/room/edit/{{$room->id}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Edit</a>
                    <form action="/admin/room/delete/{{$room->id}}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold p-2 rounded">Hapus</button>
                    </form>
                    <a href="/admin/room/detail/{{$room->id}}" class="text-blue-500 hover:underline font-semibold">Detail</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="/admin/room/add" class="mt-5 ml-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded">+ Tambah</a>
    @else
    <p class="text-gray-500 text-2xl font-semibold mt-5">Tidak Ada Data</p>
    @endif
</div>
@endslot
@endcomponent
