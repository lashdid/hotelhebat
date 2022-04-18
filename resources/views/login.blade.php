<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Login</title>
</head>

<body>
    <div class="flex w-full h-screen items-center bg-gray-100">
        <div class="w-[25rem] p-5 mx-auto bg-white rounded shadow space-y-3">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold">Login</h2>
                <h1 class="text-2xl text-green-500 font-semibold">-hotelhebat-</h1>
            </div>
            <form class="flex flex-col space-y-3" action="/check-login" method="POST">
                @csrf
                <input class="border @error('email') border-red-500 @enderror p-2 rounded outline-none" type="text" name="email" placeholder="Email" value="{{old('email')}}" autofocus>
                <input class="border @error('password') border-red-500 @enderror p-2 rounded outline-none" type="password" name="password" placeholder="Password">
                @if (session()->has('error'))
                    <p class="text-sm text-red-500">Email dan password tidak terdaftar. Pastikan email dan password benar.</p>
                @endif
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>