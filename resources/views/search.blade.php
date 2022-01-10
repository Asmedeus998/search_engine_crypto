@extends('layout.main')

@section('content')

{{-- @foreach ($data as $item => $value) --}}

      {{-- <h5 class="card-title"> Market USD Price: {{dd($value['bitcoin']['data']['market_price_usd'])}}</h5> --}}

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-secondary"  >Search Crypto Coin</h3>
              </div>
              <div class="card-body">
                <form action="/search" method="get">
                  <div class="form-group">
                    <label for="coin" class="text-secondary">Coin</label>
                    <input type="text" class="form-control" id="coin" name="coin" placeholder="Enter coin name">
                  </div>
                  <button type="submit" class="btn btn-primary">Search</button>
                </form>
              </div>
            </div>
          </div>
        </div>

<div class="container">
    {{-- {{dd($data)}} --}}

    <div class="card mt-5" style="width: 50 rem;">
        <img src={{$data['image']['large']}} class="card-img-top" width="150" height="150">
        <div class="card-body">
            <h5 class="card-title text-dark"> {{$data['symbol']}} ({{$data['name']}}) </h5>
            <p class="card-text text-dark"> {{$data['description']['en']}} </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Market Coin Rank: {{$data['market_cap_rank']}}</li>
            <li class="list-group-item">Price in USD: {{$data['market_data']['current_price']['usd']}}</li>
            <li class="list-group-item">Price change in 24 hour: {{$data['market_data']['price_change_24h']}}</li>
        </ul>
        <div class="card-body">
            <a href="{{$data['links']['homepage'][0]}}" class="card-link">Official Site</a>
        </div>
    </div>

</div>
{{-- @endforeach --}}
@endsection

