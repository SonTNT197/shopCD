<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
class StatisticController extends Controller
{
    private $statistic;
    public function __construct(){
        $this->statistic = new Statistic();
    }
    public function listday(Request $req){
        $keyword = $req->keyword;
        $listorderday = $this->statistic->getlistday($keyword);
        $subtotalday = $this->statistic->getsubtotalday($keyword);
        return view('statistic.saleday', compact('keyword', 'listorderday', 'subtotalday'));
    }

    public function listmonth(Request $req){
        $keyword   = $req->keyword;
        $month_key = date('Y-m', strtotime($keyword));
        $listordermonth = $this->statistic->getlistmonth($month_key);
        $subtotalmonth = $this->statistic->getsubtotalmonth($month_key);
        return view('statistic.salemonth', compact('month_key', 'listordermonth', 'subtotalmonth'));
    }

    public function listproselling(){
        $listprosell = $this->statistic->getproselling();
        return view('statistic.prosell', compact('listprosell'));
    }

    public function listprorevenue(){
        $listprorevenue = $this->statistic->getprorevenue();
        return view('statistic.prorevenue', compact('listprorevenue'));
    }

    public function listcusprevenue(){
        $listcusrevenue = $this->statistic->getcusrevenue();
        return view('statistic.cusrevenue', compact('listcusrevenue'));
    }
}
