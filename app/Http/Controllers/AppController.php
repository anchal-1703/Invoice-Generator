<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function add()
    {
        return view('add'); // Ensure you have a view named 'add.blade.php'
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('login');
    }

    public function about()
    {
        return view("about");
    }

    // // Function to soft delete
    public function delete($table, $id)
    {
        // return $table.''.$id;
        $param = array('is_deleted' => 1);
        DB::table($table)->where('id', $id)->update($param);

        // // Redirect back
        return redirect()->back()->withStatus("Record deleted successfully");
    }

}