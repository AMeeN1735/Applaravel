@extends('layout.dashboard')

@section('title', 'تفاصيل المنتج')


@section('content')
<div class="container mt-5">
    <h2>تفاصيل المنتج</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $item->name }}</h4>
            <p><strong>السعر:</strong> {{ $item->price }}</p>
            <p><strong>الوصف:</strong> {{ $item->description }}</p>
        </div>
    </div>

    <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">رجوع للقائمة</a>
</div>
@endsection
