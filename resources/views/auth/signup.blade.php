<x-app-layout title="Sign Up | Work Connect">
    <section class="container">
        <div class="grid grid-cols-12">
            <div class="hidden md:block md:col-span-6">
                <img src="{{ asset('img/zoom-meet.jpg') }}" alt="" class="object-cover min-h-screen" />
            </div>

            <div class="min-h-screen col-span-12 md:col-span-6 place-content-center">
                <div class="flex flex-col items-center justify-center px-4 py-8">
                    <x-logo />

                    <div class="mt-2">
                        <x-toast.danger session="registrationFailed" />
                    </div>

                    <h3 class="mb-3 text-2xl font-extrabold md:text-4xl">
                        Create your account
                    </h3>

                    <form action="{{ route('auth.signup-store') }}" method="POST" class="w-full space-y-3 md:w-8/12">
                        @csrf
                        <div>
                            <x-forms.input-text label="Username" name="username" id="username" placeholder="Username"
                                description="Special characters are not allowed" />
                        </div>

                        <div>
                            <x-forms.input-text label="Email Address" name="email" id="email"
                                placeholder="Email address" description="Use your active email address" />
                        </div>

                        <div>
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">
                                Role
                            </label>
                            <select name="role" id="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                <option selected disabled>Select a role</option>
                                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                                <option value="freelancer" {{ old('role') == 'freelancer' ? 'selected' : '' }}>
                                    Freelancer</option>
                            </select>
                        </div>

                        <div>
                            <x-forms.input-password label="Password" name="password" id="password"
                                placeholder="••••••••"
                                description="Use at least 8 characters, combining letters and numbers" />
                        </div>

                        <button type="submit"
                            class="text-white w-full bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 duration-300 ease-in-out">
                            Create an account
                        </button>
                    </form>

                    <p class="mt-2 text-sm font-light text-gray-500">
                        Already have an account?
                        <a href="{{ route('auth.signin') }}" class="font-medium text-primary hover:underline">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
