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
        // dd($coin_list);
        // dd($coin_list[0]['id']['symbol']['name']);
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
            // dd($coin_list[$i]['id']['symbol']['name']);
            // dd($coin_list[$i]);

            // dd($len);
            if(($coin_list[$i]['symbol'] == $data))
            {
                $data = $coin_list[$i]['id'];
                // dd($data);
                $result = $client->coins()->getCoin($data, ['tickers' => 'false', 'market_data' => 'true']);
                return view('search', ['data' => $result]);
                // dd($result);
            }

        }
        return redirect('/')->with('error','Coin not found');
        // return view('users', compact('data'));
        // return view('search', compact($result));
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
