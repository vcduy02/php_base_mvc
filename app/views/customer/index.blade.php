@extends('layout.main')
@section('content')
    <h1>Đây là danh sách khách hàng</h1>
    <a href="{{ route('add-customer') }}"><h3>Thêm khách hàng</h3></a>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tên</td>
                <td>Tuổi</td>
                <td>Chỉnh sửa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->ten }}</td>
                    <td>{{ $customer->tuoi }}</td>
                    <td>
                        <a href="{{ route('detail-customer/' . $customer->id ) }}">Sửa</a>
                        /
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('delete-customer/' . $customer->id ) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection