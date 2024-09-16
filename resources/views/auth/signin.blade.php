<x-app-layout title="Sign In | Work Connect">
    <section class="container">
        <div class="grid grid-cols-12">
            <div class="hidden md:block md:col-span-6">
                <img src="{{ asset('img/zoom-meet.jpg') }}" alt="" class="object-cover min-h-screen"
                    loading="lazy" />
            </div>

            <div class="min-h-screen col-span-12 md:col-span-6 place-content-center">
                <div class="flex flex-col items-center justify-center px-4 py-8">
                    <x-logo />

                    <div class="mt-2">
                        <x-toast.success session="registrationSuccessfull" />
                    </div>

                    <h3 class="text-2xl font-extrabold md:text-4xl mb-2">
                        Login your account
                    </h3>

                    <form action="{{ route('auth.signin-authenticate') }}" method="POST"
                        class="w-full space-y-4 md:w-8/12">
                        @csrf

                        <div>
                            <x-forms.input-text type="email" label="Email Address" name="email" id="email"
                                placeholder="Email address" />
                        </div>

                        <div>
                            <x-forms.input-password label="Password" name="password" id="password"
                                placeholder="••••••••" />
                        </div>

                        <button type="submit"
                            class="text-white w-full bg-primary hover:bg-hover focus:ring-4 focus:ring-[#ff995f] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 duration-300 ease-in-out">
                            Sign In
                        </button>
                    </form>

                    <p class="mt-2 text-sm font-light text-gray-500">
                        Don’t have an account yet?
                        <a href="{{ route('auth.signup') }}" class="font-medium text-primary hover:underline">
                            Sign up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
