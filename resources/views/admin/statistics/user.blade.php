@extends('dashboard')
<title>Thông kê tài khoản</title>
@section('content')

    <div id="chart" style="height: 250px;"></div>

    {{--<script>--}}
    {{--Morris.Bar({--}}
        {{--element: 'chart',--}}
        {{--data: [--}}
            {{--{ date: '04-02-2014', value: 3 },--}}
            {{--{ date: '04-03-2014', value: 10 },--}}
            {{--{ date: '04-04-2014', value: 5 },--}}
            {{--{ date: '04-05-2014', value: 17 },--}}
            {{--{ date: '04-06-2014', value: 6 }--}}
        {{--],--}}
        {{--xkey: 'date',--}}
        {{--ykeys: ['value'],--}}
        {{--labels: ['Orders']--}}
    {{--});--}}
    {{--</script>--}}


@stop