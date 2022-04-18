@component('admin.layout')
    @slot('title')
        Admin - {{$form_type}} Kamar
    @endslot
    @slot('main')
        <div class="flex flex-col w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">{{$form_type}} Kamar</h1>
            <form class="flex flex-col space-y-3" action="@if($form_type == "Tambah")/admin/room/add-post @else /admin/room/edit-post/{{$room->id}}@endif" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="font-semibold text-sm">Tipe Kamar</p>
                <input class="border @error('type') border-red-500 @enderror p-2 rounded outline-none" type="text" name="type"
                    placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('type')}}@else{{$room->type}}@endif">
                <p class="font-semibold text-sm">Jumlah Kamar</p>
                <input class="border @error('amount') border-red-500 @enderror p-2 rounded outline-none" type="number"
                    name="amount" placeholder="Masukkan Angka" value="@if($form_type == "Tambah"){{old('amount')}}@else{{$room->amount}}@endif">
                <p class="font-semibold text-sm">Ukuran Kamar (m&sup2;)</p>
                <input class="border @error('size') border-red-500 @enderror p-2 rounded outline-none" type="number"
                    name="size" placeholder="Masukkan Angka" value="@if($form_type == "Tambah"){{old('size')}}@else{{$room->size}}@endif">
                <p class="font-semibold text-sm">Gambar Kamar</p>
                @if($form_type == "Edit")
                    <img class="w-1/3 rounded" src="/assets/{{$room->image}}" alt="image">
                @endif
                <input class="border @error('image') border-red-500 @enderror p-2 rounded outline-none" type="file"
                    accept="image/png, image/jpg, image/jpeg" name="image">
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full"
                    type="submit">{{$form_type}}</button>
            </form>
        </div>
    @endslot
@endcomponent
