<div class="card">
    <div class="card-header" id="auth_password">
        <h3 class="card-title">
            Password
        </h3>
    </div>
    <form method="post" action="{{ route('password.update') }}" class="card-body flex flex-col gap-5 p-10">
        @csrf
        @method('put')

        <div>
            <x-forms.input
                label="{{ __('Current Password') }}"
                name="current_password"
                type="password"
                :placeholder="__('Enter your current password')"
                :messages="$errors->updatePassword->get('current_password')"
            />
        </div>

        <div>
            <x-forms.input
                label="{{ __('New Password') }}"
                name="password"
                type="password"
                :placeholder="__('Enter new password')"
                :messages="$errors->updatePassword->get('password')"
            />
        </div>

        <div>
            <x-forms.input
                label="{{ __('Confirm Password') }}"
                name="password_confirmation"
                type="password"
                :placeholder="__('Confirm new password')"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />
        </div>

        <div class="flex justify-end pt-2.5">
            <x-forms.primary-button>
                {{ __('  Save  ') }}
            </x-forms.primary-button>
        </div>
    </form>
</div>
