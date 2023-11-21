@extends('mastar_admin')

@section('main')
    <div class="container mx-auto px-4 sm:px-16 mt-10">




        <div class="py-8">
            <div>
                <h2 class="text-3xl font-semibold leading-tightc text-orange-500">All Approved User </h2>
            </div>

            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>

                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Name / Email
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Balance
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Issued / Due
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                  Current-Status
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Change-Status
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                            </tr>
                        </thead>

                        @foreach ($user as $item)
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
                                                    {{ $item->name }}
                                                </p>
                                                <p class="text-gray-600 whitespace-no-wrap"> {{ $item->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->balance }}</p>
                                        <p class="text-gray-600 whitespace-no-wrap">PKR</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Sept 6, 2019</p>
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            Due 3 weeks ago
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full "></span>
                                            <span class="relative cursor-pointer">Approved</span>
                                        </span>
                                       
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                       <span
                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <a href="{{url('declined_user', $item->id )}}">    <span class="relative cursor-pointer">Declined</span></a>
                                        </span>
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative cursor-pointer">Delete</span>
                                        </span>
                                    </td>

                                </tr>




                            </tbody>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
