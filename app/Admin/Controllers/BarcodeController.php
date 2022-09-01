<?php

namespace App\Admin\Controllers;

use App\Models\Barcode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use \Milon\Barcode\DNS1D;

class BarcodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Barcode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Barcode());
        $grid->column('barcode', "Barcode");
        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('barcode', 'Barcode');
        });
        
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
        $show = new Show(Barcode::findOrFail($id));



        return $show;
    }



    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Barcode());
        $form->text('barcode');
        $d = new DNS1D();
        return $form;
    }


}
