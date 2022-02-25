<x-guest-layout>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Забыли свой пароль? Не проблема, просто укажите свой email-адрес и мы отправим на него ссылку для восстановления пароля, чтобы вы смогли его поменять.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="btn btn-success">
                <x-button>
                    {{ __('Отправить ссылку для восстановления пароля') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
