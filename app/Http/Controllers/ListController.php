<?php

namespace App\Http\Controllers;

use App\Status;
use App\Type;
use Illuminate\Http\Request;
use App\Lists;
use Illuminate\Support\Facades\Redirect;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Lists::whereIn('status_id', [1, 3])->orderBy('id', 'desc')->paginate(20);

        return view('list.index', ['list'=>$list]);
    }

    public function all()
    {
        //
        $list = Lists::orderBy('created_at', 'desc')->paginate(20);

        return view('list.all', ['list'=>$list]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type_id = null;
        $status_id = null;
        //$categories = Category::all();
        $types = Type::all();
        $statuses = Status::all();
        return view('list.create',['type_id'=>$type_id, 'types'=>$types], ['status_id'=>$status_id, 'statuses'=>$statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'quantity' => 'required',


        ]);


        $model = new Lists();
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->quantity = $request->input('quantity');
        $model->status_id = $request->input('status_id');
        $model->type_id = $request->input('type_id');
        //print_r($model->category_id);die();
        $model->save();

        return redirect('/list')->with('success', 'Добавлен элемент');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $list = Lists::find($id);
        return view('list.show')->with('list', $list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $list = Lists::find($id);
        $type_id = null;
        $status_id = null;
        //$categories = Category::all();
        $types = Type::all();
        $statuses = Status::all();
        return view('list.edit', ['list'=> $list, 'type_id'=>$type_id, 'types'=>$types, 'status_id'=>$status_id, 'statuses'=>$statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'quantity' => 'required',
        ]);

        $model = Lists::find($id);
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->quantity = $request->input('quantity');
        $model->status_id = $request->input('status_id');
        $model->type_id = $request->input('type_id');
        $model->save();

        return redirect('/list')->with('success', 'Элемент обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        //
//        $list = Lists::orderBy('created_at', 'desc')->paginate(20);
        $model = Lists::find($id);
        $model->status_id = 2;
        $model->save();

        return Redirect::to('/list') ;
    }

    public function destroy($id)
    {
        //
    }
}
