<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RickandMortyController extends Controller
{
    private string $baseURL = "https://rickandmortyapi.com/api";
    
    public function getCharacters(){
        
        $get_data = json_decode(file_get_contents($this->baseURL.'/character'));
        return view('characters.index', array('info'=>$get_data->info, 'characters' => $get_data->results));

    }

    public function getCharacter($id){

        $get_data = json_decode(file_get_contents($this->baseURL.'/character'.'/'.$id));
        return view('characters.show', array( 'character' => $get_data));

    }

    public function getlocations(){
        
        $get_data = json_decode(file_get_contents($this->baseURL.'/location'));
        return view('locations.index',  array('info'=>$get_data->info, 'locations' => $get_data->results));

    }

    public function getLocation($id){

        $get_data = json_decode(file_get_contents($this->baseURL.'/location'.'/'.$id));
        return view('locations.show', array( 'location' => $get_data));

    }

    public function getepisodes(){

        $get_data = json_decode(file_get_contents($this->baseURL.'/episode'));
        return view('episodes.index',  array('info'=>$get_data->info, 'episodes' => $get_data->results));

    }

    public function getepisode($id){
        
        $get_data = json_decode(file_get_contents($this->baseURL.'/episode'.'/'.$id));
        return view('episodes.show',  array('episode' => $get_data));

    }

    public function pagination($type,$id){

        $get_data = json_decode(file_get_contents($this->baseURL.'/'.$type.'?page='.$id));

        if($type == 'character'){
            return view('characters.index', array('info'=>$get_data->info, 'characters' => $get_data->results));
        }else if($type == 'location'){
            return view('locations.index',  array('info'=>$get_data->info, 'locations' => $get_data->results));
        }else if($type == 'episode'){
            return view('episodes.index',  array('info'=>$get_data->info, 'episodes' => $get_data->results));
        }else{
        }
        
    }

    public function searchCharacter(){

        $input =  \Illuminate\Support\Facades\Request::all();
        $url = '';

        if(isset($input['name'])){
            $url .= 'name='.$input['name'];
        }

        if(isset($input['status'])){
            $url .= '&status='.$input['status'];
        }

        if(isset($input['species'])){
            $url .= '&species='.$input['species'];
        }

        if(isset($input['gender'])){
            $url .= '&gender='.$input['gender'];
        }

        if(isset($input['type'])){
            $url .= '&type='.$input['type'];
        }

        try{

            $get_data = json_decode(file_get_contents($this->baseURL.'/character/?'.$url));

            return view('characters.index', array('info'=>$get_data->info, 'characters' => $get_data->results));
        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }

}
