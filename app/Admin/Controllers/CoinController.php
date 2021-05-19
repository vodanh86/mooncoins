<?php

namespace App\Admin\Controllers;

use App\Models\Coin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoinController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Coin';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Coin());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('market_cap', __('Market cap'));
        $grid->column('logo', __('Logo'))->image(50,50);
        $grid->column('symbol', __('Symbol'));
        $grid->column('chain_type', __('Chain type'));
        $grid->column('status', __('Status'));
        $grid->column('vote', __('Vote'));
        $grid->column('coin_type', __('Coin type'));
        $grid->column('promoted', __('Promoted'));
        $grid->column('lauched_date', __('Lauched date'));
        $grid->column('verify', __('Verify'));

        $grid->model()->orderBy('id', 'desc');
        $grid->quickSearch('name', 'symbol');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Coin::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('contract', __('Contract'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('market_cap', __('Market cap'));
        $show->field('lauched_date', __('Lauched date'));
        $show->field('logo', __('Logo'));
        $show->field('symbol', __('Symbol'));
        $show->field('telegram', __('Telegram'));
        $show->field('website', __('Website'));
        $show->field('chain_type', __('Chain type'));
        $show->field('status', __('Status'));
        $show->field('vote', __('Vote'));
        $show->field('coin_type', __('Coin type'));
        $show->field('promoted', __('Promoted'));
        $show->field('ips', __('Ips'));
        $show->field('twitter', __('Twitter'));
        $show->field('facebook', __('Facebook'));
        $show->field('instagram', __('Instagram'));
        $show->field('verify', __('Verify'));
        $show->field('youtube', __('Youtube'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Coin());

        $form->text('name', __('Name'));
        $form->text('contract', __('Contract'));
        $form->text('description', __('Description'));
        $form->text('price', __('Price'));
        $form->text('market_cap', __('Market cap'));
        $form->date('lauched_date', __('Lauched date'))->default(date('Y-m-d'));
        $form->text('logo', __('Logo'));
        $form->text('symbol', __('Symbol'));
        $form->text('telegram', __('Telegram'));
        $form->text('website', __('Website'));
        $form->number('chain_type', __('Chain type'));
        $form->number('status', __('Status'));
        $form->number('vote', __('Vote'));
        $form->text('coin_type', __('Coin type'));
        $form->number('promoted', __('Promoted'));
        $form->textarea('ips', __('Ips'));
        $form->text('twitter', __('Twitter'));
        $form->text('facebook', __('Facebook'));
        $form->text('instagram', __('Instagram'));
        $form->number('verify', __('Verify'));
        $form->text('youtube', __('Youtube'));

        return $form;
    }
}
