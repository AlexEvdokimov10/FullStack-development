<?php

namespace App\Http\Controllers;

use App\Fishs;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{

    public function index(){
        return view('types/index',['types'=>Type::all()->sortBy('number')]);
    }


    public function create()
    {
        return view('types/create',['fishs' => Fishs::all()->sortBy('nameType')]);

    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'number'=>'required|min:1|max:10',
            'squad'=>['required','max:100'],
            'fish_id'=>['required',Rule::exists('fishs','id')]],[
                'squad.required'=>'Загін повинен бути заповнений!',
                'squad.max'=>'Довжина не  може перевищувати 100 символів',
                'number.required'=>'Номер загіну не може бути повинен порожний',
                'number.min'=>'Номер загіну не може бути менше 1 символу',
                'number.max'=>'Номер загіну не може бути більше 100 символів',
                'fish_id.required'=>'Оберіть рибу',
                'fish_id.exists'=>'Ви обрали неіснуючу рибу'
            ]);
            \App\Type::create($data);
            return redirect('/fishs');
    }


    public function show(Type $type)
    {
        return view('types/show',['type'=>$type]);
    }




}
