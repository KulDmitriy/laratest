<x-guest-layout>
    <x-auth-card>
        <x-slot name="header">
        </x-slot>
    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <center><h3>Редактирование пользователя</h3></center>
                    </div>
                </div>
            </div>
        </div>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="container mt-5">
            <ul>
                <li class="alert alert-info">
                    <form method="POST" action="{{ route('user-info-edit-submit', $data->id) }}">
                        @csrf
                        <h3>ID пользователя: <i>{{ $data->id }}</i></h3>
                        <!-- Name -->
                        <div class="form-group">
                            <x-label for="name" :value="__('Имя')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$data->name" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div  class="form-group">
                            <x-label for="email" :value="__('E-mail')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$data->email" required />
                        </div>

                        <!-- Phone number -->
                        <div class="form-group">
                            <x-label for="phone_number" :value="__('Телефон')" />

                            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$data->phone_number" autofocus />
                        </div>

                        <!-- Password -->
                        <div  class="form-group">
                            <x-label for="password" :value="__('Пароль')" />

                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            :value="$data->password"
                                            required autocomplete="new-password" />
                        </div>

                        <div class="form-group">
                            <x-label for="role" :value="__('Роль')" />

                            <x-input id="role" class="block mt-1 w-full" type="text" name="role" :value="$data->role" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="btn btn-primary">
                                {{ __('Изменить') }}
                            </x-button>
                        </div>
                    </form>
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dashboard') }}"><x-button class="btn btn-secondary">{{ __('Вернуться обратно') }}</x-button></a>
                    </div>
                </li>
            </ul>
            </div>
        </x-auth-card>
    </div>

</x-guest-layout>
