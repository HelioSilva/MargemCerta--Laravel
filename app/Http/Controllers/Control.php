<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Input;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

use App\Produto ;


class Control extends Controller{


	public function index(){
		return "testeOK";
	}

	public function api(Request $req){



		$client = new Client([
			'base_uri' => 'http://api.sefaz.al.gov.br/sfz_nfce_api/api/public/',
			'timeout'  => 10.0,
		]);

			if($req->has('barras')){
				
				$response = $client->request('POST', 'consultarPrecosPorCodigoDeBarras',[


					'headers' => [
				    'Content-Type' => 'application/json',
					    'appToken'     => 'f8c44f94ec73d4b2b794bcd29da78747a6b674a5'
						
					],
					'body' => '
					   {
							"codigoDeBarras": "'.$req->input('barras').'" ,
						    "dias": '.$req->input('dias').',
						    "latitude": '.$req->input('latitude').',    
						    "longitude": '.$req->input('longitude').',
						    "raio": '.$req->input('raio').'
						}
					',			
				]);

			
			}


       return  $response->getBody()->getContents();  
	}


	public function home(){

		$array = array('resp' => ""  ) ;  

		return view('welcome',$array);
	}

	public function margem(){

		$produtos = Produto::all();
		return view('margem.index',compact('produtos') );

	}

}