@component('admin.layout')
@slot('title')
Admin - Dashboard
@endslot
@slot('main')
<div class="flex flex-col w-full bg-white shadow rounded p-5">
    <h2 class="text-2xl font-semibold mb-5">Admin</h2>
    <h1 class="text-4xl text-green-500 font-semibold">Selamat datang {{session()->get('username')}}!</h1>
</div>
@endslot
@endcomponent
