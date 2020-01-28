<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Classes\Reply;
use App\Models\category;
use Carbon\Carbon;
use App\Http\Controllers\AdminBaseController;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class AdminCategoryController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('menu.categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make(settings('theme_folder').'admin.users.categories', $this->data);
    }

    public function getCategoriesList()
    {
        $categories = Category::select('id', 'name', 'created_at');

        $data = Datatables::of($categories)
            ->addColumn(
                'action',
                function($row) {
                    // Edit Button
                    $string = '<button onclick="editModal('.$row->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button> ';
                    //Delete Button
                    $string .= '<button onclick="deleteAlert('.$row->id.',\''.addslashes($row->name).'\')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                    return $string;
                }
            )
            ->editColumn(
                'created_at',
                function ($row) {
                    return Carbon::parse($row->created_at)->format('d F, Y');
                }
            )
            
            ->make(true);
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make(settings('theme_folder').'admin.users.categories_create-edit', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        \DB::beginTransaction();

        $category = new Category();
        $category->name  = $request->get('name');
        $category->save();

        \DB::commit();
        return Reply::success('messages.createSuccess');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $this->category = Category::find($id);

        //Call the same create view for edit
        return $this->create();
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        \DB::beginTransaction();

        $category = Category::find($id);
        $category->name     = $request->get('name');
        $category->save();

        \DB::commit();
        return Reply::success('messages.updateSuccess');

    }
    
    
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return Reply::success('messages.deleteSuccess');
    }
}
