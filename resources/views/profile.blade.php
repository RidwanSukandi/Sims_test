@extends('Templates.Template')


@section('content')


<img class="rounded-full w-48 h-48 object-cover" src="{{asset('image/Foto.jpeg')}}" alt="image description">


@if (Auth::check())
    <h1 class="text-6xl mt-5">{{ Auth::user()->name }}</h1>




    <p class="my-4">Nama Kandidat</p>

    <span class="bg-blue-100 text-blue-800 text-2xl font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">@ {{ Auth::user()->name }} </span>

    <p class="my-4">Posisi Kandidat</p>

    <span class="bg-blue-100 text-2xl text-blue-800  font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">@ {{ Auth::user()->posisi }} </span>
@else
    <p>Not authenticated</p>
@endif


@endsection
