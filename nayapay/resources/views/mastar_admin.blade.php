<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>NayaPay</title>
</head>
<body>

 
  
  <div class="bg-gray-100 py-4 px-4 border-x-2 border-orange-400 rounded-lg flex gap-3 my-8 mx-16">
           <a href="/"><button class="bg-orange-500 rounded-lg text-white py-1 px-4"> Home </button></a>
           <a href="{{route('Transaction')}}"> <button class="border border-orange-600 rounded-lg text-orange-600 py-1 px-4 font-bold"> User-Transaction </button></a>
           <a href="{{route('user_tax')}}">    <button class="bg-orange-500 rounded-lg text-white py-1 px-4"> Profite </button></a>
           <a href="{{route('dashboard')}}">   <button class="bg-orange-500 rounded-lg text-white py-1 px-4"> User's </button></a>
           <a href="{{route('approved')}}">    <button class="bg-orange-500 rounded-lg text-white py-1 px-4"> Approved </button></a> 
           <a href="{{route('declined')}}">    <button class="bg-orange-500 rounded-lg text-white py-1 px-4"> Declined </button></a>
    </div>



    @yield('main')
    
</body>
</html>