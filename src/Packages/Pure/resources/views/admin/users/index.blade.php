@extends('dashboard')

@section('content')

        <div class="header">
            <h1>User Admin</h1>
        </div>

        <div class="content">
                <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-1-2">
                            {!! Form::open(['url' => '/admin/users/search', 'class' => '']) !!}
                            <div class="field">
                                <input class="fluid" name="search" placeholder="Search">
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="pure-u-1 pure-u-md-1-2">
                            <a class="pure-button pure-button-primary" href="{{ url('admin/users/invite') }}">Invite New User</a>
                        </div>
                </div>

                <p>
                @if ($users->isEmpty())
                        <div class="well center aligned">No users found.</div>
                @else

                <table class="pure-table pure-table-horizontal">

                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="post" action="{!! url('admin/users/'.$user->id) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="pure-button button-warning button-small" type="submit" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="pure-button pure-button-primary button-small" href="{{ url('admin/users/'.$user->id.'/edit') }}"><span class="fa fa-edit"></span> Edit</a>
                                </td>
                            </tr>

                    @endforeach

                </tbody>

            </table>
            @endif
        </p>
    </div>

@stop
