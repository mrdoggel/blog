<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{

    public function index() {
        return view('welcome', ['listItems' => ListItem::all()]);
    }
    public function addItem(Request $request) {
        $newItem = new ListItem;
        $newItem->name = $request->listItem;
        $newItem->is_complete = 0;
        $newItem->save();

        return redirect('/');
    }
}
