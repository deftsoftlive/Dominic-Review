<?php
namespace App\Traits\Variations;
trait VariationAttributes{
 
public function InputTypeAttribute()
{
    return [
         //'text' => 'text',
         'color' => 'color',
         // 'file' => 'file',
         // 'textarea' => 'textarea',
         // 'select' => 'select',

    ];
}




public function InputOtherAttribute()
{
    return [
         'class' => 'class',
         'id' => 'id',
         'style' => 'style',
         'placelholder' => 'placelholder',
         'onchange' => 'onchange'

    ];
}











}



























