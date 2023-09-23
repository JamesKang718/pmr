@extends('layouts.app')


@section('content')

<div class="card">
    <div class="money_records">
        <h2 class="show_h2">零用金<small><small>總餘額</small></small> {{ $total_amount }}元</h2>
        <hr>
        <div class="icons">
            <a href="{{ route('create') }}">
                <button type="button" class="green">新增紀錄</button>
            </a>

            <button type="button" class="pink">
                <select id="in_index" name="in_index">
                    <option>收入選項</option>
                    <option id="all" value="all" >全部紀錄</option>
                    @foreach($inCategories as $key => $inCategory)
                        @if ($index == $inCategory->index)
                            <option id="{{ $inCategory->id }}" value="{{ $inCategory->index }}" selected>{{ $inCategory->in_title }}</option>
                        @else
                            <option id="{{ $inCategory->id }}" value="{{ $inCategory->index }}">{{ $inCategory->in_title }}</option>
                        @endif
                    @endforeach
                </select>
            </button>

            <button type="button" class="blue">
                <select id="out_index" name="out_index">
                    <option>支出選項</option>
                    <option id="all" value="all" >全部紀錄</option>
                    @foreach($outCategories as $key => $outCategory)
                        @if ($index == $outCategory->index)
                            <option id="{{ $outCategory->id }}" value="{{ $outCategory->index }}" selected>{{ $outCategory->out_title }}</option>
                        @else
                            <option id="{{ $outCategory->id }}" value="{{ $outCategory->index }}">{{ $outCategory->out_title }}</option>
                        @endif
                    @endforeach
                </select>
            </button>
        </div>
        <div class="records">

            <h3>{{ $index }}_零用金進出紀錄表</h3>

            <ul>
                @if ($allMoneyRecords->count() > 0)
                    @foreach ($allMoneyRecords as $moneyRecord)
                        <li>
                            <h5 class="title">
                                <a href="{{route('edit', $moneyRecord->id)}}">
                                    <span>編號：{{ $moneyRecord->record_no }}</span>
                                </a>
                                @if (isset($moneyRecord->inCategory->in_title))
                                    <span>存入類別：{{ $moneyRecord->inCategory->in_title }}</span>
                                @else
                                    <span>支出類別：{{ $moneyRecord->outCategory->out_title }}</span>
                                @endif
                            </h5>
                            <div class="calculate">
                                @if ( $moneyRecord->amount > 0 )
                                    <span>金額：{{ $moneyRecord->amount }}</span>
                                @else
                                    <span style="color: red;">金額：{{ $moneyRecord->amount }}</span>
                                @endif

                                <span>摘要：{{ $moneyRecord->brief }}</span>
                            </div>
                        </li>
                    @endforeach
                @else
                    <div class="empty">
                        <img src="{{ url('img/empty.png') }}" alt="資料為空圖像" title="資料為空圖像">
                        <span>目前資料 = 0 筆</span>
                    </div>
                @endif
            </ul>
            {{ $allMoneyRecords->links() }}
        </div>
    </div>

</div>

<script>
    $(function() {
        $("#in_index").change(function () {
            let result = $('select[name="in_index"]').val();
            document.location.href = result;
        })

        $("#out_index").change(function () {
            let result = $('select[name="out_index"]').val();
            document.location.href = result;
        })
    })
</script>
@endsection
