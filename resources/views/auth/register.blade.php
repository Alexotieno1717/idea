<x-layout>
    <x-form title="Register an account" description="Start tracking your ideas today.">
        <form action="/register" method="POST" class="mt-10 space-y-4">
            @csrf

            <x-form.field label="Name" name="name" />
            <x-form.field type="email" label="Email" name="email" />
            <x-form.field type="password" label="Password" name="password" />

            <button type="submit" class="btn mt-2 h-10 w-full">Create Account</button>
        </form>
    </x-form>
</x-layout>
