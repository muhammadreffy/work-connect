<x-app-layout title="My Wallet | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-sm px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Transaction Details</h2>

            <x-toast.success session="successAddedCategory" />
            <x-toast.danger session="failedAddCategory" />

            <x-toast.success session="successUpdatedCategory" />
            <x-toast.warning session="failedToUpdateCategory" />

            <x-toast.success session="successDeletedCategory" />
            <x-toast.warning session="failedToDeleteCategory" />

            <div class="p-6 bg-white rounded-lg shadow-md">

                <div class="flex items-center justify-between">
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
                            <span class="font-bold">Rp
                                {{ number_format($walletTransaction->amount, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2">
                        <div>
                            <h5 class="text-sm font-medium text-gray-600">Client</h5>
                            <span class="font-bold">{{ $walletTransaction->user->name }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2">
                        <div>
                            <h5 class="text-sm font-medium text-gray-600">Date</h5>
                            <span class="font-bold">{{ $walletTransaction->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    @if ($walletTransaction->is_paid)
                        <span class="text-green-400">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                        </span>
                    @else
                        <span class="text-yellow-400">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                            </svg>
                        </span>
                    @endif
                </div>

                <hr class="my-5">

                @if ($walletTransaction->type == 'Withdraw')
                    <h5 class="mb-4 font-semibold">Send payment to:</h5>

                    <div class="flex flex-col lg:flex-row lg:gap-x-28 gap-y-4">
                        <div>
                            <h5 class="text-sm font-medium text-gray-600">Bank</h5>
                            <strong class="font-bold">{{ $walletTransaction->bank_name }}</strong>
                        </div>

                        <div>
                            <h5 class="text-sm font-medium text-gray-600">No Account</h5>
                            <strong class="font-bold">{{ $walletTransaction->bank_account_number }}</strong>
                        </div>

                        <div>
                            <h5 class="text-sm font-medium text-gray-600">Acoount Name</h5>
                            <strong class="font-bold">{{ $walletTransaction->bank_account_name }}</strong>
                        </div>
                    </div>

                    @if ($walletTransaction->is_paid)
                        <hr class="my-5">

                        <h5 class="mb-5 font-semibold">
                            Proof of Payment
                        </h5>

                        <img src="{{ Storage::url($walletTransaction->proof) }}"
                            alt="{{ $walletTransaction->user->name }}"
                            class="object-cover w-32 rounded-md mb-6 aspect[9/16]">
                    @endif

                    <hr class="my-5">

                    @if (!$walletTransaction->is_paid)
                        <h5 class="mb-5 font-semibold">
                            Confirm Withdrawal
                        </h5>

                        <form action="{{ route('admin.transaction.update', $walletTransaction) }}" method="POST"
                            enctype="multipart/form-data" class="w-full space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-forms.input-file label="Proof" name="proof" id="proof" />
                            </div>

                            <button type="submit"
                                class="text-white w-full bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 duration-300 ease-in-out">
                                Update Withdrawal
                            </button>
                        </form>
                    @endif
                @endif

                @if ($walletTransaction->type == 'Topup')
                    <h5 class="mb-5 font-semibold">
                        Proof of Topup Payment
                    </h5>

                    <img src="{{ Storage::url($walletTransaction->proof) }}" alt="{{ $walletTransaction->user->name }}"
                        class="object-cover w-32 rounded-md mb-6 aspect[9/16]">

                    @if (!$walletTransaction->is_paid)
                        <form action="{{ route('admin.transaction.update', $walletTransaction) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="text-white bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 duration-300 ease-in-out">
                                Approve Topup
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
