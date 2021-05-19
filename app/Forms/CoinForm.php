<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CoinForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Coin name',
                'rules' => 'required|Max:150',
                'error_messages' => [
                    'name.required' => 'The name field is mandatory.'
                ]
            ])
            ->add('symbol', 'text', [
                'label' => 'Coin symbol',
                'rules' => 'required|Max:150',
                'error_messages' => [
                    'symbol.required' => 'The symbol field is mandatory.'
                ]
            ])
            ->add('description', 'textarea', [
                'label' => 'Coin description',
                'rules' => 'Max:1500'
            ])
            ->add('website', 'url', [
                'label' => 'Coin website',
                'rules' => 'required|Max:1500'
            ])
            ->add('telegram', 'url', [
                'label' => 'Coin telegram',
                'rules' => 'Max:1500'
            ])
            ->add('twitter', 'url', [
                'label' => 'Coin twitter',
                'rules' => 'Max:1500'
            ])
            ->add('youtube', 'url', [
                'label' => 'Coin youtube',
                'rules' => 'Max:1500'
            ])
            ->add('facebook', 'url', [
                'label' => 'Coin facebook',
                'rules' => 'Max:1500'
            ])
            ->add('chain_type', 'select', [
                'choices' => ['0' => 'Ethereum', '1' => 'Binance Smart Contract', '2' => 'Other'],
                'selected' => '0',
                'empty_value' => '=== Select Contract type ==='
            ])
            ->add('contract', 'text', [
                'label' => 'Coin contract',
                'rules' => 'Max:1500'
            ])
            ->add('logo', 'url', [
                'label' => 'Coin logo link',
                'rules' => 'required|Max:1500'
            ])
            ->add('price', 'number', [
                'label' => 'Coin price',
                'rules' => 'Max:15000000000000000'
            ])
            ->add('market_cap', 'number', [
                'label' => 'Coin market cap',
                'rules' => 'Max:15000000000000000'
            ])
            ->add('lauched_date', 'date', [
                'label' => 'Coin lauched date',
                'rules' => 'required'
            ])
            ->add('submit', 'submit');
    }
}
