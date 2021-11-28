<?php

namespace App\Http\Controllers;

use App\Fishs;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FishsController extends Controller
{
    private $type;
    public function __construct(Request $request)
    {
        $this->type=Type::find($request->route('tpid'));
        view()->share('type_filter_id',$request->route('tpid'));
    }

    public  function index($tp){
        if($this->type){
            $fishs=$this->type->fishs->sortBy("nameType");
        }
        else{

            $fishs=\App\Fishs::all()->sortBy("nameType");
        }

        return view('fishs/index',[
            'fishs'=>$fishs,
            'pageTitle'=>'Список риб',
            'types'=>Type::all()->sortBy('nameType'),
        ]);
    }

    public function getList(){
        return \App\Fishs::all();
    }
    public  function create($tp){
        return view('fishs/create',['types'=>Type::all()->sortBy('number')]);
    }
    public function validateData($data){
        return $this->validate($data,[
            'fish-name'=>['required','max:100'],
            'fish-count'=>'required|min:1|max:10',
            'fish-type'=>['required',Rule::exists('types','id')]
            ],[
                'fish-name.required'=>'Тип риби має бути заповнено',
                'fish-name.max'=>'Довжина не може перевищувати 100 символів',
                'fish-count.required'=>'Кількість риб',
                'fish-count.min'=>'Не менше 1 символу',
                'fish-count.max'=>'Не більше 10 символів',
                'fish-type.required'=>'Загін риб не може бути порожнім',
                'fish-type.exists'=>'Ви обрали не існуючий загін'
            ]
        );
    }

    public function store($tp){
       $data=$this->validateData(\request());

        \App\Fishs::create([
            'nameType'=>$data['fish-name'],
            'count'=>$data['fish-count'],
            'type_id'=>$data['fish-type']

        ]);
       return redirect('type/'.$tp.'/fishs');
    }
    public function edit($tp,\App\Fishs $fish){
        return view('fishs/edit',['fish'=>$fish,'types'=>Type::all()->sortBy('number')]);
    }
    public  function update($tp,\App\Fishs $fish){
        $data=$this->validateData(\request());
        $fish->nameType=$data['fish-name'];
        $fish->type()->associate(Type::find($data['fish-type']));
        $fish->save();



        return redirect('type/'.$tp.'/fishs');
    }
    public function destroy($tp,\App\Fishs $fish){
        $fish->delete();
    }
    public function show($tp,\App\Fishs $fish){

        return view('fishs/show',['fish'=>$fish]);
    }
}
