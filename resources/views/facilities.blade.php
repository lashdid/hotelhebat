@component('components.layout')
    @slot('title')
    Fasilitas
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
        <section class="grid grid-cols-3 gap-3">
            @foreach ($facilities as $facility)
            <div class="bg-white w-full shadow rounded">
                <img class="w-full object-cover h-[10rem] rounded-t" src="assets/{{$facility->image}}" alt="">
                <div class="p-5 space-y-3">
                    <h3 class="text-3xl font-bold">{{$facility->name}}</h3>
                    <p class="text-gray-500">{{$facility->description}}</p>
                </div>
            </div>
            @endforeach
        </section>
    @endslot
@endcomponent
