<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.header')
</head>
<body class="min-h-full bg-mainwhitebg font-poppins">
    <x-message />
    <section class="flex flex-row justify-between w-full h-auto bg-mainwhitebg">
<!--        @include('partials.instructorModals')-->
        @include('partials.instructorSidebar')
        
        @yield('content')
        {{-- @include('partials.instructorSideProfile') --}}
        {{-- @include('partials.instructorChatbot') --}}
        <!--@include('partials.instructorProfile')-->
    
        
    </section>
    
@include('partials.footer')