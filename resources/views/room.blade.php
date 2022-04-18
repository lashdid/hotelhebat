@component('components.layout')
    @slot('title')
    Kamar
    @endslot
    @slot('main')
        <section class="flex relative w-full h-[20rem] shadow">
            <img class="w-full object-cover rounded" src="assets/banner.jpg" alt="banner">
            <div class="flex absolute w-full h-full bg-black bg-opacity-70 text-white rounded items-center">
                <div class="flex flex-col w-full p-5 space-y-3 text-center">
                    <h1 class="text-5xl text-white font-semibold">Melayani dengan sepenuh hati</h1>
                    <p class="text-xl font-semibold">Fasilitas lengkap dengan harga termurah</p>
                </div>
            </div>
        </section>
        @foreach ($rooms as $room)
            <section class="flex flex-col w-full bg-white shadow">
                <img class="w-full h-[20rem] object-cover rounded-t" src="assets/{{ $room->image }}" alt="banner">
                <div class="flex p-10 items-center">
                    <div class="flex flex-col w-full">
                        <h1 class="text-5xl font-semibold mb-5">Tipe {{ $room->type }}</h1>
                        <p class="text-gray-500 font-semibold">Fasilitas :</p>
                        <ul class="list-decimal text-gray-500 list-inside">
                            <li>Kamar berukuran luas {{ $room->size }} m&sup2;</li>
                            @foreach ($facilities as $facility)
                                @if ($facility->type == $room->type)
                                    <li>{{ $facility->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <p class="w-full text-center text-2xl font-semibold text-gray-500">Tersedia {{ $room->amount }} kamar</p>
                </div>
            </section>
        @endforeach
    @endslot
@endcomponent
