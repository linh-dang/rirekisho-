@extends('xCV.template')
<title>Xem 1 </title>
@section('content')

    <div class="display-box" style="">
        <div class="top-card " style="">
            <div class="profile">
                <div class="profile-picture ">
                    <?php ?>
                    @if(isset($image)&&($image!=""))
                        <img style="height: 200px; width: 200px;" src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};font-size:120px;">
                                {{substr(trim($CV->name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="clear-fix"></div>
                <div class="profile-overview ">
                    <ul class="profile-nav clickable">
                        <li class="title">
                            <h2> {{$CV->Last_name}} {{$CV->First_name}}</h2>
                            <h3>{{$CV->Furigana_name}}
                                @can('Visitor')
                                    <a data-action="bookmark" data-bookmark-id="{{$CV->user_id}}"
                                       style='color:#efa907;' title="Bookmark this user!">
                                        @if($bookmark)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o "></i>
                                        @endif
                                    </a>

                                @endcan
                            </h3>
                        </li>

                        <li class="p-link">
                            <a class="" name="P-info">
                                <i class="fa fa-user " id="p-active"></i>
                                <div class="li-text">個人情報</div>

                            </a>
                        </li>

                        <li class="p-link">
                            <a class="" name="P-school">
                                <i class="fa fa-graduation-cap"></i>
                                <div class="li-text">学歴・免許・資格</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a name="P-work">
                                <i class="fa fa-history "></i>
                                <div class="li-text">職歴</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a  name="P-selfintro">
                                <i class="fa fa-file-text "></i>
                                <div class="li-text">自己紹介・希望</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a name="P-download">
                                <i class="fa fa-keyboard-o "></i>
                                <div class="li-text">IT skill</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a name="P-skill">
                                <i class="fa fa-keyboard-o "></i>
                                <div class="li-text">IT skill</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a href="{{url('CV',[$CV ,'getPDF'])}}" name="">
                                <i class="fa fa-download "></i>
                                <div class="li-text">Download CV</div>

                            </a>
                        </li>

                    </ul>
                </div>
                <div class="profile-link">
                    <a href=""></a>
                </div>
            </div>

        </div>

        <div class="basic-info">
            <div class="hd">

            </div>

            <div class="bd" id="P-info">
                <ul>
                    <li>
                        <table>
                            <tr>
                                <th><h2>個人情報</h2></th>
                            </tr>
                            <tr>
                                <th><h4>生年月日</h4></th>
                                <td>{{$CV->BDay}} （満 {{$CV->Age}}歳）</td>

                            </tr>
                            <tr>
                                <th><h4>性別</h4></th>
                                <td> {{$CV->Jgender}} </td>
                            </tr>

                            <tr>
                                <th><h4>配偶者</h4></th>
                                <td>{{$CV->Jmarriage}} </td>

                            </tr>
                        </table>
                    </li>
                    <li>
                        <table>
                            <tr>
                                <th><h2>連絡情報</h2></th>
                            </tr>
                            <tr>
                                <th><h4>電話</h4></th>
                                <td>{{$CV->Phone}}</td>

                            </tr>
                            <tr>
                                <th><h4>現住所</h4></th>
                                <td>{{$CV->Address}}</td>

                            </tr>
                            <tr>
                                <th><h4>連絡先</h4></th>
                                <td>{{$CV->Contact_information}}</td>

                            </tr>
                        </table>
                    </li>
                </ul>
            </div>


            <div class="bd" id="P-school" style="display: none;">
                <ul>
                    <li>
                        <table>
                            <tr>
                                <th><h2>学歴</h2></th>
                            </tr>
                            <?php
                            $School = $Records->filter(function ($item) {
                                return $item->getRole() == "School";
                            });
                            ?>
                            @if(!$School->count())
                                <tr class="no-record">
                                    <td colspan="2">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($School as $Record)
                                    <?php $r_id = $Record ; ?>

                                    <tr>
                                        <th><h4>{{$Record->Jdate}}</h4></th>
                                        <td>{{$Record->Content}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li>
                        <?php
                        $Cert = $Records->filter(function ($item) {
                            return $item->getRole() == "Cert";
                        });
                        ?>
                        <table>
                            <tr>
                                <th><h2>免許・資格</h2></th>
                            </tr>


                            @if(!$Cert ->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Cert as $Record)
                                    <?php $r_id = $Record ; ?>

                                    <tr>
                                        <th><h4>{{$Record->Jdate}}</h4></th>
                                        <td>{{$Record->Content}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                </ul>
            </div>
            <div class="bd" id="P-selfintro" style="display: none;">
                <ul>
                    <li>
                        <table>
                            <tr>
                                <th><h2>自己紹介</h2></th>
                                <td>{{$CV->Self_intro}} </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table>
                            <tr>
                                <th><h2>希望</h2></th>
                                <td>{{$CV->Request}} </td>
                            </tr>

                        </table>
                    </li>
                </ul>
            </div>
            <div class="bd" id="P-work" style="display: none;">

                <?php
                $Work = $Records->filter(function ($item) {
                    return $item->getRole() == "Work";
                });
                ?>
                <table>
                    <tr>
                        <th><h2>職歴</h2></th>
                    </tr>


                    @if(!$Work ->count())
                        <tr>
                            <th></th>
                            <td style="color: gray;">There are no records to display</td>
                        </tr>
                    @else
                        @foreach ($Work as $Record)
                            <?php $r_id = $Record ; ?>

                            <tr>
                                <th><h4>{{$Record->Jdate}}</h4></th>
                                <td>{{$Record->Content}}  </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            <div class="bd" id="P-skill" style="display: none;">

                <?php
                $Work = $Records->filter(function ($item) {
                    return $item->getRole() == "Work";
                });
                ?>
                <table>
                    <tr>
                        <th><h2>職歴</h2></th>
                    </tr>

                    @if(!$Work ->count())
                        <tr>
                            <th></th>
                            <td style="color: gray;">There are no records to display</td>
                        </tr>
                    @else
                        @foreach ($Work as $Record)
                            <?php $r_id = $Record ; ?>

                            <tr>
                                <th><h4>{{$Record->Jdate}}</h4></th>
                                <td>{{$Record->Content}}  </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

        </div>
        <div class="ft">
            更新日: {{$CV->updated_at}}
        </div>
    </div>

@stop