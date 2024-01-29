<div class="modal-body">
    <div class="form-body">
    <div class="row">
  
  <div class="col-12">
      <div class="formrow" id="div_title">
          <input class="form-control" id="title" placeholder="{{__('Experience Title')}}" name="title" type="text" value="{{(isset($profileExperience)? $profileExperience->title:'')}}">
          <span class="help-block title-error"></span> 
      </div>
  </div>
  <div class="col-6">
      <div class="formrow" id="div_company">
          <input class="form-control" id="company" placeholder="{{__('Company')}}" name="company" type="text" value="{{(isset($profileExperience)? $profileExperience->company:'')}}">
          <span class="help-block company-error"></span> 
      </div>
  </div>

 
  <div class="col-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
                                <!-- <label class="required" for="city_id">Tỉnh/Thành</label> -->
                                 <select id ="city_id" name ="city_id" class ="form-control form-select" >
                                             <option  value ="" selected disabled hidden> 
                                                 Chọn tỉnh thành
                                            </option>
                                    @foreach($cities as $itemcity)

                                            @if($itemcity->id == $profileExperience->city_id)
                                            <option selected value ={{$itemcity->id}}> 
                                                {{$itemcity->city}}
                                            </option>
                                            @else 
                                            <option value ={{$itemcity->id}}> 
                                                {{$itemcity->city}}
                                            </option>
                                            @endif
                                          
                                         @endforeach

                                 </select>
                            </div>
                        </div>
  <div class="col-6">
      <div class="formrow" id="div_date_start">
          <input class="form-control datepicker"  autocomplete="off" id="date_start" placeholder="{{__('Experience Start Date')}}" name="date_start" type="text" value="{{(isset($profileExperience->date_start)? $profileExperience->date_start->format('Y-m-d'):'')}}">
          <span class="help-block date_start-error"></span> 
        </div>
  </div>
  <div class="col-6">
      <div class="formrow" id="div_date_end">
          <input class="form-control datepicker" autocomplete="off" id="date_end" placeholder="{{__('Experience End Date')}}" name="date_end" type="text" value="{{(isset($profileExperience->date_end)? $profileExperience->date_end->format('Y-m-d'):'')}}">
          <span class="help-block date_end-error"></span> 
        </div>
  </div>
  <div class="col-12">
      <div class="formrow" id="div_is_currently_working">
          <label for="is_currently_working" class="bold">{{__('Currently Working?')}}</label>
          <div class="radio-list">
              <?php
              $val_1_checked = '';
              $val_2_checked = 'checked="checked"';
    
              if (isset($profileExperience) && $profileExperience->is_currently_working == 1) {
                  $val_1_checked = 'checked="checked"';
                  $val_2_checked = '';
              }
              ?>
              <label class="radio-inline"><input id="currently_working" name="is_currently_working" type="radio" value="1" {{$val_1_checked}}> Có </label>
              <label class="radio-inline"><input id="not_currently_working" name="is_currently_working" type="radio" value="0" {{$val_2_checked}}> Không </label>
          </div>
          <span class="help-block is_currently_working-error"></span>
      </div>
  </div>
  <div class="col-12">
      <div class="formrow" id="div_description">
          <textarea name="description" class="form-control" id="description" placeholder="{{__('Experience description')}}">{{(isset($profileExperience)? $profileExperience->description:'')}}</textarea>
          <span class="help-block description-error"></span> 
        </div>
  </div>
</div>
</div>
</div>