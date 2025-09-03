
@extends('layout.dashboard')

@section('title', 'تعديل منتج ')

@section('content')
<div class="container mt-5">
    <h2>تعديل المنتج</h2>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>اسم المنتج</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}">
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>السعر</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $item->price) }}">
            @error('price')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button class="btn btn-primary">تحديث المنتج</button>
    </form>
</div>
@endsection
