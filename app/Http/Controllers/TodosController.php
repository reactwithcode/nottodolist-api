<?php

namespace App\Http\Controllers;

// 3b
use Illuminate\Http\Request;
// 4c import facade
use Illuminate\Support\Facades\DB;

// 1c
class TodosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 2a
    public function index() {
        // 5a get data from database (READ / GET ALL)
        return DB::table('todos')->get(); // get() to get in array type
    }
    
    // 3a add request object
    // send request. -> means get property value's object like "." and . means "+"
    public function store(Request $request) {

        // 5c insert / store data to Database
        // return (array) $request
        DB::table('todos')->insert([
            'name' => $request->name,
        ]);

        return "true";
    }

    // 3b send request with id
    public function update(Request $request, $id) {
        // 6 update specified property
        return DB::table('todos')
        ->where('id', $id)->update([
            'isDone'=> $request->isDone,
        ]);
    }

    // 2c get id parameter
    public function view($id) {
        // 5b get specified data from Database
        return json_encode(DB::table('todos')->where('id', $id)->first()); // get data in obj type
    }

    public function delete($id) {
        return DB::table('todos')->where('id', $id)->delete();
    }


    //
}
