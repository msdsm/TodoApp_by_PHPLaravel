<?php

namespace App\Http\Controllers;

use App\Todo; //Todoモデルクラス読み込む
use Illuminate\Http\Request;

class TodolistFormController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('id', 'asc')->get();
        return view('todo_list', [
            "todos" => $todos
        ]);
    }

    public function createPage() //create時
    {
        return view('todo_create'); //createのビュー返す
    }

    //実際にcreateする関数
    public function create(Request $request)
    {
        $todo = new Todo(); //オブジェクト作成
        $todo->task_name = $request->task_name; //代入
        $todo->task_description = $request->task_description; //代入
        $todo->assign_person_name = $request->assign_person_name; //代入
        $todo->estimate_hour = $request->estimate_hour; //代入
        $todo->save(); //保存

        return redirect('/'); //rootベージに戻す
    }

    // editページ渡すだけ
    public function editPage($id)
    {
        $todo = Todo::find($id);
        return view('todo_edit', [
            "todo" => $todo
        ]);
    }

    //edit機能
    public function edit(Request $request)
    {
        Todo::find($request->id)->update([
            'task_name' => $request->task_name,
            'task_description' => $request->task_description,
            'assign_person_name' => $request->assign_person_name,
            'estimate_hour' => $request->estimate_hour
        ]);
        return redirect('/');
    }

    public function deletePage($id)
    {
        $todo = Todo::find($id);
        return view('todo_delete', [
            "todo" => $todo
        ]);
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
