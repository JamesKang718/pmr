@extends('common.basic')

@section('cssLink')
<link rel="stylesheet" href="{{asset('css/money/records.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="card">
    <a href="/"><button type="button" class="btn"> 回 首 頁 </button></a>
    <div class="card-header">
        <div class="brief">{{ __('說明') }}</div>
        <p class="brief_p">
            點數用途：<b>購買優惠好康商品</b>操作如下：</br></br>
            1、 <b>點數儲值單</b></br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;流程：建立儲值單->匯款->確認後->可以使用</br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用途：購買優惠好康商品</br>
            2、<b>點數移轉單</b>：</br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;流程：建立移轉單->立即完成</br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用途：將點數移轉給指定的對象</br>
            3、<b>點數領回單</b>：</br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;流程A、如果今天是銀行上班日且申請單送出時間在中午12:00前，將於今天16:00錢匯款</br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;流程B、其餘都是下一個銀行工作日的16:00前匯款</br>
        </p>
        <a href="/security">帳戶安全中心</a>
    </div>

    <div class="money_records">
        <h2 class="show_h2">點數<small><small>總餘額</small></small> {{ $total_amount }} 點 <small><small>(等於{{ $total_amount }}元)</small></small></h2>
        <hr>
        <div class="icons">
            <a href="{{ route('users.deposit' , auth()->id()) }}">
                <button type="button" class="green">點數儲值單</button>
            </a>
            <a href="{{ route('users.transfer' , auth()->id()) }}">
                <button type="button" class="pink">點數移轉單</button>
            </a>
            <a href="{{ route('users.withdraw' , auth()->id()) }}">
                <button type="button" class="blue">點數領回單</button>
            </a>
        </div>
        <div class="records">
            <div class="select">
                @if ($index == '每月')
                    <input type="radio" id="month" name="status">
                    <label for="month" class="current"><a href="{{ route('users.showMoney' , auth()->id()) }}">每月</a></label>

                    <input type="radio" id="season" name="status">
                    <label for="season"><a href="{{ route('users.showSeason' , auth()->id()) }}">每季</a></label>

                    <input type="radio" id="year" name="status">
                    <label for="year"><a href="{{ route('users.showYear' , auth()->id()) }}">每年</a></label>

                    <input type="radio" id="all" name="status">
                    <label for="all"><a href="{{ route('users.showAll' , auth()->id()) }}">全部</a></label>
                @elseif($index == '每季')
                    <input type="radio" id="month" name="status">
                    <label for="month"><a href="{{ route('users.showMoney' , auth()->id()) }}">每月</a></label>

                    <input type="radio" id="season" name="status">
                    <label for="season" class="current"><a href="{{ route('users.showSeason' , auth()->id()) }}">每季</a></label>

                    <input type="radio" id="year" name="status">
                    <label for="year"><a href="{{ route('users.showYear' , auth()->id()) }}">每年</a></label>

                    <input type="radio" id="all" name="status">
                    <label for="all"><a href="{{ route('users.showAll' , auth()->id()) }}">全部</a></label>
                @elseif($index == '每年')
                    <input type="radio" id="month" name="status">
                    <label for="month"><a href="{{ route('users.showMoney' , auth()->id()) }}">每月</a></label>

                    <input type="radio" id="season" name="status">
                    <label for="season"><a href="{{ route('users.showSeason' , auth()->id()) }}">每季</a></label>

                    <input type="radio" id="year" name="status">
                    <label for="year" class="current"><a href="{{ route('users.showYear' , auth()->id()) }}">每年</a></label>

                    <input type="radio" id="all" name="status">
                    <label for="all"><a href="{{ route('users.showAll' , auth()->id()) }}">全部</a></label>
                @elseif($index == '全部')
                    <input type="radio" id="month" name="status">
                    <label for="month"><a href="{{ route('users.showMoney' , auth()->id()) }}">每月</a></label>

                    <input type="radio" id="season" name="status">
                    <label for="season"><a href="{{ route('users.showSeason' , auth()->id()) }}">每季</a></label>

                    <input type="radio" id="year" name="status">
                    <label for="year"><a href="{{ route('users.showYear' , auth()->id()) }}">每年</a></label>

                    <input type="radio" id="all" name="status">
                    <label for="all" class="current"><a href="{{ route('users.showAll' , auth()->id()) }}">全部</a></label>
                @endif
            </div>

            <h3>點數進出紀錄表</h3>

            <ul>
                @if ($allMoneyRecords->count() > 0)
                    @foreach ($allMoneyRecords as $moneyRecord)
                        <li>
                            <h5 class="title">
                                @if ($moneyRecord->type == '點數儲值')
                                    <a href="{{ route('users.depositDetail', $moneyRecord->order_no) }}">
                                        @if($moneyRecord->status == '等待匯款')
                                            <span>請按我：可發送 已經匯款通知</span>
                                        @else
                                            <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                        @endif
                                    </a>
                                @elseif ($moneyRecord->type == '朋友轉入')
                                    <a href="{{ route('users.transferDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '轉給朋友')
                                    <a href="{{ route('users.transferDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '點數退回')
                                    <a href="{{ route('users.withdrawDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '購買票券訂單')
                                    <a href="{{ route('users.shoppingDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '退貨點數返回')
                                    <a href="{{ route('users.refundDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '升級vip')
                                    <a href="{{ route('users.moneyVipDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '賣家續約')
                                    <!-- 點數購買賣家續約 -->
                                    <a href="{{ route('users.continueDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '購買票券')
                                    <!-- 點數購買待用空白票 -->
                                    <a href="{{ route('users.buyTicketDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '服務訂單獎金')
                                    <!-- 點數購買平台的服務 -->
                                    <a href="{{ route('users.serviceOrderDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '發票稅金')
                                    <!-- 點數支付開發票的稅金 -->
                                    <a href="{{ route('users.invoiceOrderDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '業績轉入')
                                    <!-- 業績獎金轉換點數 -->
                                    <a href="{{ route('users.tranFromBonusDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '帳戶登入告知' || $moneyRecord->type == '活動單通簡訊' || $moneyRecord->type == '活動整批簡訊' 
                                    || $moneyRecord->type == '中獎通知簡訊' || $moneyRecord->type == '到期通知簡訊')
                                    <!-- 發簡訊使用點數 -->
                                    <a href="{{ route('users.msnSentDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '票券兌換')
                                    <a href="{{ route('users.voucherRedeemDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @elseif ($moneyRecord->type == '客戶退貨補價')
                                    <a href="{{ route('users.refundDetail', $moneyRecord->order_no) }}">
                                        <span>單據編號：{{ $moneyRecord->order_no }}</span>
                                    </a>
                                @endif
                                <span>性質：{{ $moneyRecord->type }}</span>
                            </h5>

                            <div class="calculate">
                                @if ( $moneyRecord->amount > 0 )
                                    <span>金額：{{ $moneyRecord->amount }}</span>
                                @else
                                    <span style="color: red;">金額：{{ $moneyRecord->amount }}</span>
                                @endif
                                
                                @if ($moneyRecord->type == '點數儲值')
                                    @if ( $moneyRecord->status == '等待匯款')
                                        <span style="color: red;">狀態：{{ $moneyRecord->status }}</span>
                                    @else
                                        <span>狀態：{{ $moneyRecord->status }}</span>
                                    @endif
                                @elseif ($moneyRecord->type == '點數退回')
                                    @if ($moneyRecord->user->moneyWithdraws->where('order_no', $moneyRecord->order_no)->first()->status == '等待匯款')
                                        <span style="color: red;">狀態：等待匯款</span>
                                    @else
                                        <span>狀態：{{ $moneyRecord->status }}</span>
                                    @endif
                                @else
                                    <span>狀態：{{ $moneyRecord->status }}</span>
                                @endif
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
@include('common.to_top')
<script>
    $(function() {
        // brief_p 開/關
        $(".brief").on("click", function() {
            $("#mask").slideUp();
            $(".brief_p").stop().slideToggle();
        })
        $(".brief_p").on("mouseenter", function() {
            $(this).stop().slideDown();
        })
        $(".brief_p").on("mouseleave", function() {
            $(this).slideUp();
        })
    })
</script>
@stop