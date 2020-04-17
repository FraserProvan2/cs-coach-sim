<?php

namespace App\Http\Controllers\Admin\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerCrawlerController extends Controller
{
    public function index()
    {
        return view('admin.crawler.players');
    }
}
