@extends('layouts.app')
  
@section('title', 'Products Trash')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Trash Product</h1>
        <div class="d-flex">
            @if($product->isNotEmpty())
                <a href="{{ route('products.deleteAll') }}" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete ALL data permanently?')">
                    <i class="fa fa-trash mr-1"></i> Delete All
                </a>
                <a href="{{ route('products.restore') }}" class="btn btn-success mr-2" onclick="return confirm('Are you sure you want to recover ALL data?')">
                    <i class="fa fa-trash-restore mr-1"></i> Restore All
                </a>
            @endif
            <a href="{{ route('products') }}" class="btn btn-secondary">
                <i class="fa fa-chevron-left mr-1"></i> Back
            </a>
        </div>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th class="text-center" width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($product as $rs)
                <tr>
                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->nama }}</td>
                    <td class="align-middle">{{ $rs->nim }}</td>
                    <td class="align-middle">{{ $rs->kelas }}</td>
                    <td class="align-middle">{{ $rs->jurusan }}</td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('products.deleteAll', $rs->id) }}" class="btn btn-danger btn-sm mr-2" onclick="return confirm('Delete this data permanently?')">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="{{ route('products.restore', $rs->id) }}" class="btn btn-success btn-sm" onclick="return confirm('Recover this data?')">
                                <i class="fa fa-trash-restore"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-uppercase" colspan="6">Trash is empty</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection