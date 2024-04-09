<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.header')
</head>

<body class="min-h-full bg-mainwhitebg font-poppins">
  <x-message />
  <section class="flex flex-row justify-between w-full h-auto bg-mainwhitebg">
    {{-- @include('partials.admin_head') --}}
    @include('partials.sidebar')
    @yield('content')

  </section>


  @include('partials.footer')