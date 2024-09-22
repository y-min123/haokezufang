<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $pageSize = 10;
    public function __construct() {
        $this->pageSize = config('Page.pageSize');
    }
}
