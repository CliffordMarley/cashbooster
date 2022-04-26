@extends('layouts.main2')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Game Play Outcomes</h4>
              <p class="card-description">
                A List of alla avilable games and their possible returns 
              </p>
              <div class="table-responsive">
        <table  id="datatable2" class="table">
            <thead>
                <th>#</th>
                <th>Game Name</th>
                <th>Outcome</th>
                <th>Chances</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($gameaplay as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->game_name }}</td>
                    <td>{{ $game->outcome }}</td>
                    <td>{{ $game->roi }}%</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">Edit</a> |
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
              </div></div></div>
    </div>
</div>

@endsection
