<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\article;
use Carbon\Carbon;
use App\Http\Controllers\AdminBaseController;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\ArticlesStoreRequest;
use App\Http\Requests\ArticlesUpdateRequest;

class AdminArticlesController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('menu.articles');
    }

    //CK editor to be used for the description part

    public function index()
    {
        return \View::make(settings('theme_folder').'admin.article.articles', $this->data);
    }


}
