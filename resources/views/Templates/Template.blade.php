<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>

 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-red-600">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="#" class="flex items-center p-2 rounded-lg dark:text-white  group">
               <img src="{{asset("image/Handbag.png")}}" alt="" srcset="">
                <span class="ms-3 text-white font-bold">SIMS Web App</span>
             </a>
          </li>
          <li>
             <a href="/produk" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-300 group">
                <img src="{{asset("image/Package.png")}}" alt="" srcset="">
                <span class="flex-1 ms-3 whitespace-nowrap">Produk</span>
             </a>
          </li>
          <li>
             <a href="/profil" class="flex items-center p-2 text-white rounded-lg  hover:bg-gray-400 group">
                <img src="{{asset("image/User.png")}}" alt="" srcset="">
                <span class="flex-1 ms-3 whitespace-nowrap">Profil</span>
             </a>
          </li>

            <form action="/logout" method="post">
                @csrf
                <li>
                    <button href="#" class="flex items-center p-2 text-white rounded-lg  hover:bg-gray-400 group">
                        <img src="{{asset("image/SignOut.png")}}" alt="" srcset="">
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                     </button>
                  </li>
            </form>
       </ul>
    </div>
 </aside>

<div class="p-4 sm:ml-64">
   @yield("content")

</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>
