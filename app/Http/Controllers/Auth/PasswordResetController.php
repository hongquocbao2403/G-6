<?php
use App\Http\Controllers\Auth\PasswordResetController;

// Route yêu cầu quên mật khẩu
Route::middleware('auth')->group(function () {
    // Hiển thị form reset mật khẩu
    Route::get('forgot-password', [PasswordResetController::class, 'showResetForm'])->name('password.forgot');
    // Xử lý form reset mật khẩu
    Route::post('forgot-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});
