@extends('dashboard')

@section('content')

        <div class="header">
            <h1>Role Admin</h1>
        </div>

        <div class="content">

    <div class="pure-g">
            <form id="" class="pure-form pure-u-1-2" method="post" action="/admin/roles/search">
                {!! csrf_field() !!}
                <input class="form-control" name="search" placeholder="Search">
            </form>
            <div class="pure-u-1-2">
            <a class="pure-button pure-button-primary" href="{{ url('admin/roles/create') }}">Create New Role</a>
            </div>
        </div>
    </p>
            <table class="pure-table pure-table-horizontal">

                <thead>
                    <th>Name</th>
                    <th>Label</th>
                    <th class="text-right">Actions</th>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->label }}</td>
                            <td>
                                <form method="post" action="{!! url('admin/roles/'.$role->id) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="pure-button button-warning button-small" type="submit" onclick="return confirm('Are you sure you want to delete this role?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="pure-button pure-button-primary button-small" href="{{ url('admin/roles/'.$role->id.'/edit') }}"><span class="fa fa-edit"></span> Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
    </p>
</div>

@stop
