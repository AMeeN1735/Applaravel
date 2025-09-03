@extends('layout.dashboard')

@section('title', 'عرض المنتجات')

@section('content')
<div class="container mt-5">

    {{-- العنوان + زر إضافة --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            📦 قائمة المنتجات
        </h2>
        <a href="{{ route('items.create') }}" class="btn btn-success shadow-sm px-4">
            ➕ إضافة منتج جديد
        </a>
    </div>

    {{-- رسالة نجاح --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    {{-- جدول المنتجات --}}
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
            <table class="table table-hover table-striped align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>الاسم</th>
                        <th>السعر</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item->name }}</td>
                            <td >{{ $item->price }}ريال</td>

                            <td class="text-success fw-bold">{{ number_format($item->price, 2) }} $</td>
                            <td class="text-muted">{{ Str::limit($item->description, 50) }}</td>
                            <td>
                                <a href="{{ route('items.show', $item->id) }}" class="btn btn-sm btn-outline-info me-1">
                                    👁 عرض
                                </a>
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    ✏️ تعديل
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('⚠️ هل تريد حذف هذا المنتج؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">🗑 حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted py-4">🚫 لا توجد منتجات بعد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
