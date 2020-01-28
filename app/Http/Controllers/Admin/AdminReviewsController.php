<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\review;
use Carbon\Carbon;
use App\Http\Controllers\AdminBaseController;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class AdminReviewsController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('menu.reviews');
    }

    public function index()
    {
        return \View::make(settings('theme_folder').'admin.users.reviews', $this->data);
    }


}
