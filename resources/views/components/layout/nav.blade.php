<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
{{--                <img src="/images/logo.png" alt="" width="100" alt="Idea logo">--}}
                Idea Logo
            </a>
        </div>

        <div class="flex gap-x-5 items-center">
            @auth
                <form action="/logout" method="post">
                    @csrf

                    <button type="submit">
                        Log Out
                    </button>
                </form>
            @endauth

            @guest
                    <a href="/login">Sign In</a>
                    <a href="/register" class="btn">Register</a>
            @endguest
        </div>
    </div>
</nav>
