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
    <p><form method="POST" action="{{ route('show-users-info-by-filter')}}">
        @csrf

        <h4>Поиск:</h4>
        <div class="form-group">
            <x-label for="filter" />
            <x-input id="filter" class="block mt-1 w-full" type="text" name="filter" placeholder="{{ __('имя/email/телефон/роль') }}" />

        <h4>Отфильтровать по:</h4>
            <li>
                <x-label for="column" />
                <x-input id="column" class="form-check-input me-1" type="radio" name="column" value="name" />
                полю "Имя"
                <x-label for="rule" />
                <x-input id="rule" class="form-check-input me-1" type="radio" name="rule" value="asc" />
                в алфавитном порядке
            </li>
            <li>
                <x-label for="column" />
                <x-input id="column" class="form-check-input me-1" type="radio" name="column" value="email" />
                полю "Email"
                <x-label for="rule" />
                <x-input id="rule" class="form-check-input me-1" type="radio" name="rule" value="desc" />
                в обратном порядке
            </li>
            <x-button class="btn btn-success">
                {{ __('Найти') }}
            </x-button>
        </ul>
    </form>
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
    </ul>
    </div> 
</x-app-layout>