<x-app-layout title="My Wallet | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-sm px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Request Withdraw</h2>

            <x-toast.warning session="balanceInsufficient" />

            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                You can only make a withdrawal when your balance reaches Rp 100,000
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">

                <div class="flex items-center gap-x-2">
                    <svg class="text-gray-800 w-14 h-14" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                            clip-rule="evenodd" />
                    </svg>

                    <div>
                        <h5 class="text-sm font-medium text-gray-600">Total Balance</h5>
                        <span class="font-bold">
                            Rp {{ number_format(Auth::user()->wallet->balance, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <hr class="my-5">

                <h5 class="mb-5 font-semibold">
                    Withdraw Money
                </h5>

                <form action="{{ route('dashboard.wallet.withdraw-store') }}" method="POST" class="w-full space-y-4">
                    @csrf

                    <div>
                        <x-forms.input-text label="Bank Name" name="bank_name" id="bank_name"
                            placeholder="type your bank name" />
                    </div>

                    <div>
                        <x-forms.input-text label="Bank Account Name" name="bank_account_name" id="bank_account_name"
                            placeholder="type your bank account name" />
                    </div>

                    <div>
                        <x-forms.input-text label="Bank Account Number" name="bank_account_number"
                            id="bank_account_number" placeholder="type your bank account number" />
                    </div>

                    <button type="submit"
                        class="text-white w-full bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 duration-300 ease-in-out">
                        Request Withdraw
                    </button>
                </form>

            </div>
        </div>
    </section>
</x-app-layout>
