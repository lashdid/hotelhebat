@component('admin.layout')
    @slot('title')
        Admin - {{$form_type}} User
    @endslot
    @slot('main')
        <div class="flex flex-col w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">{{$form_type}} User</h1>
            <form class="flex flex-col space-y-3" action="@if($form_type == "Tambah")/admin/user/add-post @else /admin/user/edit-post/{{$user->id}}@endif" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="font-semibold text-sm">Nama User</p>
                <input class="border @error('name') border-red-500 @enderror p-2 rounded outline-none" type="text" name="name"
                placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('name')}}@else{{$user->name}}@endif">
                <p class="font-semibold text-sm">Email</p>
                <input class="border @error('email') border-red-500 @enderror p-2 rounded outline-none"
                name="email" placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('email')}}@else{{$user->email}}@endif">
                <p class="font-semibold text-sm">Password</p>
                <input class="border @error('password') border-red-500 @enderror p-2 rounded outline-none" type="password"
                    name="password" placeholder="Masukkan Password">
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full"
                    type="submit">{{$form_type}}</button>
            </form>
        </div>
    @endslot
@endcomponent
