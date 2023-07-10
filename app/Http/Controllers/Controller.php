<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data=[];

    public function __construct()
    {
        $menu=Navigation::all();
        $this->data['menu']=$menu;
    }
}
