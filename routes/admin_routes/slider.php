<?php

/* * ******  Slider Start ********** */
Route::get('list-sliders', array_merge(['uses' => 'Admin\SliderController@indexSliders'], $all_users))->name('list.sliders');
Route::get('create-slider', array_merge(['uses' => 'Admin\SliderController@createSlider'], $all_users))->name('create.slider');
Route::post('store-slider', array_merge(['uses' => 'Admin\SliderController@storeSlider'], $all_users))->name('store.slider');
Route::get('edit-slider/{id}', array_merge(['uses' => 'Admin\SliderController@editSlider'], $all_users))->name('edit.slider');
Route::put('update-slider/{id}', array_merge(['uses' => 'Admin\SliderController@updateSlider'], $all_users))->name('update.slider');
Route::delete('delete-slider', array_merge(['uses' => 'Admin\SliderController@deleteSlider'], $all_users))->name('delete.slider');
Route::get('fetch-sliders', array_merge(['uses' => 'Admin\SliderController@fetchSlidersData'], $all_users))->name('fetch.data.sliders');
Route::put('make-active-slider', array_merge(['uses' => 'Admin\SliderController@makeActiveSlider'], $all_users))->name('make.active.slider');
Route::put('make-not-active-slider', array_merge(['uses' => 'Admin\SliderController@makeNotActiveSlider'], $all_users))->name('make.not.active.slider');
Route::get('sort-sliders', array_merge(['uses' => 'Admin\SliderController@sortSliders'], $all_users))->name('sort.sliders');
Route::get('slider-sort-data', array_merge(['uses' => 'Admin\SliderController@sliderSortData'], $all_users))->name('slider.sort.data');
Route::put('slider-sort-update', array_merge(['uses' => 'Admin\SliderController@sliderSortUpdate'], $all_users))->name('slider.sort.update');
/* * ****** End Slider ********** */



/* * ******  Slider Start TD ********** */
Route::get('list-sliders-td', array_merge(['uses' => 'Admin\SliderController_TD@indexSliderTD'], $all_users))->name('listTD.sliders');
Route::get('create-slider-td', array_merge(['uses' => 'Admin\SliderController_TD@createSliderTD'], $all_users))->name('createTD.slider');
Route::post('store-slider-td', array_merge(['uses' => 'Admin\SliderController_TD@storeSliderTD'], $all_users))->name('storeTD.slider');
Route::get('edit-slider-td/{id}', array_merge(['uses' => 'Admin\SliderController_TD@editSlider'], $all_users))->name('editTD.slider');
Route::put('update-slider-td/{id}', array_merge(['uses' => 'Admin\SliderController_TD@updateSlider'], $all_users))->name('updateTD.slider');
Route::delete('delete-slider-td', array_merge(['uses' => 'Admin\SliderController_TD@deleteSlider'], $all_users))->name('deleteTD.slider');
Route::get('fetch-sliders-td', array_merge(['uses' => 'Admin\SliderController_TD@fetchSlidersData'], $all_users))->name('fetchTD.data.sliders');
Route::put('make-active-slider-td', array_merge(['uses' => 'Admin\SliderController_TD@makeActiveSlider'], $all_users))->name('makeTD.active.slider');
Route::put('make-not-active-slider-td', array_merge(['uses' => 'Admin\SliderController_TD@makeNotActiveSlider'], $all_users))->name('makeTD.not.active.slider');
Route::get('sort-sliders-td', array_merge(['uses' => 'Admin\SliderController_TD@sortSliders'], $all_users))->name('sortTD.sliders');
Route::get('slider-sort-data-td', array_merge(['uses' => 'Admin\SliderController_TD@sliderSortData'], $all_users))->name('sliderTD.sort.data');
Route::put('slider-sort-update-td', array_merge(['uses' => 'Admin\SliderController_TD@sliderSortUpdate'], $all_users))->name('sliderTD.sort.update');
/* * ****** End Slider TD ********** */