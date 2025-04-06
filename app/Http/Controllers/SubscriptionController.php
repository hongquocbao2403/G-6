<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Hiển thị danh sách các gói VIP
    // app/Http/Controllers/SubscriptionController.php

    public function index()
    {
        $subscriptions = Subscription::with('user')->get(); // Lấy tất cả gói VIP và người dùng liên quan
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    // Hiển thị form tạo gói VIP mới
    public function create()
    {
        return view('admin.subscriptions.create');
    }

    // Lưu gói VIP mới
    public function store(Request $request)
    {
        // Lấy người dùng đang đăng nhập (hoặc ID người dùng nào đó)
        $user_id = auth()->id(); // Nếu bạn dùng Laravel Authentication

        // Tạo gói VIP và liên kết với người dùng
        $subscription = Subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $user_id
        ]);

        return redirect()->route('admin.subscriptions.index');
    }
    public function edit($id)
    {
        $subscription = Subscription::find($id);

        // Kiểm tra nếu không tìm thấy đăng ký
        if (!$subscription) {
            return redirect()->route('admin.subscriptions.index')->with('error', 'Không tìm thấy đăng ký!');
        }
        // Trả về view với dữ liệu đăng ký
        return view('admin.subscriptions.edit', compact('subscription'));
    }
    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        // Kiểm tra nếu không tìm thấy đăng ký
        if (!$subscription) {
            return redirect()->route('admin.subscriptions.index')->with('error', 'Không tìm thấy đăng ký!');
        }
        // Xóa đăng ký
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Đăng ký đã bị xóa!');
    }
    public function update(Request $request, $id)
    {
        // Tìm Gói cước theo ID
        $subscription = Subscription::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Cập nhật thông tin Gói cước
        $subscription->name = $validated['name'];
        $subscription->price = $validated['price'];

        // Lưu thay đổi vào cơ sở dữ liệu
        $subscription->save();

        // Quay lại trang danh sách hoặc trang chỉnh sửa với thông báo thành công
        return redirect()->route('admin.subscriptions.index')->with('success', 'Cập nhật Gói cước thành công!');
    }
}


