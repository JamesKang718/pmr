@extends('layouts.app')


@section('content')
    <div class="card">
        <a href="/home">
            <button type="button" class="login_btn"> 回 前 頁 </button>
        </a>
        <div class="money_records">
            <div class="icons">
                <button type="button" id="out" class="green">開啟支出單</button>
                <button type="button" id="in" class="pink">開啟存入單</button>
            </div>
            <hr>
            <form id="out_form" method="POST" action="/store" onsubmit="return dosubmit()">
                <h2 style="margin: 2rem">新增支出紀錄單</h2>
                <br>
                @csrf
                <div class="form-item">
                    <div class="items">
                        <label for="record_no">單據編號&nbsp;&nbsp;：</label>
                        <input id="record_no" style="border: 0;" type="text" name="record_no" value="out_{{ $date }}" required readonly>
                    </div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="out_index">選擇類別：</label>
                        <select id="out_index" name="out_index" required>
                            @foreach($outCategories as $key => $outCategory)
                                <option id="{{ $outCategory->id }}" value="{{ $outCategory->id }}">{{ $outCategory->out_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="amount">支出金額：</label>
                        <input id="amount" type="number" pattern="[0-9]*" name="amount" value="{{ old('amount') }}" placeholder="請輸入正整數" required>
                    </div>
                    <div id="amount_info"></div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="brief">摘要說明：</label>
                        <input id="brief" type="text" name="brief" value="{{ old('brief') }}" placeholder="請輸入摘要訊息" required>
                    </div>
                    <div id="brief_info"></div>
                </div>

                <div>
                    <button type="submit" id="submit" class="login_btn">
                        {{ __('確 定 送 出') }}
                    </button>
                </div>

            </form>

            <form id="in_form" style="display: none" method="POST" action="/store" onsubmit="return dosubmit()">
                <h2 style="margin: 2rem">新增存入紀錄單</h2>
                <br>
                @csrf
                <div class="form-item">
                    <div class="items">
                        <label for="record_no">單據編號&nbsp;&nbsp;：</label>
                        <input id="record_no" style="border: 0;" type="text" name="record_no" value="in_{{ $date }}" required readonly>
                    </div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="in_index">選擇類別：</label>
                        <select id="in_index" name="in_index" required>
                            @foreach($inCategories as $key => $inCategory)
                                <option id="{{ $inCategory->id }}" value="{{ $inCategory->id }}">{{ $inCategory->in_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="amount">存入金額：</label>
                        <input id="amount" type="number" pattern="[0-9]*" name="amount" value="{{ old('amount') }}" placeholder="請輸入正整數" required>
                    </div>
                    <div id="amount_info"></div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="brief">摘要說明：</label>
                        <input id="brief" type="text" name="brief" value="{{ old('brief') }}" placeholder="請輸入摘要訊息" required>
                    </div>
                    <div id="brief_info"></div>
                </div>

                <div>
                    <button type="submit" id="submit" class="login_btn">
                        {{ __('確 定 送 出') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(function() {
            // 表格開/關
            $("#in").on("click", function() {
                $("#out_form").slideUp();
                $("#in_form").slideDown();
            })

            $("#out").on("click", function() {
                $("#out_form").slideDown();
                $("#in_form").slideUp();
            })

            // deposit 輸入驗證 規則
            $("#deposit").on('blur', function() {
                var depositInput = this.value;
                var reg = /^[1-9]\d*$/;
                if (depositInput !== '') {
                    if (!reg.test(depositInput)) {
                        $("#deposit").val('');
                        $("#in_Info").addClass("alert-warning").show().html("僅能輸入：正整數且不能為 0");
                        setTimeout(function() {
                            $("#in_Info").hide();
                        }, 2000);
                        return;
                    }
                }
            })

            // brief 輸入驗證 規則
            $("#brief").on("input", function() {
                var briefInput = this.value;
                var reg = /^[0-9]+$/;
                if (briefInput !== '') {
                    if (!reg.test(briefInput)) {
                        $("#brief").val('');
                        $("#brief_info").addClass("alert-warning").show().html("僅能輸入：阿拉伯數字(帳號末5碼)");
                        setTimeout(function() {
                            $("#brief_info").hide();
                        }, 2000);
                        return;
                    } else {
                        if(briefInput.length == 5) {
                            $("#submit").removeAttr("disabled").css('background-color', 'green');
                            $("#brief").on("input", function() {
                                window.location.reload();
                            })
                        }
                    }
                }
            })

            // 默认提交状态为false
            let commitStatus = false;
            dosubmit = function (){
                if(commitStatus == false){
                    //提交表单后，將提交状态改为true
                    commitStatus = true;
                    return true;
                }else {
                    return false;
                }
            }
        })
    </script>
@stop