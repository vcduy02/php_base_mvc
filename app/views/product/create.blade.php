@extends('layout.main')
@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="{{ route('post-product') }}" method="POST">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_sp">
        <br>
        <label for="">Giá</label>
        <input type="text" name="gia">
        <br>
        <input type="submit" name="create" value="Thêm">
    </form>
@endsection