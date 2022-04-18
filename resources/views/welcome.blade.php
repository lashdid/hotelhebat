@component('components.layout')
    @slot('title')
    hotelhebat
    @endslot
    @slot('main')
        <section>
            <div class="flex relative w-full h-[20rem] shadow">
                <img class="w-full object-cover rounded" src="assets/banner.jpg" alt="banner">
                <div class="flex absolute w-full h-full bg-black bg-opacity-70 text-white rounded items-center">
                    <div class="flex flex-col w-full p-5 space-y-3 text-center">
                        <h1 class="text-5xl text-white font-semibold">Melayani dengan sepenuh hati</h1>
                        <p class="text-xl font-semibold">Fasilitas lengkap dengan harga termurah</p>
                    </div>
                </div>
            </div>
            <div class="relative bg-white shadow rounded-full py-4 px-8 -mt-10 mx-4 z-10">
                <form class="flex w-full space-x-5" action="{{ route('form') }}">
                    <div class="w-full">
                        <span class="text-sm font-semibold">Check In</span>
                        <input name="check_in" class="w-full outline-none text-gray-500" type="text" placeholder="Pilih Tanggal"
                            onfocus="(this.type='date')" onblur="(this.type='text')" min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="w-full">
                        <span class="text-sm font-semibold">Check Out</span>
                        <input name="check_out" class="w-full outline-none text-gray-500" type="text"
                            placeholder="Pilih Tanggal" onfocus="(this.type='date')" onblur="(this.type='text')"
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                    </div>
                    <div class="w-full">
                        <span class="text-sm font-semibold">Jumlah Kamar</span>
                        <input name="room_total" class="w-full outline-none text-gray-500" type="number" name="" id=""
                            placeholder="Masukkan Angka" min="1">
                    </div>
                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold px-3 rounded-full"
                        type="submit">Pesan</button>
                </form>
            </div>
        </section>
        <section class="flex bg-white shadow rounded">
            <div class="w-1/2 p-10 space-y-5">
                <h1 class="text-5xl font-semibold">Tentang Kami</h1>
                <p class="text-gray-500 text-justify">Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan
                    yang indah, danau, dan sawah
                    menghijau. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam
                    yang memukau; Kid's Club yang luas menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi
                    kenyamanan keluarga. Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di
                    Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggara konversi M.I.C.E ataupun
                    mewujudkan acara pernikahan adat yang mewah</p>
            </div>
            <img class="w-1/2 object-cover rounded-tr rounded-br" src="assets/section2.jpg" alt="">
        </section>
    @endslot
@endcomponent
