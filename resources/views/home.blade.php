@extends('layout.main')

@section('content')


{{-- {{ dd($data['data']) }} --}}

<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.blockchair.com/stats');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER , false);
    $result = curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    // $string_result = json_encode($result); convert PHP to json structure
    $array_result = json_decode($result, true); // convert json to PHP array
    // print("<pre>" . print_r($array_result, true) . "</pre>");
    $bitcoin_market_price = $array_result['data']['bitcoin']['data']['market_price_usd'];
    $bitcoin_cash_market_price = $array_result['data']['bitcoin-cash']['data']['market_price_usd'];
    $ethereum_market_price = $array_result['data']['ethereum']['data']['market_price_usd'];
    $litecoin_market_price = $array_result['data']['litecoin']['data']['market_price_usd'];
    // var_dump($array_result);
    // / print("<pre>" . print_r($coin_name, true) . "</pre>");

?>


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
                <form action="/search" method="post">
                    @csrf
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
    <h4> Latest Market Price </h4>
    </div>

      <a class="explore-card-wrap" href="/bitcoin">
        <div class="explore-card-content">
            <div class="explore-card__header"> <img src="https://loutre.blockchair.io/assets/svg/chains/bitcoin.svg?_nocache=1" class="explore-card__header__logo" alt="bitcoin logo" loading="lazy" />
                <div class="explore-card__header__text ml-15">
                    <h5 class="h5 explore-card__header__text__name">Bitcoin</h5>
                    <div class="explore-card__header__text__price">
                        <price v-slot="{ valueUsd, change24h, changeStyle, arrowClass }" class="explore-card__header__text__price__change" >
                            <div class="price-wrap d-flex ai-center" class="explore-card__header__text__price__change" >
                                <span class="price-usd">$
                                    <span v-update:number="valueUsd"> <?=$bitcoin_market_price?>
                                    </span>
                                </span>
                            </div>
                        </price>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a class="explore-card-wrap mt-5" href="/ethereum">
        <div class="explore-card-content">
            <div class="explore-card__header"> <img src="https://loutre.blockchair.io/assets/svg/chains/ethereum.svg?_nocache=1" class="explore-card__header__logo" loading="lazy" />
                <div class="explore-card__header__text ml-15">
                    <h5 class="h5 explore-card__header__text__name">Ethereum</h5>
                    <div class="explore-card__header__text__price">
                        <price v-slot="{ valueUsd, change24h, changeStyle, arrowClass }" class="explore-card__header__text__price__change" >
                            <div class="price-wrap d-flex ai-center" class="explore-card__header__text__price__change" >
                                <span class="price-usd">$
                                    <span v-update:number="valueUsd"> <?=$ethereum_market_price?>
                                    </span>
                                </span>
                            </div>
                        </price>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a class="explore-card-wrap mt-5" href="/bitcoin_cash">
        <div class="explore-card-content">
            <div class="explore-card__header"> <img src="https://loutre.blockchair.io/assets/svg/chains/bitcoin-cash.svg?_nocache=1" class="explore-card__header__logo" loading="lazy" />
                <div class="explore-card__header__text ml-15">
                    <h5 class="h5 explore-card__header__text__name">Bitcoin Cash</h5>
                    <div class="explore-card__header__text__price">
                        <price v-slot="{ valueUsd, change24h, changeStyle, arrowClass }" class="explore-card__header__text__price__change" >
                            <div class="price-wrap d-flex ai-center" class="explore-card__header__text__price__change" >
                                <span class="price-usd">$
                                    <span v-update:number="valueUsd"> <?=$bitcoin_cash_market_price?>
                                    </span>
                                </span>
                            </div>
                        </price>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a class="explore-card-wrap mt-5" href="/litecoin">
        <div class="explore-card-content">
            <div class="explore-card__header"> <img src="https://loutre.blockchair.io/assets/svg/chains/litecoin.svg?_nocache=1" class="explore-card__header__logo" loading="lazy" />
                <div class="explore-card__header__text ml-15">
                    <h5 class="h5 explore-card__header__text__name">Litecoin</h5>
                    <div class="explore-card__header__text__price">
                        <price v-slot="{ valueUsd, change24h, changeStyle, arrowClass }" class="explore-card__header__text__price__change" >
                            <div class="price-wrap d-flex ai-center" class="explore-card__header__text__price__change" >
                                <span class="price-usd">$
                                    <span v-update:number="valueUsd"> <?=$litecoin_market_price?>
                                    </span>
                                </span>
                            </div>
                        </price>
                    </div>
                </div>
            </div>
        </div>
    </a>
{{-- @endforeach --}}
@endsection

