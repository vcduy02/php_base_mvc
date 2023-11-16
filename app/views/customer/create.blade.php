@extends('layout.main')
@section('content')
    <h1>Thêm khách hàng</h1>
    <form action="{{ route('post-customer') }}" method="POST">
        <label for="">Tên</label>
        <input type="text" name="ten">
        <br>
        <label for="">Tuổi</label>
        <input type="text" name="tuoi">
        <br>
        <input type="submit" name="create" value="Thêm">
    </form>
@endsection