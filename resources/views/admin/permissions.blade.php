@extends('layouts.admin')

@section('title', 'Create Permission')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active"><a href="/admin/permissions">Permissions</a></li>
    </ol>
    <!-------Header with create button-------->
    <header class="row">
        <div class="col-lg-10">
            <h1>All Permissions</h1>
        </div>
        <div class="col-lg-2 buffer-top">
            <a href="/admin/permissions/create" class="btn btn-success"> Create a Permission</a>
        </div>
    </header>
    <section>
        <!-----if any permissions exist display them in this table if not display no permissions--->
        @if (isset ($permissions))
            <div class="row col-lg-12 columns">
                <table class="table table-bordered">
                    <tr>
                        <th>Permissions</th>
                        <th>Permission Detail</th>
                    </tr>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td><a href="/admin/permissions/{{ $permission->id }}" name="{{ $permission->name }}">{{ $permission->name }}</a></td>
                            <td>{{ $permission->detail }}</td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <p>no permissions</p>
                @endif</div>
    </section>
    </div>
@endsection