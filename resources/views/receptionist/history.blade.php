@component('receptionist.layout')
    @slot('title')
        Respsionis - Check In
    @endslot
    @slot('main')
        <div class="w-full bg-white shadow rounded p-5">
            <h1 class="text-4xl text-green-500 font-semibold">Riwayat</h1>
            @if (count($guests) >= 1)
            <table class="w-full border table-auto mt-10">
                <tr class="border font-semibold">
                    <td class="border p-2">Nama Pemesan</td>
                    <td class="border p-2">Nama Tamu</td>
                    <td class="border p-2">Check In</td>
                    <td class="border p-2">Check Out</td>
                    <td class="border p-2">Jumlah Kamar</td>
                    <td class="border p-2">Tipe Kamar</td>
                    <td class="border p-2">Status</td>
                    <td class="border p-2">Action</td>
                </tr>
                @foreach ($guests as $guest)
                    <tr class="border-b">
                        <td class="p-2">{{$guest->name}}</td>
                        <td class="p-2">{{$guest->guest_name}}</td>
                        <td class="p-2">{{$guest->check_in}}</td>
                        <td class="p-2">{{$guest->check_out}}</td>
                        <td class="p-2">{{$guest->room_total}}</td>
                        <td class="p-2">{{$guest->room_type}}</td>
                        <td class="p-2">
                            @if ($guest->status == 'checked_in')
                                Telah Check-In
                            @else
                                Telah Check-Out
                            @endif
                        </td>
                        <td class="flex p-2 items-center space-x-3">
                            <a href="/receptionist/history/detail/{{$guest->id}}" class="text-blue-500 hover:underline font-semibold">Detail</a>
                            <form action="/receptionist/check-out/{{$guest->id}}" method="post">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold p-2 rounded">Check Out</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @else
            <p class="text-gray-500 text-2xl font-semibold mt-5">Tidak Ada Data</p>
            @endif
        </div>
    @endslot
@endcomponent
