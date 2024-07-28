<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env("APP_NAME") . " | Admin Login" }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50">
    <div class="absolute h-screen w-screen bg-secondary bg-opacity-60 z-1"></div>
    <div class="flex items-center justify-center min-h-screen bg-cover bg-center h-screen"
        style="background-image: url('/img/bgAdminLogin.png');">
        <div
            class="w-[392px] py-10 bg-gradient-to-b from-[#ffffffb4] to-[#ffffff52] rounded-[28px] p-4 backdrop-blur-md border-2 border-white z-10">
            <div class="flex flex-col gap-4 mx-auto text-center mb-10">
                <div class="text-4xl font-jakarta font-semibold text-primary">Admin Login</div>
                <div class="font-medium font-jakarta text-gray-600">Masukkan detail akun Anda</div>
            </div>
            <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <label class="form-control w-full max-w-xs mx-auto">
                    <div class="label">
                        <span class="label-text font-medium text-white">Username</span>
                        <span class="label-text-alt hidden">Top Right label</span>
                    </div>
                    <input name="username" type="text" placeholder="Username" value="{{ old('username') }}"
                        class="input input-bordered w-full max-w-xs" />
                    @if ($errors->has('username'))
                        <div class="label">
                            <span class="label-text-alt">{{ $errors->first('username') }}</span>
                        </div>
                    @endif
                </label>

                <label class="form-control w-full max-w-xs mx-auto">
                    <div class="label">
                        <span class="label-text font-medium text-white">Password</span>
                        <span class="label-text-alt hidden">Top Right label</span>
                    </div>
                    <input name="password" type="password" placeholder="Password"
                        class="input input-bordered w-full max-w-xs" />
                    @if ($errors->has('password'))
                        <div class="label">
                            <span class="label-text-alt">{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </label>
                <label class="form-control w-full max-w-xs mx-auto mt-4">
                    <button type="submit"
                        class="bg-secondary rounded-full py-4 font-jakarta font-semibold hover:bg-primary text-white">Masuk</button>
                </label>
            </form>
            @if ($success = Session::get('success'))
                <h1>{{ $success }}</h1>
            @endif
        </div>
    </div>

</body>

</html>

<!-- (bagian) Start -->
<!-- (bagian) End -->

