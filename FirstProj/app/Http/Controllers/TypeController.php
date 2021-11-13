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
    public function update(Type $type){
        $data=$this->validateData(\request());

        $type->number=$data['number'];
        $type->squad=$data['squad'];

        $fish=Fishs::all($data['fish_id']);
        $type->fish()->associate($fish);
        $type->save();
        return redirect('/types');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateData($data): array
    {
        return $this->validate($data,[
            'number'=>'required|min:3|max:10',
            'squad'=>['required','max:100'],
            'fish_id'=>['required',Rule::exists('fishs','id')],
            [
                'squad.required'=>'Загін має бути заповнен',
                'squad.max'=>'Довжина не може перевищувати 100 символів',
                'number.required'=>'Номер загіну має бути заповнено',
                'number.min'=>'Номер загіну має бути не менше 3 символів',

                'number.max'=>'Номер загіну не може бути 10 символів',
                'fish_id.required'=>'Оберіть карася(рибу)',
                'fish_id.exists'=>'Ви обрали не існуючу рибу'
            ]
        ]);
    }


    public function store(Request $request)
    {
        $data=$this->validateData($request);
        \App\Type::create($data);
            return redirect('/types/');
    }


    public function show(Type $type)
    {
        return view('types/show',['type'=>$type]);
    }

    public function edit(Type $type){
        return view('types/edit',[
            'type'=>$type,
            'fishs'=>Fishs::all()->sortBy('nameType')
        ]);
    }

    public function destroy(Type $type){
        $type->delete();
    }





}
