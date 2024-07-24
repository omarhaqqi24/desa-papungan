<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    <style>
        #bgAdminLogin {
            background-image: url('img/bgAdminLogin.png');
            background-size: cover;
            /* Optional: covers the entire element */
            background-position: center;
            /* Optional: centers the background image */
            background-repeat: no-repeat;
            /* Optional: prevents repeating the background image */
        }
    </style>

</head>

<body class="mytheme font-jakarta antialiased dark:bg-black dark:text-white/50 ">
    <img src="" alt="" class="">

    <div class="flex items-center justify-center min-h-screen bg-gray-200 z-50">
        <div class="w-[392px] py-10 bg-gradient-to-b from-[#f2f2f2] to-[#8c8c8c] rounded-[28px] p-4">

            <div class="mx-auto text-center">
                <div class="text-lg">Admin Login</div>
                <div class="">lorem ipsum dkdfk dkfdfkk</div>
            </div>
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <label class="form-control w-full max-w-xs mx-auto">
                    <div class="label">
                        <span class="label-text">Username</span>
                        <span class="label-text-alt">Top Right label</span>
                    </div>
                    <input name="username" type="text" placeholder="Type here" value="{{ old('username') }}"
                        class="input input-bordered w-full max-w-xs" />
                    @if ($errors->has('username'))
                        <div class="label">
                            <span class="label-text-alt">{{ $errors->first('username') }}</span>
                        </div>
                    @endif
                </label>

                <label class="form-control w-full max-w-xs mx-auto">
                    <div class="label">
                        <span class="label-text">Password</span>
                        <span class="label-text-alt">Top Right label</span>
                    </div>
                    <input name="password" type="text" placeholder="Type here"
                        class="input input-bordered w-full max-w-xs" />
                    @if ($errors->has('password'))
                        <div class="label">
                            <span class="label-text-alt">{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </label>
                <label class="form-control w-full max-w-xs mx-auto">
                    <button type="submit" class="bg-primary rounded-full py-4 text-white">Masuk</button>
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
