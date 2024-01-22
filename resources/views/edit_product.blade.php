@extends('Templates.Template')


@section('content')

<h1 class="text-2xl font-bold">Edit produk</h1>

<form class="w-full max-w-screen-2xl mt-10" method="POST" enctype="multipart/form-data" action="/edit-produk/{{$produk->id}}">
    @method("PUT")
    @csrf
    <div class="flex  -mx-3 mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
              Kategori
            </label>
            <div class="relative">
              <select name="kategori" class=" {{ $errors->has('kategori') ? 'border-red-600' : 'border-gray-200' }} block appearance-none w-full  border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" >
                <option>Pilih kategori</option>
               @foreach ($kategori as $item)
               <option value="{{$item->kategori}}">{{$item->kategori}}</option>
               @endforeach
              </select>
              @error('kategori')
              <p class="text-red-600">{{ $message }}</p>
             @enderror
            </div>
          </div>

      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Nama Barang
        </label>
        <input name="nama_barang" class=" {{ $errors->has('nama_barang') ? 'border-red-600' : 'border-gray-200' }} appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" value="{{$produk->nama_barang}}" placeholder="Masukan nama barang">
        @error('nama_barang')
        <p class="text-red-600">{{ $message }}</p>
       @enderror
      </div>
    </div>

    <div class="flex -mx-3 mb-2">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
          Harga Beli
        </label>
        <input name="harga_beli" class=" {{ $errors->has('nama_barang') ? 'border-red-600' : 'border-gray-200' }} appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="hargaBeli" type="number" placeholder="Masukan harga beli" value="{{ $produk->harga_beli }}" >
        @error('harga_beli')
        <p class="text-red-600">{{ $message }}</p>
       @enderror
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
          Harga Jual
        </label>
        <input name="harga_jual" class=" {{ $errors->has('harga_jual') ? 'border-red-600' : 'border-gray-200' }} appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="hargaJual" type="number" placeholder="Masukan harga jual" value="{{ $produk->harga_jual}}" >
        @error('harga_jual')
        <p class="text-red-600">{{ $message }}</p>
       @enderror
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
          Stock Barang
        </label>
        <input name="stok_barang" class=" {{ $errors->has('stok_barang') ? 'border-red-600' : 'border-gray-200' }}  appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Masukan jumlah stock barang" value="{{ $produk->stok_barang }}" >
        @error('stok_barang')
        <p class="text-red-600">{{ $message }}</p>
       @enderror
      </div>
    </div>

    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 ml-2 mt-5" for="grid-city"> upload image
    </label>
<div class="flex items-center justify-center w-full mb-5">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-blue-600 border-dashed rounded-lg cursor-pointer  dark:hover:bg-bray-800  hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6 mx-3">
            <img src="{{asset("image/image.png")}}" alt="" srcset="">
            <p class="text-blue-600">Upload gambar disini</p>
        </div>
        <input name="image" id="dropzone-file" type="file" class=" hidden {{ $errors->has('stock_barang') ? 'border-red-600' : 'border-gray-200' }}" />
        @error('image')
        <p class="text-red-600">{{ $message }}</p>
       @enderror
    </label>
</div>

<div class="flex justify-end space-x-4">
    <div> <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Cancel</button></div>
    <div> <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button></div>
</div>


  </form>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
 $(document).ready(function() {
      $('#hargaBeli').on('input', function() {
        var inputValue = $(this).val();
        var sum = (inputValue*30 / 100).toFixed(2);
      $('#hargaJual').val(sum);
      });
    });
</script>


