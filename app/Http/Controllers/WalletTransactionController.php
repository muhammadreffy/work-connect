<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletTransactionController extends Controller
{
    public function wallet_topups()
    {
        $topupTransactions = WalletTransaction::where('type', 'Topup')
            ->orderByDesc('id')->paginate(10);

        return view('dashboard.admin.wallets.topups', compact('topupTransactions'));
    }

    public function wallet_withdrawals()
    {
        $withdrawalsTransactions = WalletTransaction::where('type', 'Withdraw')
            ->orderByDesc('id')->paginate(10);

        return view('dashboard.admin.wallets.withdrawals', compact('withdrawalsTransactions'));
    }

    public function show(WalletTransaction $walletTransaction)
    {
        return view('dashboard.admin.wallets.details', compact('walletTransaction'));
    }

    public function update(Request $request, WalletTransaction $walletTransaction)
    {
        $userToApprove = User::where('id', $walletTransaction->user_id)->first();

        DB::beginTransaction();

        try {

            if ($walletTransaction->type === 'Withdraw') {

                if ($request->hasFile('proof')) {
                    $proofPath = $request->file('proof')->store('proofs', 'public');
                }

                $walletTransaction->update([
                    'proof' => $proofPath,
                    'is_paid' => true,
                ]);

            } else if ($walletTransaction->type === 'Topup') {

                $walletTransaction->update([
                    'is_paid' => true,
                ]);

                $userToApprove->wallet->increment('balance', $walletTransaction->amount);
            }

            if ($walletTransaction->type === 'Withdraw') {

                DB::commit();

                return redirect()->route('admin.withdrawals')
                    ->with('withdrawalRequestSuccess', 'Withdrawal request submitted successfully. Please wait for admin confirmation');
            } else {

                DB::commit();

                return redirect()->route('admin.topups')
                    ->with('approvedTopupSuccess', 'You have approved the top-up');
            }

        } catch (\Throwable $e) {
            DB::rollBack();

            if ($walletTransaction->type === 'Topup') {
                DB::commit();

                return redirect()->route('admin.topups')
                    ->with('approvedTopupFailed', 'Failed to approved the top-up');
            }

            if ($walletTransaction->type === 'Withdraw') {
                return redirect()->route('admin.withdrawals')
                    ->with('failedWithdrawalRequest', 'Failed to submit withdrawal request. Please try again!');
            }

        }
    }
}
