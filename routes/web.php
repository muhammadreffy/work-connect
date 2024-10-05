<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProjectApplicantController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectToolController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\WalletTransactionController;
use App\Http\Middleware\DashboardAuth;
use App\Http\Middleware\RedirectIfAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::get('/categories', function () {
    return view('front.categories.index');
})->name('front.categories.index');

Route::name('auth.')->middleware(RedirectIfAuth::class)->group(function () {
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/signup-store', [SignupController::class, 'store'])->name('signup-store');

    Route::get('/signin', [SigninController::class, 'index'])->name('signin');
    Route::post('/signin-authenticate', [SigninController::class, 'authenticate'])->name('signin-authenticate');

    Route::post('/logout', [SigninController::class, 'logout'])
        ->withoutMiddleware(RedirectIfAuth::class)->name('logout');
});

Route::middleware(DashboardAuth::class)->group(function () {

    Route::name('dashboard.')->prefix('dashboard')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware('can:withdraw wallet')->group(function () {
            Route::get('/wallet', [DashboardController::class, 'wallet'])->name('wallet');

            Route::get('/wallet/request-withdraw', [DashboardController::class, 'withdraw_wallet'])
                ->name('wallet.withdraw');

            Route::post('/wallet/withdraw/store', [DashboardController::class, 'withdraw_wallet_store'])
                ->name('wallet.withdraw-store');
        });

        Route::middleware('can:topup wallet')->group(function () {
            Route::get('/wallet/topup', [DashboardController::class, 'topup_wallet'])->name('wallet.topup');

            Route::post('/wallet/topup/store', [DashboardController::class, 'topup_wallet_store'])
                ->name('wallet.topup-store');
        });

        // ==========================APPLY JOB - PROPOSALS==============================
        Route::middleware('can:apply job')->group(function () {
            Route::get('/proposals', [DashboardController::class, 'proposals'])->name('proposals');

            Route::get('/proposal-details/{project}/{projectApplicant}', [DashboardController::class, 'proposal_details'])
                ->name('proposal-details');
        });

    });

    Route::name('front.')->group(function () {
        // ==========================APPLY JOB==============================
        Route::middleware('can:apply job')->group(function () {
            Route::get('/apply/{project:slug}', [FrontController::class, 'apply_job'])->name('apply-job');

            Route::post('/apply/{project:slug}/submit', [FrontController::class, 'apply_job_store'])
                ->name('apply-job-store');
        });
    });

    Route::name('admin.')->prefix('admin')->group(function () {

        Route::middleware('can:manage wallets')->group(function () {
            Route::get('/wallet/topups', [WalletTransactionController::class, 'wallet_topups'])->name('topups');

            Route::get('/wallet/withdrawals', [WalletTransactionController::class, 'wallet_withdrawals'])
                ->name('withdrawals');

            Route::get('/wallet/transactions', [WalletTransactionController::class, 'index'])
                ->name('transactions.index');

            Route::get('/wallet/transactions/create', [WalletTransactionController::class, 'create'])
                ->name('transaction.create');

            Route::post('/wallet/transactions/store', [WalletTransactionController::class, 'store'])
                ->name('transaction.store');

            Route::get('/wallet/transaction/{walletTransaction}/details', [WalletTransactionController::class, 'show'])
                ->name('transaction.show');

            Route::get('/wallet/transactions/{walletTransaction}/edit', [WalletTransactionController::class, 'edit'])
                ->name('transaction.edit');

            Route::put('/wallet/transaction/{walletTransaction}/update', [WalletTransactionController::class, 'update'])
                ->name('transaction.update');

            Route::delete('/wallet/transactions/{walletTransaction}/delete', [WalletTransactionController::class, 'destroy'])
                ->name('transaction.delete');
        });

        Route::middleware('can:manage applicants')->group(function () {

            Route::get('/project-applicants', [ProjectApplicantController::class, 'index'])
                ->name('applicants.index');

            Route::get('/project-applicants/create', [ProjectApplicantController::class, 'create'])
                ->name('applicant.create');

            Route::post('/project-applicants/store', [ProjectApplicantController::class, 'store'])
                ->name('applicant.store');

            Route::get('/project-applicants/{projectapplicant}/edit', [ProjectApplicantController::class, 'edit'])
                ->name('applicant.edit');

            Route::put('/project-applicants/{projectapplicant}/update', [ProjectApplicantController::class, 'update'])
                ->name('applicant.update');

            Route::delete('/project-applicants/{projectapplicant}/delete', [ProjectApplicantController::class, 'destroy'])
                ->name('applicant.delete');

        });

        Route::middleware('can:manage projects')->group(function () {

            Route::get('/projects', [ProjectController::class, 'index'])
                ->name('projects.index');

            Route::get('/project/create', [ProjectController::class, 'create'])
                ->name('project.create');

            Route::post('/project/store', [ProjectController::class, 'store'])
                ->name('project.store');

            Route::get('/project/{project:slug}/manage', [ProjectController::class, 'manage'])
                ->name('project.manage');

            Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])
                ->name('project.edit');

            Route::get('/project/{project:slug}/manage-tools', [ProjectController::class, 'manage_tools'])
                ->name('project.manage-tools');

            Route::put('/project/{project}/update', [ProjectController::class, 'update'])
                ->name('project.update');

            Route::delete('/project/{project}/delete', [ProjectController::class, 'destroy'])
                ->name('project.delete');

            Route::post('/project/{projectApplicant}/completed', [ProjectController::class, 'complete_project_store'])
                ->name('complete-project-store');

            // ==========================PROJECT TOOLS==============================
            Route::get('/project/{project}/tools', [ProjectController::class, 'tools'])
                ->name('projects.tools');

            Route::post('/project/{project:slug}/tools-store', [ProjectController::class, 'tools_store'])
                ->name('projects.tools-store');

            Route::get('/project-tools', [ProjectToolController::class, 'index'])
                ->name('project-tools.index');

            Route::get('/project-tool/{projecttool}/edit', [ProjectToolController::class, 'edit'])
                ->name('project-tools.edit');

            Route::put('/project-tool/{projecttool}/update', [ProjectToolController::class, 'update'])
                ->name('project-tools.update');

            Route::delete('/project-tool/{projectTool}/delete/{tool}', [ProjectToolController::class, 'destroy'])
                ->name('project-tools.delete');
        });

        Route::middleware('can:manage categories')->group(function () {
            Route::get('/categories', [CategoryController::class, 'index'])
                ->name('categories.index');

            Route::get('/category/create', [CategoryController::class, 'create'])
                ->name('category.create');

            Route::post('/category/store', [CategoryController::class, 'store'])
                ->name('category.store');

            Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit'])
                ->name('category.edit');

            Route::put('/category/{category:slug}/update', [CategoryController::class, 'update'])
                ->name('category.update');

            Route::delete('/category/{category:slug}/delete', [CategoryController::class, 'destroy'])
                ->name('category.delete');
        });

        Route::middleware('can:manage tools')->group(function () {
            Route::get('/tools', [ToolController::class, 'index'])
                ->name('tools.index');

            Route::get('/tool/create', [ToolController::class, 'create'])
                ->name('tool.create');

            Route::post('/tool/store', [ToolController::class, 'store'])
                ->name('tool.store');

            Route::get('/tool/{tool:slug}/edit', [ToolController::class, 'edit'])
                ->name('tool.edit');

            Route::put('/tool/{tool:slug}/update', [ToolController::class, 'update'])
                ->name('tool.update');

            Route::delete('/tool/{tool:slug}/delete', [ToolController::class, 'destroy'])
                ->name('tool.delete');
        });
    });
});
