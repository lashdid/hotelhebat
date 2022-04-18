@component('receptionist.layout')
    @slot('title')
        Detail
    @endslot
    @slot('main')
        <div class="w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">Detail</h1>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Nama Pemesan</p>
                <p>{{$guest->name}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Nama Tamu</p>
                <p>{{$guest->guest_name}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Check In</p>
                <p>{{$guest->check_in}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Check Out</p>
                <p>{{$guest->check_out}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Jumlah Kamar</p>
                <p>{{$guest->room_total}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">Tipe Kamar</p>
                <p>{{$guest->room_type}}</p>
            </div>
            <div class="border-b py-3">
                <p class="font-semibold text-sm pb-3">No. Handphone</p>
                <p>{{$guest->phone_number}}</p>
            </div>
            <div class="py-3">
                <p class="font-semibold text-sm pb-3">Email</p>
                <p>{{$guest->email}}</p>
            </div>
            @if ($guest->status)
            <div class="border-t py-3">
                <p class="font-semibold text-sm pb-3">Status</p>
                <p>{{$guest->status}}</p>
            </div>
            @endif
        </div>
    @endslot
@endcomponent