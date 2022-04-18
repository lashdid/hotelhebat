@component('admin.layout')
    @slot('title')
        Admin - {{$form_type}} Fasilitas Kamar
    @endslot
    @slot('main')
        <div class="flex flex-col w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">{{$form_type}} Fasilitas Kamar</h1>
            <form class="flex flex-col space-y-3" action="@if($form_type == "Tambah")/admin/room-facility/add-post @else /admin/room-facility/edit-post/{{$facility->id}}@endif" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="font-semibold text-sm">Tipe Kamar</p>
                <select class="p-2 rounded bg-white border @error('type') border-red-500 @enderror text-gray-500" name="type" id="">
                    <option disabled @if($form_type == "Tambah") selected @endif hidden>Jenis Kamar</option>
                    @foreach ($rooms as $room)
                        <option value={{$room->type}} @if($form_type == 'Edit' && $room->type == $facility->type) selected @endif>{{$room->type}}</option>
                    @endforeach
                </select>
                <p class="font-semibold text-sm">Nama Fasilitas</p>
                <input class="border @error('amount') border-red-500 @enderror p-2 rounded outline-none"
                    name="name" placeholder="Masukkan Teks" value="@if($form_type == "Tambah"){{old('amount')}}@else{{$facility->name}}@endif">
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full"
                    type="submit">{{$form_type}}</button>
            </form>
        </div>
    @endslot
@endcomponent
