<?php

namespace App\Http\Controllers;

use App\Fishs;
use Illuminate\Http\Request;
class FishsController extends Controller
{
    public  function index(){
        $fishs=\App\Fishs::all()->sortBy("nameType");
        return view('fishs/index',[
            'fishs'=>$fishs,
            'pageTitle'=>'Список риб',
        ]);
    }
    
    public function getList(){
        return \App\Fishs::all();
    }
    public  function create(){
        return view('fishs/create');
    }
    public function store(){
       $data=request()->validate([
            'fish-name'=>['required','max:100'],
            'fish-count'=>'required|min:1|max:10'
        ],[
            'fish-name.required'=>'Тип риби має бути заповнено',
            'fish-name.max'=>'Довжина не може перевищувати 100 символів',
            'fish-count.required'=>'Кількість риб',
            'fish-count.min'=>'Не менше 1 символу',
            'fish-count.max'=>'Не більше 10 символів'
        ]);

        \App\Fishs::create([
            'nameType'=>$data['fish-name'],
            'count'=>$data['fish-count'],
        ]);
       return redirect('/fishs');
    }
    public function edit(\App\Fishs $fish){
        return view('fishs/edit',['fish'=>$fish,]);
    }
    public  function update(\App\Fishs $fish){
        $fish->update(
            \request()->validate([
                'nameType'=>['required','max:100'],
                'count'=>'required|min:1|max:10',
            ],[
                'nameType.required'=>'Тип риби має бути заповнено',
                'nameType.max'=>'Довжина не може перевищувати 100 символів',
                'count.required'=>'Кількість риб',
                'count.min'=>'Не менше 1 символу',
                'count.max'=>'Не більше 10 символів',
            ])
        );



        return redirect('/fishs');
    }
    public function destroy(\App\Fishs $fish){
        $fish->delete();
    }
    public function show(\App\Fishs $fish){
        if(is_null($fish)) {
            return "студент не існує";
        }
        return view('fishs/show',['fish'=>$fish]);
    }
}
