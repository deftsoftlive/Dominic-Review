<?php
namespace App\Traits\Variations;
trait VariationFiledArray{

  public $brands =[

  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#
  public $colors =[
      [
        'label' => 'Color Code',
        'type'  => 'color',
        'name'  => 'color',
        'attrbutes' => [
            'required' => 'true',
            'style' => 'width: 46px; margin-left: -2px;',
            'onchange' => 'fetch()',
            'id' => 'get'    
        ]
      ]
  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#
  public $sizes =[

  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#
  public $styles =[

  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#
  public $types =[

  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#
  public $materials =[

  ];
  #----------------------------------------------------#
  #----------------------------------------------------#
  #----------------------------------------------------#


 


public function addArrayOfAttributesOfFields($type)
{

  return $v = \App\Models\Products\VariationExtra::where('status',1)->where('slug',$type)->get();



	// return [
	// 	'brands' => $this->brands,
	// 	'colors' => $this->colors,
	// 	'sizes' => $this->sizes,
	// 	'styles' => $this->styles,
	// 	'types' => $this->types,
	// 	'materials' => $this->materials,

 //   ];
}

public function attributeField($attribute)
{
  $attributes = json_decode($attribute);
	if(!empty($attributes)){
		$arr= '';
	    $attr = ' [attr]="[value]"';
		foreach ($attributes as $key => $value) {
			 $text  = str_replace('[attr]', $key, $attr);
			 $text  = str_replace('[value]', $value, $text);

			 $arr .=$text;
		}
	   return $arr;
    }
}



#---------------------------------------------------------------------------------
# Color Fields
#---------------------------------------------------------------------------------

public function colorField($arr,$old)
{    
	   $attrbutes = $this->attributeField($arr->attributes);
	   $oldValue = $this->oldValues($old,$arr->name);
     $text  ='<div class="form-group label-floating is-empty"><label class="control-label">Color*</label>';
     $text .='<input type="color" value="'.$oldValue.'" '.$attrbutes.'>';
     $text .='<input type="text" readonly value="'.$oldValue.'" class="form-control valid" name="'.$arr->name.'" id="color" required>';
     $text .='</div>';
     return $text;
}


#---------------------------------------------------------------------------------
# Color Fields
#---------------------------------------------------------------------------------



public function oldValues($old,$name)
{

	if(!empty($old)){
		if(!empty($old->data)){
          $data = json_decode($old->data);
         return !empty($data->$name) ? $data->$name : '';
		}
	}
	
}











}























