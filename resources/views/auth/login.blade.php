<x-layout>
    <x-form title="Login in" description="Glad to have you back.">
        <form action="/login" method="POST" class="mt-10 space-y-4">
            @csrf

            <x-form.field type="email" label="Email" name="email" />
            <x-form.field type="password" label="Password" name="password" />

            <button type="submit" class="btn mt-2 h-10 w-full" data-test="login-button">Sign in</button>
        </form>
    </x-form>
</x-layout>
