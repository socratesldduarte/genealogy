<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigation.dashboard') }} - {{session('family_name')}}
        </h2>
        <h1 class="font-semibold text-lg text-gray-800 leading-tight">
            Visualizando {{$person->name}} @if($person->birth_day) *{{$person->birth_day->format('d/m/Y')}}@endif @if($person->death_day)+{{$person->death_day->format('d/m/Y')}}@endif
        </h1>
    </x-slot>

    <div class="py-12 items-center justify-center justify-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 items-center justify-center justify-items-center">
            <?php
                //CHECKING PARENTS
                $countParents = count($person->parents);
                if ($countParents > 0) {
            ?>
            <ul role="list" class="pb-4 grid grid-cols-{{$countParents}} gap-6 sm:grid-cols-{{$countParents}} lg:grid-cols-{{$countParents}} items-center justify-center justify-items-center">
                @foreach($person->parents as $parent)
                <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-blue-50 shadow items-center justify-center justify-items-center">
                    <a href="{{route('person', ['person' => $parent])}}">
                    <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                        <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900">{{$parent->name}}</h3>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">@if($parent->birth_day) *{{$parent->birth_day->format('d/m/Y')}}@endif @if($parent->death_day)+{{$parent->death_day->format('d/m/Y')}}@endif</span>
                            </div>
                            <p class="mt-1 truncate text-sm text-gray-500">@if($parent->nick_name){{$parent->nick_name}}@endif</p>
                        </div>
                    </div>
                    @if(count($parent->parents) > 0)
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                    {{count($parent->parents)}} Pai(s)
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($parent->marriages) > 0)
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                    {{count($parent->marriages)}} Casamento(s)
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($parent->siblings) > 0)
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                    {{count($parent->siblings)}} Irmão(s)
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($parent->children) > 0)
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                    {{count($parent->children)}} Filho(s)
                                </div>
                            </div>
                        </div>
                    @endif
                    </a>
                </li>
                @endforeach
            </ul>
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
            <div class="pb-4 grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-1 items-center justify-center justify-items-center">
                <ul role="list" class="grid grid-cols-{{$cols}} gap-6 items-center justify-center justify-items-center">
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-green-50 shadow">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                            <div class="flex-1 truncate">
                                <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900">{{$person->name}}</h3>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">@if($person->birth_day) *{{$person->birth_day->format('d/m/Y')}}@endif @if($person->death_day)+{{$person->death_day->format('d/m/Y')}}@endif</span>
                                </div>
                                <p class="mt-1 truncate text-sm text-gray-500">@if($person->nick_name){{$person->nick_name}}@endif</p>
                                @can('Families update')
                                    <div class="flex items-center space-x-3">
                                        <a href="{{route('people.update', ['person' => $person])}}">
                                            <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">[EDITAR]</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    @if($countMarriages > 0)
                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-green-50 shadow">
                            <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="truncate text-sm font-medium text-gray-900">{{$countMarriages}} Casamento(s)</h3>
                                    </div>
                                    @foreach($person->marriages as $marriage)
                                        <div class="flex items-center space-x-3">
                                            <a href="{{route('person', ['person' => $marriage])}}">
                                                <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">{{$marriage->name}}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($countSiblings > 0)
                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-green-50 shadow">
                            <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="truncate text-sm font-medium text-gray-900">{{$countSiblings}} Irmão(s)</h3>
                                    </div>
                                    @foreach($person->siblings as $sibling)
                                    <div class="flex items-center space-x-3">
                                        <a href="{{route('person', ['person' => $sibling])}}">
                                            <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">{{$sibling->name}}</span>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <?php
            //CHECKING CHILDREN
            $countChildren = count($person->children);
            $intCount = 0;
            $cols = ($countChildren > 5) ? 6 : $countChildren;
            $limit = 5;
            ?>
            <div class="pb-4 grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-1 items-center justify-center justify-items-center">
                <ul role="list" class="grid grid-cols-{{$cols}} gap-1 items-center justify-center justify-items-center">
            @foreach($person->children as $child)
            <?php
                $intCount++;
                if ($intCount <= $limit) {
            ?>
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-red-50 shadow">
                        <a href="{{route('person', ['person' => $child])}}">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                            <div class="flex-1 truncate">
                                <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900">{{$child->name}}</h3>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">@if($child->birth_day) *{{$child->birth_day->format('d/m/Y')}}@endif @if($child->death_day)+{{$child->death_day->format('d/m/Y')}}@endif</span>
                                </div>
                                <p class="mt-1 truncate text-sm text-gray-500">@if($child->nick_name){{$child->nick_name}}@endif</p>
                            </div>
                        </div>
                        @if(count($child->marriages) > 0)
                            <div>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                        {{count($child->marriages)}} Casamento(s)
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($child->children) > 0)
                            <div>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="flex w-0 flex-1 relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-1 text-sm font-semibold text-gray-900">
                                        {{count($child->children)}} Filho(s)
                                    </div>
                                </div>
                            </div>
                        @endif
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
                                <h3 class="truncate text-sm font-medium text-gray-900">Outro(s) {{$countChildren - $limit}} Filho(s)</h3>
                            </div>
                            @foreach($person->children as $child)
                            <?php
                                $intCount++;
                                if ($intCount > $limit) {
                            ?>
                                <div class="flex items-center space-x-3">
                                    <a href="{{route('person', ['person' => $child])}}">
                                        <span class="inline-block flex-shrink-0 rounded-full py-0.5 text-xs font-medium">{{$child->name}}</span>
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
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <div class="bg-white py-24 sm:py-32">--}}
{{--                    <div class="mx-auto max-w-7xl px-6 lg:px-8">--}}
{{--                        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-2">--}}
{{--                            <div class="mx-auto flex max-w-xs flex-col gap-y-4">--}}
{{--                                <dt class="text-base leading-7 text-gray-600">Usuários</dt>--}}
{{--                                <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">0</dd>--}}
{{--                            </div>--}}

{{--                            <div class="mx-auto flex max-w-xs flex-col gap-y-4">--}}
{{--                                <dt class="text-base leading-7 text-gray-600">Pessoas</dt>--}}
{{--                                <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">0</dd>--}}
{{--                            </div>--}}
{{--                        </dl>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</x-app-layout>
