
@extends('admin.layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Player Crawler</h1>
</div>

<div class="row">

  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header">Update</div>
      <div class="card-body">
        <p>Update all players stats</p>
        <a href="" class="btn btn-primary">Crawl</a>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header">Get top 200</div>
      <div class="card-body">
        <p>Get top 200 players</p>
        <a href="" class="btn btn-primary">Crawl</a>
      </div>
    </div>
  </div>

</div>

@endsection