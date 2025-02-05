<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Правила участия в конкурсе') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Приглашаем Вас принять участие конкурсе новогодних открыток.") }}
                    <p>
                        <b>Правила участия:</b>
                    </p>
                    <p>1.	Ребенок может выслать на конкурс только одну работу. <br> 
                        2.	Работы, в соответствующих категорией, должны быть выполнены детьми самостоятельно и индивидуально. <br>
                        3.	Стиль всегда остаются на усмотрение участника. <br>
                    </p>
                    <p>
                        <b>Номинации:</b>
                    </p>
                    <ul>
                        <li>•	рисунок</li>
                        <li>•	акварель</li>
                        <li>•	гуашь</li>
                        <li>•	другое</li>
                    </ul>
                    <p>
                        <b>К участию в конкурсе допускаются:</b>
                    </p>
                    <p>Ученики 1-11 классов школ, лицеев, гимназий, колледжей и любых других образовательных учреждений (без предварительного отбора.) </p>
                    <p>
                        <b>Требования к работам:</b>
                    </p>
                    <ul>
                        <li>•	соответствие содержания творческой работы заявленной тематике</li>
                        <li>•	актуальность конкурсной работы</li>
                        <li>•	творческая индивидуальность</li>
                        <li>•   оригинальность идеи, новаторство, творческий подход</li>
                        <li>•   полнота и образность раскрытия темы</li>
                        <li>•   качество оформления и наглядность материала</li>
                        <li>•   соответствие творческого уровня возрасту автора</li>
                        <li>•   степень самостоятельности выполнения</li>
                    </ul>
                    <p>
                        <b>Требование к файлу:</b>
                    </p>
                    <p>
                    Объем файла с работой не должен превышать 1 Мб.
                    </p>
                </div>
                   
            </div>
            <div class='flex gap-5 mt-6'>
            @if((auth()->user()->isAdmin()===false))
            @if(count($works)===0)
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('works.create') }}">
                        {{ __('СОЗДАТЬ ЗАЯВКУ') }}
                    </a>
                    @else
                        <span class='font-semibold text-4xl uppercase tracking-widest text-gray-300'>Вы уже отправили работу. Желаем удачи!</span>
                    @endif
                    @endif
                
            @if((auth()->user()->isAdmin()===true))
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('admin.index') }}">
                {{ __('Перейти в панель администратора') }}
            </a>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
