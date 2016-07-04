@extends('dashboard')

@section('content')

        <div class="header">
            <h1>Team Manager</h1>
        </div>
        <div class="content">
            @include('partials.errors')
            @include('partials.message')

    <div class="pure-g">
            {!! Form::open(['url' => 'teams/search', 'class' =>'pure-form pure-u-1-2']) !!}
                <input class="form-control" name="search" placeholder="Search">
            {!! Form::close() !!}
            <div class="pure-u-1-2">
            <a class="pure-button pure-button-primary" href="{{ url('teams/create') }}">Create New Team</a>
            </div>
        </div>
    </div>
        <p>
            @if ($teams->isEmpty())
                <div class="well text-center">No teams found.</div>
            @else
                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <th>Name</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <form method="post" action="{!! url('teams/'.$team->id) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="pure-button button-warning button-small" type="submit" onclick="return confirm('Are you sure you want to delete this team?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="pure-button pure-button-primary button-small" href="{!! route('teams.edit', [$team->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    {!! $teams; !!}
                </div>
            @endif
        </p>
    </div>

@stop