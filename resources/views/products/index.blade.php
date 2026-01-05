@extends('layouts.app')
<title>Product Mahasiswa</title>
@section('title', 'Product Mahasiswa')
  
@section('contents')
  <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Product</h1>
    
    <div class="d-flex">
        <a href="{{ route('products.trash') }}" class="btn btn-success mr-2">
            <i class="fa fa-trash-restore mr-2"></i>Trash
        </a>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i>Add Product
        </a>
    </div>
</div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($product->count() > 0)
                @foreach($product as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nama }}</td>
                        <td class="align-middle">{{ $rs->nim }}</td>
                        <td class="align-middle">{{ $rs->kelas }}</td>
                        <td class="align-middle">{{ $rs->jurusan }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $rs->id) }}" type="button" class="btn btn-secondary pt-2">Detail</a>
                                <a href="{{ route('products.edit', $rs->id)}}" type="button" class="btn btn-warning pt-2">Edit</a>
                                <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger m-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger pt-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection