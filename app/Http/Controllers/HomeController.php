<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CoinForm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function addCoin(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CoinForm::class, [
            'method' => 'POST',
            'url' => route('coin.store')
        ]);

        return view('addCoin', compact('form'));
    }

    public function storeCoin(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CoinForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $coin = new Coin();
        $coin->name = $form->getFieldValues()["name"];
        $coin->contract = $form->getFieldValues()["contract"];
        $coin->description = $form->getFieldValues()["description"];
        $coin->market_cap = $form->getFieldValues()["market_cap"];
        $coin->lauched_date = $form->getFieldValues()["lauched_date"];
        $coin->logo = $form->getFieldValues()["logo"];
        $coin->symbol = $form->getFieldValues()["symbol"];
        $coin->telegram = $form->getFieldValues()["telegram"];
        $coin->website = $form->getFieldValues()["website"];
        $coin->chain_type = $form->getFieldValues()["chain_type"];
        $coin->twitter = $form->getFieldValues()["twitter"];
        //$coin->facebook = $form->getFieldValues()["facebook"];
        //$coin->instagram = $form->getFieldValues()["instagram"];
        $coin->youtube = $form->getFieldValues()["youtube"];
        $coin->user_id = auth()->user()->id;
        $coin->save();

        $showDialog = true;
        return view('welcome', ['willShow' => $showDialog]);
    }
}
