@extends('xCV.template')
<title>Sửa trạng thái</title>

@section('content')
    <form action="{{route('status::update', $Status->id)}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Sửa trạng thái CV </h3></label>
            @include('includes.flash-alert');
            <hr>
            <div class="float_left" style="width: 100%;  ">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Tên trạng thái <i style="color: red;">*</i></label>
                            <div class="input">
                                <input required="required" type="text" placeholder="status" class="input-right"
                                       name="status" value="{{old('status')?old('status'):$Status->status}}">
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Update status"
                               class="b-purple">
                        <input type="button" form="profile-forms" name="" value="Cancel"
                               class="b-purple" onclick="window.location='{{URL::route('status.index')}}'">
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop