
@extends('Templates.Template')

@section('content')

<h1 class="text-2xl font-bold">Daftar produk</h1>

@if(session('success'))
    <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
      </div>
@endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-9">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
       <form action="/dashboard" method="get">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-2">
            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" value="{{ old('search')}}" name="search" class="block p-2 ps-10 text-sm ml-2 text-gray-900 border border-gray-300 rounded-lg w-60 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan nama barang">
        </div>
       </form>
       <form action="/produk" method="GET">
        <select name="filter" id="filter" onchange="submit()">
            <option type="submit" value="">Semua</option>
            @foreach ($kategori as $kategoriItem)
                <option type="submit" value="{{ $kategoriItem->kategori }}" {{ $kategoriItem->kategori}}>
                    {{ $kategoriItem->kategori }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>

        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex">
                 <a  href="/export"  class="text-white bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2" > <img style="margin-right: 5px" src="{{asset("image/MicrosoftExcelLogo.png")}}" alt=""> ExportExcel</a>
                <a href="/tambah-produk" class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm px-2 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2"> <img style="margin-right: 5px" src="{{asset("image/PlusCircle.png")}}" alt=""> TambahProduk</a>
                </div>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga Beli(Rp)
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga Jual(Rp)
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                 <img src="{{asset("assets/".$item->image)}}" style="width:30px; height:30px;" alt="" srcset="">
                </td>
                <td class="px-6 py-4">
                    {{$item->nama_barang}}
                </td>
                <td class="px-6 py-4">
                    {{$item->kategori}}
                </td>
                <td class="px-6 py-4">
                    {{number_format($item->harga_beli)}}
                </td>
                <td class="px-6 py-4">
                    {{number_format($item->harga_jual)}}
                </td>
                <td class="px-6 py-4">
                    {{$item->stok_barang}}
                </td>
                <td class="px-6 py-4 flex space-x-4">
                    <a href="edit-produk/{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><img src="{{asset("image/edit.png")}}" alt="" srcset=""></a>
                    <form action="produk/{{$item->id}}" method="POST" >
                        @csrf
                       @method("DELETE")
                        <button id="btn-delete" data-id="{{ $item->id }}" onclick="return confirm('apakah anda ingin menghapus data')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><img src="{{asset("image/delete.png")}}" alt="" srcset=""></button>
                    </form>
                </td>
            </tr>
         </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3 flex justify-end">
    {{ $produk->links() }}
</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function submit() {
        document.getElementById("filterForm").submit();
    }
</script>


<script>
// $(document).ready(function(){

//     var selectItem = localStorage.getItem("selected")

//     if (selectItem) {
//         $("#dropdownText").text(selectItem)
//     }

//     // $("#filter-radio-example-1").click(function(){

//     //   var text = $(this).val();

//     //   localStorage.setItem('selected', text);

//     // })

//     $("#filter-radio-example-1").on("click", function() {
//     // Get the value of the selected radio button
//     var selectedValue = $(this).val();

//     // Store the selected value in localStorage
//     localStorage.setItem('selected', selectedValue);
// });

//     $("#btn-export").click(function(){

//         $("#export").val(selectItem)

// })



// });
</script>







