    @extends('layouts.app')
    @section('title','تسجيل الدخول المشرف')
    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->

    @section('content')
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <img src="{{ asset('website/images/navbar.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
            alt="img"> --}}

            </div>


            <div class="mt-10 mb-4 sm:mx-auto sm:w-full sm:max-w-sm bg-[#e34e34] px-4 py-8 rounded-lg">
                <form class="space-y-6" action="{{ route('supervisor.login') }}" method="POST">
                    @csrf {{-- Add this to include the CSRF token --}}

                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-[#f2e7d1]">تسجيل الدخول
                        للمشرف
                    </h2>
                    @if (session('error'))
                        <div class="bg-[#f2e7d1] border-l-4 text-black p-4 my-4 rounded-lg">
                            <div class="text-center">
                                <p>{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-white">البريد الالكتروني
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-2 px-4 text-black shadow-sm ring-1 ring-inset bg-[#f2e7d1] ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-white">كلمة
                                المرور</label>
                            <div class="text-sm">
                                {{-- <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                            password?</a> --}}
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full py-2 px-4 rounded-md border-0 text-black shadow-sm ring-1 ring-inset bg-[#f2e7d1] ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-[#f2e7d1] px-3 p-4 text-sm font-semibold leading-6 text-black shadow-sm hover:scale-95 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            الدخول </button>
                    </div>
                </form>
            </div>

        </div>
    @endsection
