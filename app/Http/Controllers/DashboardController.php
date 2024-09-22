<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wallets\StoreTopupRequest;
use App\Http\Requests\Wallets\StoreWithdrawRequest;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function wallet()
    {
        $user = Auth::user();

        $walletTransactions = WalletTransaction::where('user_id', $user->id)
            ->orderByDesc('id')->paginate(10);
        return view('dashboard.client-freelancer.wallets.index', compact('walletTransactions'));
    }

    public function topup_wallet()
    {
        return view('dashboard.client-freelancer.wallets.topup');
    }

    public function topup_wallet_store(StoreTopupRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();

        DB::beginTransaction();
        try {

            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            }

            $validated['type'] = 'Topup';
            $validated['is_paid'] = false;
            $validated['user_id'] = $user->id;

            WalletTransaction::create($validated);

            DB::commit();

            return redirect()->route('dashboard.wallet')
                ->with('topupSuccessfull', 'Top-up successful. Please wait for approval from the admin');
        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('dashboard.wallet')
                ->with('failedToTopup', 'Failed to top up. Please try again');
        }
    }

    public function withdraw_wallet()
    {
        return view('dashboard.client-freelancer.wallets.withdraw');
    }

    public function withdraw_wallet_store(StoreWithdrawRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        if ($user->wallet->balance < 100000) {
            return redirect()->route('dashboard.wallet.withdraw')
                ->with('balanceInsufficient', 'Your balance is insufficient');
        }

        DB::beginTransaction();

        try {
            $validated['type'] = 'Withdraw';
            $validated['amount'] = $user->wallet->balance;
            $validated['is_paid'] = false;
            $validated['user_id'] = $user->id;

            WalletTransaction::create($validated);

            $user->wallet->update([
                'balance' => 0,
            ]);

            DB::commit();

            return redirect()->route('dashboard.wallet')
                ->with('withdrawSuccessfull', 'Withdrawal successful');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('dashboard.wallet')
                ->with('failedWithdraw', 'Failed to process the withdrawal.');
        }
    }
}
