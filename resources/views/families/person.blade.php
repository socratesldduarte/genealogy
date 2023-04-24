
<x-app-layout>

    <x-slot name="header">

        <h2 class="font-extralight text-xl mb-4">
            {{ __('navigation.dashboard') }} - {{session('family_name')}}
        </h2>



        <h1 class="font-semibold text-2xl text-amber-500 leading-tight flex flex-row items-center">

{{--            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"--}}
{{--                 class="w-5 h-5  text-amber-600 me-1">--}}
{{--                <path--}}
{{--                    d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>--}}
{{--            </svg>--}}

            {{$person->name}}

        </h1>

        @if($person->birth_day)
            <div class="flex flex-row font-bold text-2xl items-center truncate">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="h-5 w-5 text-red-600 me-1">
                    <path
                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                </svg>

                {{$person->birth_day->format('d/m/Y')}}

            </div>
        @endif

        @if($person->death_day)
            <div class="flex flex-row">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     className="w-5 h-5 text-orange-800 ">
                    <path fillRule="evenodd"
                          d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
                          clipRule="evenodd"/>
                </svg>

                {{$person->death_day->format('d/m/Y')}}
            </div>
        @endif

    </x-slot>


    <div class="items-center justify-center justify-items-center">
        <div class="w-full mx-auto pb-4 sm:px-6 lg:px-8 items-center justify-center justify-items-center">

            {{--pais--}}

            <?php
            //CHECKING PARENTS
            $countParents = count($person->parents);
            $cols = $countParents;
            if ($countParents > 0) {
            ?>

            {{--            <ul role="list"--}}
            {{--                class="pb-4 grid @if($cols == 6) grid-cols-6 @else @if($cols == 5) grid-cols-5 @else @if($cols == 4) grid-cols-4 @else @if($cols == 3) grid-cols-3 @else @if($cols == 2) grid-cols-1 md:grid-cols-2  @else grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">--}}
            {{--               --}}

            <div class="flex flex-row items-center w-full pt-4 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-800">
                <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
            </svg>
            <p class="text-3xl text-blue-400 ml-2">PAIS</p>
            </div>
            <ul class=" gap-2 md:grid grid-cols-2 gap-2">
                @foreach($person->parents as $parent)

                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-blue-50 shadow items-center justify-center justify-items-center w-full border-l-8 border-l-blue-800">
                        <a href="{{route('person', ['person' => $parent])}}">

                            <div class="flex flex-col w-full space-x-6 px-6 py-4">
                                <div class="flex-1">

                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-blue-800 font-semibold text-xl">{{$parent->name}}</h3>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">
                                    @if($parent->birth_day)
                                        <div class="flex flex-row text-xl items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="h-4 w-4 text-blue-300 me-1">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                            </svg>

                                             <h3 class="font-semibold text-xl">
                                            {{$parent->birth_day->format('d/m/Y')}}
                                             </h3>

                                        </div>
                                    @endif
                                    @if($parent->death_day)
                                        +{{$parent->death_day->format('d/m/Y')}}
                                    @endif
                                </span>
                                    </div>
                                    <p class="mt-1 truncate text-xl text-blue-500">@if($parent->nick_name){{$parent->nick_name}}@endif</p>
                                </div>
                            </div>

                            <div class="p-2 grid justify-items-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-800 animate-pulse">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                                </svg>

                            </div>

{{--                            @if(count($parent->parents) > 0)--}}
{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($parent->parents)}} Pai(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(count($parent->marriages) > 0)--}}
{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($parent->marriages)}} Casamento(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(count($parent->siblings) > 0)--}}
{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($parent->siblings)}} Irmão(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(count($parent->children) > 0)--}}
{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($parent->children)}} Filho(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- fim pais--}}



            {{--pessoa--}}
            <?php
            }
            ?>
            <?php
            //CHECKING MARRIAGES
            $countMarriages = count($person->marriages);
            //CHECKING SIBLINGS
            $countSiblings = count($person->siblings);
            $cols = 1;
            if ($countSiblings > 0) {
                $cols++;
            }
            if ($countMarriages > 0) {
                $cols++;
            }
            ?>

            {{--            <div class="items-center justify-center justify-items-center">--}}
            {{--                    <div class="w-full mx-auto sm:px-6 lg:px-8 items-center justify-center justify-items-center">--}}

            {{--            <div class="w-full pb-4 grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-1 items-center justify-center justify-items-center">--}}
            {{--            <ul role="list"--}}
            {{--                class="pb-4 grid @if($cols == 6) grid-cols-1 md:grid-cols-6 @else @if($cols == 5) grid-cols-1 md:grid-cols-5 @else @if($cols == 4) grid-cols-1 md:grid-cols-4 @else @if($cols == 3) grid-cols-1 md:grid-cols-3 @else @if($cols == 2) grid-cols-1 md:grid-cols-2 @else grid-cols-1 md:grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">--}}


            <div class="flex flex-row items-center w-full pt-4 pb-2 pl-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-600">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
                <p class="text-3xl text-amber-400 ml-2">DESTAQUE</p>
            </div>

            <ul class="pl-2">
                <li class="col-span-1 divide-y divide-amber-200 rounded-lg  shadow bg-amber-200 border-l-8 border-l-amber-600">
                    <div class="flex flex-col w-full space-x-6 px-6 py-4">
                        <div class="flex-1 truncate">
                            <p class="mt-1 truncate text-3xl font-bold text-amber-600">@if($person->nick_name){{$person->nick_name}}@endif</p>

                            <div class="flex items-center space-x-3">
                                <h3 class="text-xl font-bold">{{$person->name}}</h3>
                            </div>
                            <div class="flex flex-row items-center space-x-3">

                                    <span
                                        class="flex flex-row inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium items-center">
                                        @if($person->birth_day)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-4 h-4 text-red-700 me-1">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                            </svg>
                                            <p class="font-bold text-xl items-center">{{$person->birth_day->format('d/m/Y')}}</p>
                                        @endif
                                        @if($person->death_day)+{{$person->death_day->format('d/m/Y')}}@endif</span>
                            </div>

                            @can('Families update')
                                <div class="flex space-x-3">
                                    <a href="{{route('people.edit', ['person' => $person])}}"
                                       class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <span class="text-xs font-medium">EDITAR</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </li>


            </ul>
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--FIM pessoa--}}




            {{-- irmaos--}}
            @if($countSiblings > 0)

                <div class="flex flex-row items-center w-full pt-4 pb-2 pl-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-700">
                        <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                        <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                    </svg>
                    <p class="text-3xl text-green-600 ml-2">{{$countSiblings}} IRMÃO(S)</p>
                </div>

                <ul class="pl-2">
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-green-50 shadow w-full border-l-8 border-l-green-700">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-4">
                            <div class="flex-1 truncate">
{{--                                <div class="flex items-center space-x-3">--}}
{{--                                    <h3 class="truncate text-xl font-bold text-green-700">{{$countSiblings}}--}}
{{--                                    IRMÃO(S)</h3>--}}
{{--                                </div>--}}
                                @foreach($person->siblings as $sibling)
                                    <div class="flex flex-row items-center space-x-3 truncate">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-green-600 animate-pulse">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>

                                        <a href="{{route('person', ['person' => $sibling])}}">
                                            <span
                                                class="inline-block flex-shrink-0 rounded-full py-1.5 text-xl font-bold text-green-800 items-center truncate">{{$sibling->name}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            @endif

            {{-- FIM irmaos--}}

            {{-- casamento--}}
            @if($countMarriages > 0)
                <div class="flex flex-row items-center w-full pt-4 pb-2 pl-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-600">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                    </svg>
                    <p class="text-3xl text-amber-400 ml-2">CASAMENTO</p>
                </div>

                <ul class="pl-2">
                    <li class="col-span-1 divide-y rounded-lg bg-amber-200 shadow w-full border-l-8 border-l-amber-600">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-4">
                            <div class="flex-1 truncate">
{{--                                <div class="flex items-center space-x-3">--}}
{{--                                    <h3 class="truncate text-xl font-bold text-amber-500">{{$countMarriages}}--}}
{{--                                        CASAMENTO(S)</h3>--}}
{{--                                </div>--}}
                                @foreach($person->marriages as $marriage)
                                    <div class="flex items-center space-x-3">
                                        <a href="{{route('person', ['person' => $marriage])}}">
                                            <span
                                                class="inline-block flex-shrink-0 rounded-full py-0.5 text-xl font-bold text-amber-600">{{$marriage->name}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-2 grid justify-items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-amber-600 animate-pulse">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>

                        </div>
                    </li>
                </ul>
            @endif
            {{-- FIM casamento--}}


            {{--filhos--}}
            <?php
            //CHECKING CHILDREN
            $countChildren = count($person->children);
            $intCount = 0;
            $cols = ($countChildren > 5) ? 6 : $countChildren;
            $limit = 20;
            ?>
            {{--            <div class="w-full pb-4 grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-1 items-center justify-center justify-items-center">--}}
            {{--                <ul role="list" class="pb-4 grid @if($cols == 6) grid-cols-1 md:grid-cols-6 @else @if($cols == 5) grid-cols-1 md:grid-cols-5 @else @if($cols == 4) grid-cols-1 md:grid-cols-4 @else @if($cols == 3) grid-cols-1 md:grid-cols-3 @else @if($cols == 2) grid-cols-1 md:grid-cols-2 @else grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">--}}

            @if($countChildren > 0)
            <div class="flex flex-row items-center w-full pt-4 pb-2 pl-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-red-800">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                </svg>
                <p class="text-3xl text-red-300 ml-2">FILHOS</p>
            </div>
            @endif




            <ul class="pl-4">
            @foreach($person->children as $child)
                <?php
                $intCount++;
                if ($intCount <= $limit) {
                ?>



                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-red-50 shadow border-l-8 border-l-red-700">
                        <a href="{{route('person', ['person' => $child])}}">
                            <div class="flex w-full items-center justify-between space-x-6 px-6 py-4">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="truncate text-xl font-bold text-red-900">{{$child->name}}</h3>
                                    </div>
                                    <div class="flex items-center space-x-2">

                                            @if($child->birth_day)

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     fill="currentColor" class="w-4 h-4 text-red-700 items-center">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                            </svg>
                                                <p class="font-bold text-xl items-center">{{$child->birth_day->format('d/m/Y')}}</p>



                                            @endif @if($child->death_day)
                                                +{{$child->death_day->format('d/m/Y')}}@endif
                                    </div>
                                    <p class="mt-1 truncate font-medium text-xl text-red-400">@if($child->nick_name){{$child->nick_name}}@endif</p>
                                </div>
                            </div>
{{--                            @if(count($child->marriages) > 0)--}}

{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($child->marriages)}} Casamento(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if(count($child->children) > 0)--}}
{{--                                <div>--}}
{{--                                    <div class="-mt-px flex divide-x divide-gray-200">--}}
{{--                                        <div--}}
{{--                                            class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">--}}
{{--                                            {{count($child->children)}} Filho(s)--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}

                            <div class="p-2 grid justify-items-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 animate-pulse">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                                </svg>

                            </div>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    @endforeach
                    <?php
                    if ($countChildren > $limit) {
                    $intCount = 0;
                    ?>
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-red-50 shadow">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                            <div class="flex-1 truncate">
                                <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900">
                                        Outro(s) {{$countChildren - $limit}} Filho(s)</h3>
                                </div>
                                @foreach($person->children as $child)
                                    <?php
                                    $intCount++;
                                    if ($intCount > $limit) {
                                    ?>
                                    <div class="flex items-center space-x-3 truncate">
                                        <a href="{{route('person', ['person' => $child])}}">
                                            <span
                                                class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">{{$child->name}}</span>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                @endforeach
                            </div>
                        </div>


                    </li>
                    <?php
                    }
                    ?>
                </ul>

        </div>
    </div>
</x-app-layout>
