<?php





#-----------------------------------------------------------------------------------
#  Inviting Vendors ----------------------------------------------------------------
#-----------------------------------------------------------------------------------

Route::get('/my-event-checklist/{id}', 'Users\Tools\CheckListController@index')->name('user.tool.checklist'); 


Route::post('/choose-categories-for-checklist/{id}', 'Users\Tools\CheckListController@saveCategories')->name('user.tool.add.category.checklist'); 



Route::post('/checklist-add-new-task/{id}', 'Users\Tools\CheckListController@newTask')->name('user.tool.checklist.newTask');
Route::post('/checklist-load-all-task/{id}', 'Users\Tools\CheckListController@loadTaskWithForm')->name('user.tool.checklist.loadTaskWithForm');


# get modal popup content via ajax 
Route::get('/get-checklist-task-content/{slug}/{task_id}', 'Users\Tools\CheckListController@getEditTaskContent')->name('user.tool.getEditTaskContent'); 

Route::post('/get-checklist-task-content/{slug}/{task_id}', 'Users\Tools\CheckListController@postEditTaskContent')
->name('user.tool.postEditTaskContent');



#PDF
Route::get('/get-checklist-list-pdf/{slug}', 'Users\Tools\CheckListController@getPDFTaskContent')->name('user.tool.getPDFTaskContent'); 
#PDF
Route::get('/get-checklist-list-print/{slug}', 'Users\Tools\CheckListController@getprintTaskContent')->name('user.tool.getprintTaskContent'); 
