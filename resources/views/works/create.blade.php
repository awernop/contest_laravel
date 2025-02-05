<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold py-5">{{ __('Новая заявка')}}</h2>
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('dashboard') }}">
                {{ __('ПОСМОТРЕТЬ ЗАДАНИЕ') }}
            </a>
    </x-slot>
    
    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST" action="{{route('works.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <div>
                <x-input-label for="title" :value="__('Название открытки')"/>
                <x-text-input id="title" class="block mt-1" type="text" name="title" required/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="category" :value="__('Категория')"/>
                <select id="category" class="block mt-1" name="category" required>
                    @foreach($categories as $category)
                    <option value='{{$category->id}}'>{{$category->title}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="path_img" :value="__('Файл')"/>
                <input type='file' id="path_img" class="block mt-1" name="path_img" required/>
                <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
            </div>
            <div>
                <x-primary-button class="ms-3">
                    {{__('Создать')}}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>