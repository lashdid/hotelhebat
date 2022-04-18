@component('admin.layout')
    @slot('title')
        Admin - {{$form_type}} Fasilitas
    @endslot
    @slot('main')
        <div class="flex flex-col w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">{{$form_type}} Fasilitas</h1>
            <form class="flex flex-col space-y-3" action="@if($form_type == "Tambah")/admin/facility/add-post @else /admin/facility/edit-post/{{$facility->id}}@endif" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="font-semibold text-sm">Nama Fasilitas</p>
                <input class="border @error('name') border-red-500 @enderror p-2 rounded outline-none" type="text" name="name"
                placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('name')}}@else{{$facility->name}}@endif">
                <p class="font-semibold text-sm">Gambar Fasilitas</p>
                @if($form_type == "Edit")
                    <img class="w-1/3 rounded" src="/assets/{{$facility->image}}" alt="image">
                @endif
                <input class="border @error('image') border-red-500 @enderror p-2 rounded outline-none" type="file"
                    accept="image/png, image/jpg, image/jpeg" name="image">
                <p class="font-semibold text-sm">Deskripsi</p>
                <input class="border @error('description') border-red-500 @enderror p-2 rounded outline-none"
                    name="description" placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('description')}}@else{{$facility->description}}@endif">
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full"
                    type="submit">{{$form_type}}</button>
            </form>
        </div>
    @endslot
@endcomponent
