<?php

namespace App\Admin\Controllers;

use App\Models\Produit;
use App\Models\ProduitType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProduitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Produit());
        $grid->column('thumbnail', __('Image'))->image('','60', '60')->display(function($val){
            if(empty($val)){
                return "No Image";
            }
            return $val;
        });
        $grid->column('title', "Title");
        $grid->column('sub_title', __("Sub Title"));
        $grid->column('produit.title', __('Category'));
        $grid->column('quantity', 'Quantity');
        $grid->column('nbKilo', 'Kilo');
        $grid->column('nbSac', 'Sac');
        $grid->column('price', 'Price');
        $grid->column('total', 'Total');
        // $grid->column('total', 'Total')->totalRow('Total');
        $grid->column('released')->bool();
        $grid->column('description', __('Content'))->display(function($val){
           return substr($val, 0, 300); 
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
        $show = new Show(Produit::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Produit());
        $form->select('type_id', "Select")->options((new ProduitType())::selectOptions());
        $form->text("title")->placeholder("Type in the Produit title");
        $form->text("sub_title")->placeholder("Type in the produit sub title");

        $form->image('thumbnail');
        // $form->text('description', __('Content'));

        $form->number('quantity', __('Quantity'))->default(0);
        $form->number('nbKilo', __('Kilo'))->default(0);
        $form->number('nbSac', __('Sac'))->default(0);
        $form->number('price', __('Price'))->default(0);
        $form->number('total', __('Total'))->default(0);

        $states = [
              'on'=>['value'=>1, 'text'=>'publish', 'color'=>'success'],
              'off'=>['value'=>0, 'text'=>'draft', 'color'=>'default'],
              ];
              
        $form->switch('released', __('Published'))->states($states);

        return $form;
    }
}
