<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">@if(isset($category->id)) @lang('core.edit')@else @lang('core.add') @endif @lang('core.category') </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form1']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.name')</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="@lang('core.name')" value="{{$category->name or ''}}">
            </div>
        </div>


        {{---------------------Show Status change for  Edit Users-------------}}
        {{-- @if(isset($user->id))
            <div class="form-group">
                <label  class="col-sm-2 control-label">@lang('core.status')</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios1" value="active" @if($user->status=='active') checked @endif>
                            @lang('core.active')
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="inactive" @if($user->status=='inactive') checked @endif>
                            @lang('core.inactive')
                        </label>
                    </div>
                </div>
                @endif
                {{--------------------------END HERE----------------------------------}}

            {{-- </div>  --}}
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="addEditCategory({{$category->id or ''}});return false">Submit</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
{{Form::close()}}