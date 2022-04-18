@if (session()->has('id'))
    <div class="flex fixed w-full h-screen bg-black bg-opacity-80 z-50 items-center">
        <section class="flex max-w-screen-md mx-auto bg-white rounded shadow">
            <div class="flex flex-col space-y-8 w-full p-10">
                <h1 class="text-2xl text-green-500 font-semibold">-hotelhebat-</h1>
                <h1 class="text-4xl text-center font-bold">TERIMA KASIH TELAH MEMESAN KAMAR DI HOTELHEBAT</h1>
                <p class="text-gray-500 text-center">Silahkan unduh bukti pemesanan anda. Bukti pemesanan akan diserahkan di hotel kepada resepsionis.</p>
                <div class="flex space-x-5 justify-center">
                    <a href="{{ route('recept', ['download' => 'pdf', 'id' => session()->get('id')]) }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-full" target="_blank">Unduh</a>
                    <a href="/" class="text-red-500 hover:text-red-600 font-semibold py-3 px-4 rounded-full">Kembali</a>
                </div>
            </div>
        </section>
    </div>
@endif
@component('components.layout')
    @slot('title')
    Form Pemesanan
    @endslot
    @slot('main')
        <section class="flex bg-white rounded shadow">
            <div class="flex flex-col space-y-3 w-1/2 p-10">
                <h1 class="text-5xl font-semibold">Form Pemesanan</h1>
                <p class="text-gray-500">Silahkan isi form berikut dengan teliti dan benar</p>
                <form class="flex flex-col space-y-3" action="{{ route('post-form') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="flex space-x-5">
                        <div class="w-full">
                            <span class="text-sm text-gray-500 font-semibold">Check In</span>
                            <input class="w-full border @error('check_in') border-red-500 @enderror p-2 rounded outline-none" name="check_in" type="text" placeholder="Pilih Tanggal"
                                value="{{ $check_in }}" onfocus="(this.type='date')" onblur="(this.type='text')"
                                min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="w-full">
                            <span class="text-sm text-gray-500 font-semibold">Check Out</span>
                            <input class="w-full border @error('check_out') border-red-500 @enderror p-2 rounded outline-none" name="check_out" type="text" placeholder="Pilih Tanggal"
                                value="{{ $check_out }}" onfocus="(this.type='date')" onblur="(this.type='text')"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        </div>
                    </div>
                    @if ($error ?? '' || session()->has('error'))
                        @if ($error == 'lower' || session()->get('error') == 'lower')
                            <p class="text-sm text-red-500">Tanggal check in tidak boleh melebihi tanggal check out!</p>                            
                        @elseif($error == 'lower' || session()->get('error') == 'same')
                            <p class="text-sm text-red-500">Tanggal check in tidak boleh sama dengan tanggal check out!</p>
                        @endif
                    @endif
                    <div class="w-full">
                        <span class="text-sm text-gray-500 font-semibold">Jumlah Kamar</span>
                        <input class="w-full border @error('room_total') border-red-500 @enderror p-2 rounded outline-none" name="room_total" type="number" placeholder="Masukkan Angka"
                            value="{{ $room_total }}" min="1">
                        @if(session()->get('error') == 'full')
                            <p class="text-sm text-red-500">Jumlah kamar tidak memenuhi</p>
                        @endif
                    </div>
                    <input class="border @error('name') border-red-500 @enderror p-2 rounded outline-none" type="text" name="name" id="" placeholder="Nama Pemesan" value="{{old('name')}}">
                    <input class="border @error('email') border-red-500 @enderror p-2 rounded outline-none" type="email" name="email" id="" placeholder="Email" value="{{old('email')}}">
                    <input class="border @error('phone_number') border-red-500 @enderror p-2 rounded outline-none" type="text" name="phone_number" id="" placeholder="No Handphone" value="{{old('phone_number')}}">
                    <input class="border @error('guest_name') border-red-500 @enderror p-2 rounded outline-none" type="text" name="guest_name" id="" placeholder="Nama Tamu"  value="{{old('guest_name')}}">
                    <p class="text-gray-500 text-xs">Bila memesan lebih dari satu kamar, nama tamu akan mewakilkan tamu lainnya
                    </p>
                    <select class="p-2 rounded bg-white border @error('room_type') border-red-500 @enderror text-gray-500" name="room_type" id="">
                        <option disabled selected hidden>Jenis Kamar</option>
                        @foreach ($rooms as $room)
                            <option value={{$room->type}} @if($room->amount == 0) hidden @endif>{{$room->type}}</option>
                        @endforeach
                    </select>
                    <p class="text-gray-500 text-xs">Jenis kamar dapat dilihat di halaman <a
                            class="text-blue-500 hover:underline" target="_blank" href="/room">'Kamar'</a></p>
                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-full"
                        type="submit">Konfirmasi Pesanan</button>
                </form>
            </div>
            <img class="w-1/2 object-cover rounded-tr rounded-br" src="assets/banner.jpg" alt="">
        </section>
    @endslot
@endcomponent
