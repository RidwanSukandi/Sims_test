<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
  <body>

    <div class="bg-white flex justify-center items-center h-screen">
<div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
  <h1 class="text-2xl text-center font-semibold mb-4">
    SIMS Web App
</h1>

  <h1 class="text-2xl text-center font-semibold mb-4">Masuk atau buat akun <span class="block">untuk mulai</span></h1>
  <form action="/login" method="POST">
   @csrf
    <div class="mb-4">
      <label class="block text-gray-600">Name</label>
      <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>

    <div class="mb-4">
      <label for="password" class="block text-gray-600">Password</label>
      <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>

    <button type="submit" class="bg-red-500 mt-4 hover:bg-red-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
  </form>
</div>
<div class="w-1/2 h-screen hidden lg:block">
    <img src="{{asset("image/Frame98699.png")}}" alt="Placeholder Image" class="object-cover w-full h-full">
  </div>
</div>
</body>
</html>
