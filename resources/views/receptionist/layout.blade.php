<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{$title}}</title>
</head>

<body class="flex bg-gray-100">
  <nav class="fixed w-1/6 h-screen py-10 bg-white shadow-md space-y-5">
    <h1 class="text-2xl text-green-500 font-semibold text-center">-hotelhebat-</h1>
    <ul class="text-gray-500">
      <a href="/receptionist"><li class="py-2 pl-3 hover:bg-gray-200 hover:text-green-500">Check In</li></a>
      <a href="/receptionist/history"><li class="py-2 pl-3 hover:bg-gray-200 hover:text-green-500">Riwayat</li></a>
      <a href="/logout"><li class="py-2 pl-3 hover:bg-gray-200 hover:text-red-500">Log Out</li></a>
    </ul>
  </nav>
  <main class="w-5/6 p-10 ml-auto">
    {{$main}}
  </main>
</body>

</html>