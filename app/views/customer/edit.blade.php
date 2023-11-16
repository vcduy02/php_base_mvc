@extends('layout.main')
@section('content')
    <h1>Sửa khách hàng</h1>
    <form action="{{ route('edit-customer/' . $customer->id) }}" method="POST">
        <label for="">Tên</label>
        <input type="text" name="ten" value="{{ $customer->ten }}">
        <br>
        <label for="">Tuổi</label>
        <input type="text" name="tuoi" value="{{ $customer->tuoi }}">
        <br>
        <input type="submit" name="update" value="Sửa">
    </form>
@endsection