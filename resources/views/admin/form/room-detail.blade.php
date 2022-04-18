    @component('admin.layout')
        @slot('title')
            Admin - Detail Kamar
        @endslot
        @slot('main')
            <div class="flex flex-col w-full bg-white shadow rounded p-5">
                <h1 class="text-4xl text-green-500 font-semibold">Detail Kamar</h1>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Tipe Kamar</p>
                    <p>{{ $room->type }}</p>
                </div>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Gambar Kamar</p>
                    <img class="w-1/3 rounded" src="/assets/{{$room->image}}" alt="image">
                </div>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Jumlah Kamar</p>
                    <p>{{ $room->amount }}</p>
                </div>
                <div class="border-b py-3">
                    <p class="font-semibold text-sm pb-3">Ukuran Kamar</p>
                    <p>{{ $room->size }}</p>
                </div>
            </div>
        @endslot
    @endcomponent
