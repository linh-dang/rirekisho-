@if(!$CVs->count())
    <tr class="no-record">
        <td colspan="6">
            <center>There are no records to display</center>
        </td>
    </tr>
@else
    <?php $CVx = $CVs->reject(function ($item) {
        return $item->Name == null || $item->Age == "0000-00-00";
    });
    ?>
    @foreach ($CVx as $CV)
        <tr class="data">
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px;">
                    <?php $image = $CV->User->image;?>
                    @if($image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                    <!--img style="height: 100px; width: 100px;"  src= "/img/no_image.gif"-->
                        <span class="dropzone-text">No image</span>
                    @endif
                </div>
            </td>
            <td class="rank">{{ $CV->id }}</td>
            <td class="name"><a href="{{url('CV',$CV->id)}} ">{{ $CV->Name }} </a></td>
            <td class="name">{{ $CV->Furigana_name }}  </td>
            <td class="worth">{{$CV->j_gender}}</td>
            <td data-field="age">{{ $CV->Age }} 歳</td>
            <td></td>
            @can('Admin')
                <td><a href="{{url('CV',[$CV->id,'edit'])}}">Sửa</a></td>
            @endcan
        </tr>
    @endforeach
    <tr id="number-result" style="display: none;">
        <td colspan="6">Có {{$CVs->count() }} kết quả</td>
    </tr>
@endif