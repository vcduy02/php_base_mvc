@extends('layout.main')
@section('content')
    <h1>Đây là danh sách sản phẩm</h1>
    <a href="{{ route('add-product') }}"><h3>Thêm sản phẩm</h3></a>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tên</td>
                <td>Giá</td>
                <td>Chỉnh sửa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->ten_sp }}</td>
                    <td>{{ $product->gia }}</td>
                    <td>
                        <a href="{{ route('detail-product/' . $product->id ) }}">Sửa</a>
                        /
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('delete-product/' . $product->id ) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection