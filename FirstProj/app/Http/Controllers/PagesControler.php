<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function home()
    {
    	return view("home");
    }
    public function about()
    {
    	return view("about");
    }
    public function fishs()
    {
    	$fishs=[
    		['nameType'=>'Риба Клоун','count'=>'2'],
    		['nameType'=>'Риба Капля','count'=>'1'],
    		['nameType'=>'Біла Акула','count'=>'1'],

    	];

    	return view("fishs",['fishs'=>$fishs,'pageTitle'=>'Риби',
'script_php'=>'<script>alert("Hello from shark")</script>',
'script_blade'=>'<script>alert("Hello from fish")</script>'
    ]);    
    }

}
class MyFish{
    private $nameType;
    private $count;

    public function __construct(String $nameType,String $count){
        $this->$nameType=$nameType;
        $this->$count=$count;
    }
    public function getNameType():String{
        return $this->nameType;
    }
    public function getCount():String{
        return $this->count;
    }
    public static function getFishs(){
        return [
            new MyFish('Риба Клоун','2'),
            new MyFish('Риба Капля','1'),
            new MyFish('Біла Акула','1');
        ];
    }
    public function fishs(){
        return view("fishs",[
            'fishs'=>MyFish::getFishs(),
            'pageTitle'=>'Риби',

        ])
    }
}
