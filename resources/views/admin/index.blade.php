<x-app-layout>
  <div class='max-w-7x1 mx-auto sm:px-6 lg:px-8 ml-9"'>
    <h1 class='text-3xl text-center mt-5 font-semibold text-gray-400'>Панель администратора</h1>
    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('dashboard') }}">
                {{ __('Вернуться на главную') }}
            </a>
    <div class='flex flex-wrap gap-4'>
    @foreach($works as $work)
          <div class='div-col border bg-gray-200 rounded-md p-6 mt-4 w-80'>
          <p class="text-xl text-black font-semibold">{{$work->user->fullName()}}</p>
          <div class='flex gap-3'>
          <p class="text-sm text-black">Школа: {{$work->user->school}}</p>
          <p class="text-sm text-black">Класс: {{$work->user->class}}</p>
          </div>
            <span class='text-xl font-mb	'>{{$work->title}}</span>
            @isset($work->path_img)
            <img src="/images/{{$work->path_img}}" alt="" class='rounded-lg mt-2'>
            @endisset
            @if($work->score==null)
            <form id="form-update-{{$work->id}}" action="{{route('works.update')}}" method="POST">
            <div>
            @csrf
            @method('PUT')
                <input type="hidden" name="id" value="{{$work->id}}">
                <select name="score" onchange="document.getElementById('form-update-{{$work->id}}').submit()" class="border-none rounded-xl bg-green-300 mt-3 font-medium">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                </select>
            </div>
            </form>
            @else
              <p id="statusColor" class='statusColor font-medium text-s bg-gray-300 pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$work->score}}</p>
            @endif
          </div>
        @endforeach
    </div>
  </div>
</x-app-layout>