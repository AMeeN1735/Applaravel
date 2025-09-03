<?php

namespace App\Http\Controllers\Products;   // لازم يكون أول شيء

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;   // ✅ الحرف I كبير مثل اسم الكلاس بالضبط

class ItemController extends Controller
{
    // عرض قائمة المنتجات
    public function index()
    {
        $items = Item::all();
        $items= item ::expensive()->get();
        return view('items.index', compact('items'));
    }

    // عرض تفاصيل منتج
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    // صفحة إنشاء منتج جديد
    public function create()
    {
        return view('items.create');
    }

    // تخزين منتج جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1',
            'description' => 'required|min:10',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'تمت إضافة المنتج بنجاح');
    }


    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1',
            'description' => 'required|min:10',
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'تم تعديل المنتج بنجاح');
    }

    // حذف منتج
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'تم حذف المنتج بنجاح');
    }
}
