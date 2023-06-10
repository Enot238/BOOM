@extends('auth.layouts.master')

@section('title', 'Замовлення')

@section('content')

{{--    {{@\Illuminate\Support\Facades\Auth::user()->utype}}--}}


<div class="grid grid-rows-2 gap-5" style="width: 80%">
    <div class="">
        <button id="btn1" style="border-bottom: solid #222; border-bottom-left-radius: 8px" class="btn text-xl px-3 py-3 tabbtn " onclick="openCity('New', 'btn1')">Нові замовлення</button>
        <button id="btn2" class="btn text-xl px-3 py-3 tabbtn " onclick="openCity('Success', 'btn2' )">Підтвердженні замовлення</button>
        <button id="btn3" class="btn text-xl px-3 py-3 tabbtn " onclick="openCity('Reject', 'btn3')">Відхилені замовлення</button>
    </div>

    <div>
        <!--Tabs content-->
        <div id="New" class="city">
            <div class="col-md-12">
                <h1>Замовлення</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>№</th>
                        <th>Ім'я</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Сума</th>
                        <th>Дії</th>
                    </tr>
                    @foreach($orders as $order)
                        @if($order->status == 1)
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                                <td>{{ $order->getFullPrice()}}</td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                        <a class="btn btn-success" type="button"
                                           href="{{ route('orders.show', $order) }}">Відкрити</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div id="Success" class="city" style="display:none">
            <div class="col-md-12">
                <h1>Замовлення</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>№</th>
                        <th>Ім'я</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Сума</th>
                        <th>Дії</th>
                    </tr>
                    @foreach($orders as $order)
                        @if($order->status == 0)
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                                <td>{{ $order->getFullPrice()}}</td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                        <a class="btn btn-success" type="button"
                                           href="{{ route('orders.show', $order) }}">Відкрити</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="Reject" class="city" style="display:none">
            <div class="col-md-12">
                <h1>Замовлення</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>№</th>
                        <th>Ім'я</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Сума</th>
                        <th>Дії</th>
                    </tr>
                    @foreach($orders as $order)
                        @if($order->status == 2)
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                                <td>{{ $order->getFullPrice()}}</td>
                                <td>
                                    <div class="btn-group text-white" role="group">
                                        <a class="btn btn-success" type="button"
                                           href="{{ route('orders.show', $order) }}">Відкрити</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function openCity(cityName, btn) {
        var i;
        var y = document.getElementsByClassName("tabbtn");
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
            y[i].style.border = "#000";
        }
        document.getElementById(cityName).style.display = "block";
        document.getElementById(btn).style.borderBottom = " solid #222 ";
    }
</script>


@endsection
