<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Lấy tất cả trang
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Tạo trang mới
        Page::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('pages.index')->with('success', 'Trang đã được tạo');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Cập nhật trang
        $page->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('pages.index')->with('success', 'Trang đã được cập nhật');
    }

    public function destroy(Page $page)
    {
        // Xóa trang
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Trang đã bị xóa');
    }
}
