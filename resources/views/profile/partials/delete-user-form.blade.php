<link rel="stylesheet" href="{{ asset('perfil.css') }}">

<section class="space-y-6">
    <div class="profile-edit-section">
        <h2 class="profile-edit-section-text">
            {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="profile-edit-section-text-desc">
            {{ __('Una vez tu cuenta sea eliminada, todos los datos seran irrecuperables') }}
        </p>
    </div>

    <x-danger-button class="delete-button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Eliminar cuenta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="profile-edit-section-text">
                {{ __('Estas seguro que quieres eliminar tu cuenta?') }}
            </h2>

            <p class="profile-edit-section-text-desc">
                {{ __('Una vez tu cuenta sea eliminada, no se podran recuperar los datos.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
