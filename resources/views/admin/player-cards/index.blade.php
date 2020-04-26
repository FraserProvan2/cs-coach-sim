
@extends('admin.layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Player Cards</h1>
</div>

<div class="d-flex my-2">
  <a href="{{ url('/admin/players/create') }}" class="btn btn-primary">Create Player Card</a>
</div>

<div class="row">
  <div class="col-md-12">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">@sortablelink('id')</th>
          <th scope="col">@sortablelink('name')</th>
          <th scope="col">@sortablelink('type')</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($players as $player)
          <tr>
            <td>{{ $player->id }}</td>
            <td>
              <a href="{{ url('admin/players/' . $player->id) }}">
                {{ $player->name }}
              </a>
            </td>
            <td>{{ $player->type }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {!! $players->appends(\Request::except('page'))->render() !!}

  </div>
</div>

@endsection