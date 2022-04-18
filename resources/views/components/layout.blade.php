<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{$title}}</title>
</head>

<body class="bg-gray-100">
  <nav class="flex fixed items-center justify-between w-full p-5 bg-white shadow-md z-20">
    <h1 class="text-2xl text-green-500 font-semibold">-hotelhebat-</h1>
    <ul class="flex space-x-5 text-gray-500">
      <li><a class="hover:text-green-500" href="/">Home</a></li>
      <li><a class="hover:text-green-500" href="/room">Kamar</a></li>
      <li><a class="hover:text-green-500" href="/facilities">Fasilitas</a></li>
    </ul>
  </nav>
  <main class="relative max-w-screen-lg py-20 space-y-10 mx-auto">
    {{$main}}
  </main>
</body>

</html>