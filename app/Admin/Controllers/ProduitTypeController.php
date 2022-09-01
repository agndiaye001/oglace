<?php

namespace App\Admin\Controllers;

use App\Models\ProduitType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class ProduitTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Catégories';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProduitType());
        $grid->title("titre");
        $grid->column('barcode.barcode', __('Carcode'));



        return $grid;
    }

    // public function index(Content $content)
    // {
    //     $tree = new Tree(new ProduitType);
    //     return $content
    //         ->header('Catégories')
    //         ->body($tree);
    // }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ProduitType::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProduitType());
        $form->select('parent_id')->options((new ProduitType())::selectOptions());
        $form->text("title")->required();
        $form->select('barcode_id')->options((new ProduitType())::selectOptions());
        $form->number("order")->default(0);


        return $form;
    }

    public function charjs()
    {
        return Admin::content(function (Content $content) {

            $content->header('chart');

            $content->body(view('admin.charts.charjs'));
        });
    }
}
