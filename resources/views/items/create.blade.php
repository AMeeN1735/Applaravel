@extends('layout.dashboard')

@section('title', ' اضافة منتج')


@section('content')
<div class="container mt-5">
    <h2>إضافة منتج جديد</h2>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>اسم المنتج</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>السعر</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            @error('price')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button class="btn btn-success">حفظ المنتج</button>
    </form>
</div>
@endsection
