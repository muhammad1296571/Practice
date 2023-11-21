<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-5">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  border-x-2 border-orange-500">
                    <div class="p-6 text-gray-900 flex gap-4">
                        <img src="./image/mobile-downloadApp-orange.webp" alt="" width="20%">
                        <h1 class="text-xl font-bold my-auto">{{ Auth::user()->name }} <br> Balance : <span
                                class="text-orange-500"> {{ Auth::user()->balance }} PKR</span>
                        </h1>






                    </div>
                </div>

                @if ($role_user == 'pending')
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  border-x-2 border-orange-500"
                        id="content">
                        <div class="grid grid-cols-2">
                            <div class="p-6 text-gray-900 flex py-10 gap-2 ">
                                <img src="./image/icons8-transfer-64.png" alt="" width="20%">
                                <a href="{{ route('send_money') }}" class="text-sm ">
                                    <button
                                        class="font-bold my-auto bg-orange-500 p-2 rounded-lg text-white mt-1  flex gap-1"
                                        disabled>Send Money <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                        </svg> </button>

                                </a>
                            </div>




                            <div class="p-6 text-gray-900 flex py-10 gap-2">
                                <img src="./image/icons8-cash-in-hand-96.png" alt="" width="20%">
                                <button class="text-xl font-bold my-auto" id="btn">Recive Money</button>

                            </div>



                        </div>

                    </div>
@endif

 @if ($role_user == 'approved')
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  border-x-2 border-orange-500"
            id="content" >
            <div class="grid grid-cols-2">
                <div class="p-6 text-gray-900 flex py-10 gap-2 ">
                    <img src="./image/icons8-transfer-64.png" alt="" width="20%">
                    <a href="{{ route('send_money') }}">
                        <h1
                            class="text-sm  flex gap-1 font-bold my-auto bg-orange-500 p-2 rounded-lg text-white mt-1 ">
                            Send Money
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                            </svg>
                        </h1>
                    </a>
         </div>




                <div class="p-6 text-gray-900 flex py-10 gap-2" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mt-1 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>

                    <button class="text-xl font-bold my-auto" id="remove_btn">Go To <span class="text-red-500">Remove</span> </button>

                        
                    

                   

                </div>
               



            </div>

        </div>
@endif

</div>




@if ($role_user == 'approved')

<div class="container mx-auto px-4 sm:px-8 mt-10" id="normal_table">
        <div class="py-8">
            <div>
                <h2 class="text-3xl font-semibold leading-tightc text-orange-500"> Transition</h2>
            </div>
 <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
 <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal" >
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Sender / Reciver
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Amount
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Issued / Due
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
            </tr>
        </thead>

        @foreach ($user_send_or_recive as $item)
            <tbody>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                    alt="" />
                            </div>

                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->user->name }}
                                </p>
                                <p class="text-gray-600 whitespace-no-wrap">
                                    {{ $item->user->email }}</p>
                            </div>{{ $item->name }}
                        </div>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class=" whitespace-no-wrap text-red-600"> - {{ $item->amount }}
                            PKR</p>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->created_at }}
                        </p>

                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Success</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm text-center ">
                        <div class=" text-red-600 flex gap-5">
                            <button
                                class=" hover:text-red-800   bg-red-200  rounded-lg py-2 px-4" id="open_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                                <button
                                    class=" hover:text-red-600 bg-red-200 rounded-lg py-2 px-4" id="r_open_modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>


                                </button>

                                <div class="modal" id="modal_body">
                                    <div class="modal-content">
                                        <span
                                            class="text-4xl text-black" id="close_modal">×</span>
                                        
    <div class="my-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-red mx-auto mt-10 mb-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                          

                                            <p class="mb-5 text-lg font-bold">Are You Sure Want To Delete This Trancation ! </p>
                                         <a href="{{url('delete', $item->id )}}"> 
                                        
                                            <button class="mt-10 bg-red-500 py-2 px-5 rounded-lg text-white">
                                                        Yes Delete it  </button></a>  



                                            </div>
                                            

                                    </div>
                                </div>
    <div class="modal" id="r_modal_body">
                                    <div class="modal-content">
                                        <span
                                            class="text-4xl text-black" id="r_close_modal">×</span>
                                        
                                                <div class="my-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-red mx-auto mt-10 mb-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />

                                        </svg>

                                            <p class="mb-5 text-lg font-bold">Are You Sure Want To Remove This Trancation ! </p>
                                                 <a href="{{url('move_trash', $item->id )}}"> 

                                            <button class="mt-10 bg-red-500 py-2 px-5 rounded-lg text-white">
                                                Yes Remove it

                                            </button>
                                                 </a>
                                            </div>
                                            

    </div>
                                </div>
                

                   </div>
            </td>
              </tr>
              </tbody>
                  @endforeach
                       </table>

            
 


                            </div>
                              </div>
                                </div>
 </div>
    @endif
                                    
@if ($user_remove)

    <div class="container mx-auto px-4 sm:px-8 mt-10" id="remove_table" style="display: none">
        <div class="py-8">
            <div>
                <h2 class="text-3xl font-semibold leading-tightc text-orange-500">Removed Transition</h2>
            </div>
 <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
 <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Sender / Reciver
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Amount
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Issued / Due
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
            </tr>
        </thead>

        @foreach ($user_remove as $item)
            <tbody>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                    alt="" />
                            </div>

                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->user->name }}
                                </p>
                                <p class="text-gray-600 whitespace-no-wrap">
                                    {{ $item->user->email }}</p>
                            </div>{{ $item->name }}
                        </div>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class=" whitespace-no-wrap text-red-600"> - {{ $item->amount }}
                            PKR</p>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->created_at }}
                        </p>

                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative">Remove</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm text-center ">
                        <div class=" text-red-500 flex gap-5">
                                     <a href="{{url('change', $item->id )}}"> 

                            <button
                                class=" hover:text-green-600   bg-green-200 text-green-800  rounded-lg py-2 px-4" id="open_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
 </svg>
                            </button>
                                     </a>
                                <button
                                    class=" hover:text-red-800 text-red-500 bg-red-200 rounded-lg py-2 px-4" id="d">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg> 



                                </button>

                                <div class="modal" id="m">
                                    <div class="modal-content">
                                        <span
                                            class="text-4xl text-black" id="c">×</span>
                                        
    <div class="my-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-red mx-auto mt-10 mb-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                          

                                            <p class="mb-5 text-lg font-bold">Are You Sure Want To Delete This Trancation ! </p>
                                         <a href="{{url('delete', $item->id )}}"> 
                                        
                                            <button class="mt-10 bg-red-500 py-2 px-5 rounded-lg text-white">
                                                        Yes Delete it  </button></a>  



                                            </div>
                                            

                                    </div>
                                </div>
  

            </td>
              </tr>
              </tbody>
                  @endforeach
                       </table>

            
 


                            </div>
                              </div>
                                </div>
                                  </div>
@endif
</div>


        @if ($role_user == 'pending')
            <div class="bg-orange-500 p-5 text-white rounded  border-x-2 border-cyan-500 mx-40 my-10">
                <h1 class="text-lg">Hy ! your Account has Been created But you cant send money  because your not approved by admin site se please wite for approvel than you can do anything whats you want  </h1>
            </div>
        @endif




    </div>

    </div>
  <style>
                    #m {
                        position: fixed;
                        left: 0;
                        top: 0;
                        display: none;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(185, 185, 185, 0.5);
                        transform: scale(1.1);
                        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
                    }

                    .modal-content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        padding: 1rem 1.5rem;
                        width: 30rem;
                        border-radius: 0.5rem;
                    }

                    #c {
                        float: right;
                        width: 2rem;
                        line-height: 1.5rem;
                        text-align: center;
                        cursor: pointer;
                        border-radius: 0.25rem;
                        padding: 5px;
                    }

                    #c:hover {
                        background-color: red;
                        padding: 5px;
                        color: antiquewhite;

                    }
                       #modal_body {
                        position: fixed;
                        left: 0;
                        top: 0;
                        display: none;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(185, 185, 185, 0.5);
                        transform: scale(1.1);
                        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
                    }

                   

                    #close_modal {
                        float: right;
                        width: 2rem;
                        line-height: 1.5rem;
                        text-align: center;
                        cursor: pointer;
                        border-radius: 0.25rem;
                        padding: 5px;
                    }

                    #close_modal:hover {
                        background-color: red;
                        padding: 5px;
                        color: antiquewhite;

                    }
                       #r_modal_body {
                        position: fixed;
                        left: 0;
                        top: 0;
                        display: none;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(185, 185, 185, 0.5);
                        transform: scale(1.1);
                        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
                    }

                    

                    #r_close_modal {
                        float: right;
                        width: 2rem;
                        line-height: 1.5rem;
                        text-align: center;
                        cursor: pointer;
                        border-radius: 0.25rem;
                        padding: 5px;
                    }

                    #r_close_modal:hover {
                        background-color: red;
                        padding: 5px;
                        color: antiquewhite;

                    }
  </style>


    <script>

                    //modal for delete trancition
                    const open_mod  =   document.getElementById("open_modal");
                     const  mod_body =   document.getElementById("modal_body");
                     const close_mod = document.getElementById("close_modal");


                   //modal for remove trancition
                    const r_open_modal  =   document.getElementById("r_open_modal");
                     const r_modal_body =   document.getElementById("r_modal_body");
                     const r_close_modal = document.getElementById("r_close_modal");

                   

                    //for remove trancation
                     const remove_btn = document.getElementById("remove_btn");
                     const normal_table  =   document.getElementById("normal_table");
                     const  remove_table =   document.getElementById("remove_table");
                    //
                     const go_remove  =   document.getElementById("go_remove");
                     

                    //modal for remove trancition delete
                    const open_m  =   document.getElementById("m");
                     const close_btn =   document.getElementById("c");
                     const delete_t = document.getElementById("d");

                     // man modal
                      close_btn.addEventListener('click', function () {


                        open_m.style.display="none";
                        



                    });

                    open_mod.addEventListener('click', function () {


                        mod_body.style.display="flex";
                        



                    });
                     close_mod.addEventListener('click', function () {


                        mod_body.style.display="none";



                    });



                    r_open_modal.addEventListener('click', function () {


                        r_modal_body.style.display="flex";



                    });
                     r_close_modal.addEventListener('click', function () {


                        r_modal_body.style.display="none";



                    });
               
                         //modal for remove trancition delete

                    delete_t.addEventListener('click', function () {


                        open_m.style.display="flex";
                        



                    });

                    
                      remove_btn.addEventListener('click', function () {



                        normal_table.style.display="none";
                        remove_table.style.display="block";

                        go_remove.style.display="none";
                        go_back.style.display="block";



                    });

                   
                     
                


                     

    </script>
</x-app-layout>
