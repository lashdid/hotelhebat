    @component('admin.layout')
        @slot('title')
            Admin - Detail Fasilitas
        @endslot
        @slot('main')
            <div class="flex flex-col w-full bg-white shadow rounded p-5">
                <h1 class="text-4xl text-green-500 font-semibold">Detail Kamar</h1>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Nama Fasilitas</p>
                    <p>{{ $facility->name }}</p>
                </div>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Gambar Fasilitas</p>
                    <img class="w-1/3 rounded" src="/assets/{{$facility->image}}" alt="image">
                </div>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Deskripsi</p>
                    <p>{{ $facility->description }}</p>
                </div>
            </div>
        @endslot
    @endcomponent
