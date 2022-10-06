@extends('layouts.app')

@if (Session::get('msg'))
    <div class="alert bg-success alert-icon-left mb-2 text-white text-center">
        {{ Session::get('msg') }}
    </div>
@endif

@section('admin-content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Travel Together</h1>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listRoom as $index => $room)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $room->title }}</td>
                        <td>
                            <form action="{{ route('destroy-travtogether', $room->travTogetherId) }}" method="POST">
                                @method('delete')
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="pagination justify-content-center">
            {{ $listRoom->links() }}
        </div>
    </div>
@endsection
