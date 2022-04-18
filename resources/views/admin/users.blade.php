@component('admin.layout')
@slot('title')
Admin - Users
@endslot
@slot('main')
<div class="flex flex-col w-full bg-white shadow rounded p-5">
    <h1 class="text-4xl text-green-500 font-semibold">Users</h1>
    @if (count($users) >= 1)
    <table class="w-full border table-auto mt-5">
        <tr class="border font-semibold">
            <td class="border p-2">Email</td>
            <td class="border p-2">Nama</td>
            <td class="border p-2">Password</td>
            <td class="border p-2">Action</td>
        </tr>
        @foreach ($users as $user)
            <tr class="border-b">
                <td class="p-2">{{$user->name}}</td>
                <td class="p-2">{{$user->email}}</td>
                <td class="p-2">{{$user->password}}</td>
                <td class="flex p-2 items-center space-x-3">
                    <a href="/admin/user/edit/{{$user->id}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Edit</a>
                    <form action="/admin/user/delete/{{$user->id}}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold p-2 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="/admin/user/add" class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded">+ Tambah</a>
    @else
    <p class="text-gray-500 text-2xl font-semibold mt-5">Tidak Ada Data</p>
    @endif
</div>
@endslot
@endcomponent
