<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as FacadesHttp;
// use Illuminate\Support\Facedes\Http;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class UserContorller extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    function search(Request $request)
    {

        $data = $request->coin;

        $client = new CoinGeckoClient();

        $coin_list = $client->coins()->getList();
        $len = count($coin_list);
        $i = 0;
        if($data == 'bitcoin')
        {
            $result = $client->coins()->getCoin('bitcoin', ['tickers' => 'false', 'market_data' => 'true']);
            return view('search', ['data' => $result]);
        }

        if($data == 'ethereum')
        {
            $result = $client->coins()->getCoin('ethereum', ['tickers' => 'false', 'market_data' => 'true']);
            return view('search', ['data' => $result]);
        }

        if($data == 'litecoin')
        {
            $result = $client->coins()->getCoin('litecoin', ['tickers' => 'false', 'market_data' => 'true']);
            return view('search', ['data' => $result]);
        }

        if($data == 'bitcoin-cash' || $data == 'bitcoin cash' )
        {
            $result = $client->coins()->getCoin('bitcoin-cash', ['tickers' => 'false', 'market_data' => 'true']);
            return view('search', ['data' => $result]);
        }

        for($i = 0; $i < $len; $i++)
        {
            if(($coin_list[$i]['symbol'] == $data))
            {
                $data = $coin_list[$i]['id'];

                $result = $client->coins()->getCoin($data, ['tickers' => 'false', 'market_data' => 'true']);
                return view('search', ['data' => $result]);

            }

        }
        return redirect('/')->with('error','Coin not found');

    }

    public function view(){
        $users = User::where('role', '1')->get();

        return view('user', ['users' => $users]);
    }

    public function delete($id){
        User::where('id', $id)->delete();

        return back();
    }
}
