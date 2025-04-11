<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index()
    {
        $styles = Style::latest()->get();
        return view('admin.styles.index', compact('styles'));
    }

    public function create()
    {
        return view('admin.styles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('styles', 'public');
        }

        Style::create($data);
        return redirect()->route('admin.styles.index')->with('success', 'Tạo mới thành công!');
    }

    public function edit(Style $style)
    {
        return view('admin.styles.edit', compact('style'));
    }

    public function update(Request $request, Style $style)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('styles', 'public');
        }

        $style->update($data);
        return redirect()->route('admin.styles.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Style $style)
    {
        $style->delete();
        return redirect()->route('admin.styles.index')->with('success', 'Đã xoá!');
    }
    public function show($slug)
    {
        $styles = json_decode(file_get_contents(public_path('data/styles.json')), true);

        $style = collect($styles)->firstWhere('slug', $slug);

        if (!$style) {
            abort(404);
        }
        return view('User.search_style.show', compact('style'));

    }

}

