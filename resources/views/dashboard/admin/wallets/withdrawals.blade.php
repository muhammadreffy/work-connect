<x-app-layout title="Withdrawals | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-xl px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Withdrawals</h2>

            <x-toast.success session="topupSuccessfull" />
            <x-toast.danger session="failedToTopup" />

            <x-toast.success session="withdrawSuccessfull" />
            <x-toast.danger session="failedWithdraw" />

            <x-toast.success session="approvedTopupSuccess" />
            <x-toast.danger session="approvedTopupFailed" />

            <div class="p-3 bg-white rounded-lg shadow-md">

                <h5 class="text-xl font-semibold">Latest Transactions</h5>

                <hr class="my-2">

                <table class="w-full text-sm text-left text-gray-500">

                    @forelse ($withdrawalsTransactions as $withdrawalTransaction)
                        <tr>
                            <th class="px-4 py-3 text-gray-900">
                                <div class="flex items-center gap-x-2">
                                    <svg class="w-8 h-8 text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600">Total Amount</h5>
                                        <span class="font-bold">
                                            Rp {{ number_format($withdrawalTransaction->amount, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </th>

                            <th class="px-4 py-3 text-gray-900">
                                <div class="flex flex-col gap-x-2">
                                    <h5 class="text-sm font-medium text-gray-600">User</h5>
                                    <span class="font-bold">{{ $withdrawalTransaction->user->name }}</span>
                                </div>
                            </th>

                            <th class="px-4 py-3 text-gray-900">
                                <div class="flex flex-col gap-x-2">
                                    <h5 class="text-sm font-medium text-gray-600">Date</h5>
                                    <span
                                        class="font-bold">{{ $withdrawalTransaction->created_at->format('M d, Y') }}</span>
                                </div>
                            </th>

                            <th class="px-4 py-3 text-gray-900">
                                <div class="flex flex-col items-center">

                                    <h5 class="text-sm font-medium text-gray-600">Status</h5>
                                    @if ($withdrawalTransaction->is_paid)
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
                            </th>

                            <th class="px-4 py-3 text-gray-900">
                                <a href="{{ route('admin.transaction.show', $withdrawalTransaction) }}"
                                    class="block px-2 py-1 text-sm font-medium text-center text-white transition-all duration-300 ease-in-out rounded-lg bg-primary hover:bg-hover focus:outline-none focus:ring-4 w-fit focus:ring-dark_ring">

                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    @empty
                        <td colspan="4" class="px-4 py-2 text-center">
                            No withdrawal data has been recorded yet.
                        </td>
                    @endforelse
                </table>

                {{ $withdrawalsTransactions->links() }}

            </div>
        </div>
    </section>
</x-app-layout>
