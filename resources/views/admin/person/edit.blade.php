<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edição de Pessoa - {{session('family_name')}}
        </h2>
        <h1 class="font-semibold text-lg text-gray-800 leading-tight">
            {{$person->name}} @if($person->birth_day) *{{$person->birth_day->format('d/m/Y')}}@endif @if($person->death_day)+{{$person->death_day->format('d/m/Y')}}@endif
        </h1>
    </x-slot>

    <div class="py-12 items-center justify-center justify-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 items-center justify-center justify-items-center">
            <?php
                //CHECKING PARENTS
                $countParents = count($person->parents);
                $cols = $countParents;
                if ($countParents > 0) {
            ?>
            <ul role="list" class="pb-4 grid @if($cols == 6) grid-cols-6 @else @if($cols == 5) grid-cols-5 @else @if($cols == 4) grid-cols-4 @else @if($cols == 3) grid-cols-3 @else @if($cols == 2) grid-cols-2 @else grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">
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
                <ul role="list" class="pb-4 grid @if($cols == 6) grid-cols-6 @else @if($cols == 5) grid-cols-5 @else @if($cols == 4) grid-cols-4 @else @if($cols == 3) grid-cols-3 @else @if($cols == 2) grid-cols-2 @else grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">
                    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-green-50 shadow gap-6">
                        <div class="flex w-full items-center justify-between space-x-6 px-6 py-1">
                            <div class="flex-1 truncate">
                                <form method="post" action="{{route('people.update', ['person' => $person])}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="space-y-12">
                                        <div class="border-b border-gray-900/10 pb-12">
                                            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-2">
                                                <div class="pb-2">
                                                    <label for="gender" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Sexo</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <select name="gender" id="gender" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('gender') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif">
                                                            <option value="male"@if(old('gender') == '') @if($person->gender == 'male') selected @endif @else @if(old('gender') == 'male') selected @endif @endif>Masculino</option>
                                                            <option value="female"@if(old('gender') == '') @if($person->gender == 'female') selected @endif @else @if(old('gender') == 'female') selected @endif @endif>Feminino</option>
                                                        </select>
                                                        @error('gender')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('gender')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="name" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Nome</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="text" maxlength="100" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('name') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" placeholder="Nome" value="{{old('name') ?? $person->name}}">
                                                        @error('name')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('name')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="nick_name" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Apelido</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="text" maxlength="100" name="nick_name" id="nick_name" autocomplete="nick_name" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('nick_name') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" placeholder="Apelido" value="{{old('nick_name') ?? $person->nick_name}}">
                                                        @error('nick_name')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('nick_name')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="birth_day" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Nascimento</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="date" maxlength="10" name="birth_day" id="birth_day" autocomplete="birth_day" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('birth_day') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" value="{{old('birth_day') ?? ($person->birth_day ? $person->birth_day->format('Y-m-d') : "")}}">
                                                        @error('birth_day')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('birth_day')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="birth_place" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Local Nascimento</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="text" maxlength="100" name="birth_place" id="birth_place" autocomplete="birth_place" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('birth_place') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" placeholder="Cidade" value="{{old('birth_place') ?? $person->birth_place}}">
                                                        @error('birth_place')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('birth_place')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="death_day" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Falecimento</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="date" maxlength="10" name="death_day" id="death_day" autocomplete="death_day" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('death_day') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" value="{{old('death_day') ?? ($person->death_day ? $person->death_day->format('Y-m-d') : "")}}">
                                                        @error('death_day')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('death_day')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="death_place" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Local Falecimento</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <input type="text" maxlength="100" name="death_place" id="death_place" autocomplete="death_place" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('death_place') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" placeholder="Cidade" value="{{old('death_place') ?? $person->death_place}}">
                                                        @error('death_place')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('death_place')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="pb-2">
                                                    <label for="bio" class="pt-2 block text-sm font-medium leading-6 text-gray-900">Bio</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <textarea name="bio" id="bio" autocomplete="bio" class="block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('bio') pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @else text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600 @endif" placeholder="Pequeno texto sobre a pessoa">
                                                            {{old('bio') ?? $person->bio}}
                                                        </textarea>
                                                        @error('bio')
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @error('bio')
                                                    <div class="text-sm text-red-600 font-bold">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex items-center justify-end">
                                        <button type="button" onclick="location.href = '{{ route('person', ['person' => $person]) }}';" class="rounded-md bg-red-600 ml-3 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Cancel</button>
                                        <button type="submit" class="rounded-md bg-indigo-600 ml-3 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                    </div>
                                </form>
                                <form method="get" action="{{route('people.create')}}">
                                    <div class="mt-6 flex items-center justify-end">
                                        <button type="submit" class="rounded-md bg-indigo-600 ml-3 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Adicionar Pessoa</button>
                                    </div>
                                </form>
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
                <ul role="list" class="pb-4 grid @if($cols == 6) grid-cols-6 @else @if($cols == 5) grid-cols-5 @else @if($cols == 4) grid-cols-4 @else @if($cols == 3) grid-cols-3 @else @if($cols == 2) grid-cols-2 @else grid-cols-1 @endif @endif @endif @endif @endif gap-1 items-center justify-center justify-items-center">
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
        </div>
    </div>
</x-app-layout>
