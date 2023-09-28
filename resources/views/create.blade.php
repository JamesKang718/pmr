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
                        <label for="out_amount">支出金額：</label>
                        <input id="out_amount" type="number" pattern="[0-9]*" name="out_amount" value="{{ old('out_amount') }}" placeholder="請輸入正整數" required>
                    </div>
                    <div id="out_amount_info"></div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="out_brief">摘要說明：</label>
                        <input id="out_brief" type="text" name="out_brief" value="{{ old('out_brief') }}" placeholder="請輸入摘要訊息" required>
                    </div>
                    <div id="out_brief_info"></div>
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
                        <label for="in_amount">存入金額：</label>
                        <input id="in_amount" type="number" pattern="[0-9]*" name="in_amount" value="{{ old('in_amount') }}" placeholder="請輸入正整數" required>
                    </div>
                    <div id="in_amount_info"></div>
                </div>

                <div class="form-item">
                    <div class="items">
                        <label for="in_brief">摘要說明：</label>
                        <input id="in_brief" type="text" name="in_brief" value="{{ old('in_brief') }}" placeholder="請輸入摘要訊息" required>
                    </div>
                    <div id="in_brief_info"></div>
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

            // out_amount 輸入驗證 規則
            $("#out_amount").on('blur', function() {
                let amountInput = this.value;
                let reg = /^[1-9]\d*$/;
                if (amountInput !== '') {
                    if (!reg.test(amountInput)) {
                        $("#out_amount").val('');
                        $("#out_amount_info").addClass("alert-warning").show().html("僅能輸入：正整數且不能為 0");
                        setTimeout(function() {
                            $("#out_amount_info").hide();
                        }, 2000);
                        return;
                    }
                }
            })

            // out_brief 輸入驗證 規則
            $("#out_brief").on("blur", function() {
                let briefInput = this.value;
                let reg = /^[\u4E00-\u9FA5A-Za-z0-9_\-，.、 $。，、！/=//：< >:？?,()「」～"。;./@& %]+$/;
                if (briefInput !== '') {
                    if (!reg.test(briefInput)) {
                        $("#out_brief").val('');
                        $("#out_brief_info").addClass("alert-warning").show().html("僅：中、英文、数字、_-，.、 $。，、！/=//：< >:？?,()「」～。;./@& %");
                        setTimeout(function() {
                            $("#out_brief_info").hide();
                        }, 2000);
                        return;
                    }
                }
            })

            // in_amount 輸入驗證 規則
            $("#in_amount").on('blur', function() {
                let amountInput = this.value;
                let reg = /^[1-9]\d*$/;
                if (amountInput !== '') {
                    if (!reg.test(amountInput)) {
                        $("#in_amount").val('');
                        $("#in_amount_info").addClass("alert-warning").show().html("僅能輸入：正整數且不能為 0");
                        setTimeout(function() {
                            $("#in_amount_info").hide();
                        }, 2000);
                        return;
                    }
                }
            })

            // in_brief 輸入驗證 規則
            $("#in_brief").on("blur", function() {
                let briefInput = this.value;
                let reg = /^[\u4E00-\u9FA5A-Za-z0-9_\-，.、 $。，、！/=//：< >:？?,()「」～"。;./@& %]+$/;
                if (briefInput !== '') {
                    if (!reg.test(briefInput)) {
                        $("#in_brief").val('');
                        $("#in_brief_info").addClass("alert-warning").show().html("僅：中、英文、数字、_-，.、 $。，、！/=//：< >:？?,()「」～。;./@& %");
                        setTimeout(function() {
                            $("#in_brief_info").hide();
                        }, 2000);
                        return;
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