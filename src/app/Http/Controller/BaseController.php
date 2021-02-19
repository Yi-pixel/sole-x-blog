<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use ValidatesRequests, DispatchesJobs;
}