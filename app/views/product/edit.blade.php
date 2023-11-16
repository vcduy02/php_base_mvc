@extends('layout.main')
@section('content')
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('edit-product/' . $product->id) }}" method="POST">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_sp" value="{{ $product->ten_sp }}">
        <br>
        <label for="">Giá</label>
        <input type="text" name="gia" value="{{ $product->gia }}">
        <br>
        <input type="submit" name="update" value="Sửa">
    </form>
@endsection