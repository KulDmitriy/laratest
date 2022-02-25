<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <center><h3>Список пользователей сервиса</h3></center>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <ul>
        @foreach($data as $elem)
        <li class="alert alert-info">
            <h3>Имя пользователя: <i>{{ $elem->name }}</i></h3>
            <p>ID пользователя: <i>{{ $elem->id }}</i></p>
            <p>E-mail пользователя: <i>{{ $elem->email }}</i></p>
            <p>Телефонный номер пользователя: <i>{{ $elem->phone_number }}</i></p>
            <p>Роль пользователя: <i>{{ $elem->role }}</i></p>
            <a href="{{ route('user-info-edit', $elem->id) }}"><button class="btn btn-info">Редактировать</button></a>
        </li>
        @endforeach
        <div class="d-grid gap-2 col-2 mx-auto">
          <a href="{{ route('dashboard') }}"><button class="btn btn-primary btn-lg" type="button">Вернуться обратно</button></a>
        </div>
    </ul>
    </div>  
</x-app-layout>