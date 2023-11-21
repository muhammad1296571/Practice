@extends('website.mastar')

@section('main')

<x-guest-layout>
    <form method="POST" action="{{ route('contect') }}">
        @csrf
 <div class="my-10 flex  justify-center">
<img src="./image/images.png" alt="">
        </div>

        <div class="mt-4">
                @if (Session::has('success'))
              
                    <div class="bg-green-500 p-2 rounded-lg" id="success">
                        <div class="text-lg text-white font-bold flex">

                            <h1 class="flex gap-2">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-check my-auto" viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg>

                                Hy ! {{ Session::get('success') }}

                            </h1>



                        </div>


                    </div>
 @elseif(Session::has('failed'))
                    <div class="bg-red-500 p-2  rounded-lg" id="fail">
                        <div class="text-lg text-white font-bold flex">

                            <h1 class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                Hy ! {{ Session::get('failed') }}

                            </h1>
                            <p class="mx-auto">



                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </p>


                        </div>


                    </div>
                @endif
        </div>

        @if ($user)
               <div class="mt-4">
                <div class="relative w-full border-none">
                   <x-input-label for="text" :value="__('Email')" class="my-1" />

                    <select class=" border-gray-300 focus:border-[#c2410c] focus:ring-[#fb923c] rounded-md shadow-sm w-full"
                        name="user_id">
                        
                        <option class="pt-6" value="{{Auth()->user()->id}}">{{Auth()->user()->email}}</option>



                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                        @endif

                
         <div class="mt-4">
            <x-input-label for="text" :value="__('Discripation')" />
            <x-text-input id="text" class="block mt-1 w-full" type="text" name="subject" :value="old('descripation')"  />
            <x-input-error :messages="$errors->get('descripation')" class="mt-2" />
        </div>
     
         @if ($user)
               <x-primary-button class="my-3">
                {{ __('Submit') }}
            </x-primary-button>
                    @endif


            @if(!$user){
                <x-primary-button class="my-3">
                        <a href="{{route('login')}}">
                            {{ __('Login') }}
                            </a>
                        </x-primary-button>
                

            }
                    @endif

       
          
        </div>
    </form>
      <script>
                        setTimeout(() => {

                            document.getElementById("success").style.display = 'none';
                            document.getElementById("fail").style.display = 'none';


                        }, 5000);
                    </script>
</x-guest-layout>
@endsection
