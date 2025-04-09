<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminControllerTwo;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ImageController;

Route::post('/logout', function () {
    Auth::logout();
    return response()->json(['message' => 'Đã đăng xuất']);
})->name('logout');
// Route logout thủ công
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Chuyển về trang chủ
})->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin/second')->name('admin.second.')->group(function () {
    Route::get('/dashboard', [AdminControllerTwo::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

// Đảm bảo route đăng nhập đã được định nghĩa
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Đảm bảo rằng bạn đã định nghĩa route này trong web.php
Route::get('/admin/users', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('/admin/upload', [FileUploadController::class, 'store'])->name('file.upload.store');

// Routes cho Auth (Đăng nhập, đăng ký)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');

Route::middleware(['auth'])->group(function () {
    // Route cho trang quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware(['auth'])->group(function () {
    // Route để hiển thị danh sách người dùng
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
// Route hiển thị form tạo người dùng
Route::get('users/create', [UserController::class, 'create'])->name('users.create');

// Route hiển thị danh sách người dùng
Route::get('users', [UserController::class, 'index'])->name('users.index');

// Route lưu người dùng mới
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// Route hiển thị form chỉnh sửa người dùng
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route cập nhật thông tin người dùng
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

// Route xóa người dùng
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('styles', \App\Http\Controllers\StyleController::class);
});

// Route cho dashboard_2 của người dùng
Route::get('/user/dashboard_2', [UserController::class, 'dashboard_2'])->name('user.dashboard_2');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->get('/dashboard', [DashboardController::class, 'adminDashboard']);
// Route cho dashboard của người dùng
Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

// Route cho dashboard của admin
Route::middleware(['auth', 'admin'])->get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Route cho trang dashboard của Admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.index');

// Route cho danh sách người dùng
Route::get('/admin/users', [AdminController::class, 'usersList'])->name('admin.users.list');

// Route cho form tạo người dùng mới
Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');

// Route lưu người dùng mới
Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');

// Route cho form chỉnh sửa người dùng
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');

// Route cập nhật người dùng
Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');

// Route xóa người dùng
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

// Routes for Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Trang tạo người dùng mới (hoặc các hành động admin khác)
    Route::get('/users/create', [AdminController::class, 'create'])->name('admin.create');
    // Các route admin khác...
});
// Định nghĩa group cho admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    // Route cho trang quản lý người dùng
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    // Bạn có thể thêm các route khác cho chỉnh sửa, xóa, tạo người dùng ở đây.
});
// routes/web.php
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
});
// Routes cho Admin (Quản lý của admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Route cho trang dashboard của admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
// dashboard2
Route::middleware(['auth', 'admin.type:admin1'])->prefix('admin/first')->name('admin.first.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'admin.type:admin2'])->prefix('admin/second')->name('admin.second.')->group(function () {
    Route::get('/dashboard', [AdminControllerTwo::class, 'dashboard'])->name('dashboard');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/second/dashboard', [AdminControllerTwo::class, 'dashboard'])->name('admin.second.dashboard');

//Quản lý Gói VIP
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    // Các route khác...
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
});

// Đảm bảo định nghĩa đúng route cho subscriptions
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    // Các route khác liên quan đến subscriptions
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route để hiển thị danh sách trang (index)

// Route hiển thị danh sách gói VIP
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('/admin/subscriptions', [SubscriptionController::class, 'index'])->name('admin.subscriptions.index');
// Route tạo gói VIP mới
Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');

// Route lưu gói VIP mới
Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

// Route chỉnh sửa gói VIP
Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');

// Route cập nhật gói VIP
Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');

// Route xóa gói VIP
Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
});
Route::get('/admin/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('admin.subscriptions.edit');
// Định nghĩa route để xử lý update subscription
Route::put('/admin/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('admin.subscriptions.update');
Route::delete('/admin/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('admin.subscriptions.destroy');

// Bài viết
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);  // Tạo route cho tất cả các hành động CRUD của bài đăng
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->names('admin.posts');
});

// Thống kê Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Thêm phong cách
Route::resource('styles', StyleController::class);

// Trang người dùng
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// cho khách chưa đăng nhập
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tin-tuc', function () {
    return view('news');
})->name('tin-tuc');
Route::get('/gioi-thieu', function () {
    return view('intro');
})->name('gioi-thieu');

// Thông tin người dùng
Route::middleware(['auth'])->group(function() {
    // Xem hồ sơ
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile');

    // Chỉnh sửa hồ sơ
    Route::get('/user/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [UserProfileController::class, 'update'])->name('user.update');

    // Đổi mật khẩu
    Route::get('/user/change-password', [UserProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/user/change-password', [UserProfileController::class, 'updatePassword'])->name('update.password');
});
// Chức năng dự đoán
Route::get('/predict', [PredictionController::class, 'showForm'])->name('predict.form');
Route::post('/predict', [PredictionController::class, 'uploadImage'])->name('predict.upload');
Route::get('/user/predict', function () {
    return view('user.predict');
})->name('user.predict');

Route::get('/predict', [ImageController::class, 'showPredictionForm'])->name('predict');
Route::get('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
