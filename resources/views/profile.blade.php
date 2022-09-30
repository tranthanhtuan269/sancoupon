@extends('layouts.app')

@section('content')
<div class="container mt-6 pt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="/public/images/download.jpg" id="avatar-img"/>
        </div>
        <div class="col-md-8">
            <div class="user-name">{{ Auth::user()->name }}</div>
            <div class="col-8 user-email"><svg class="icon-profile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg> {{ Auth::user()->email }}</div>
            <div class="col-8 user-phone"><svg class="icon-profile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M80 0C44.7 0 16 28.7 16 64V448c0 35.3 28.7 64 64 64H304c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H80zm80 432h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg> {{ Auth::user()->phone }}</div>
            <hr />

            <div class="row">
            <p class="text-center mt-3"><b><u>Lịch sử quay hôm nay {{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('y-m-d') }}</u></b></p>
            <p class="text-center mb-3"><b><u style="color:red">( Coupon chỉ có giá trị trong 1 ngày. Hãy lưu ý!!! )</u></b></p>

            <div class="table" cellspacing="0" cellpadding="0" border="0" width="325">
              <div>
                <div class="item-history">
                  <div class="column-1">#</div>
                  <div class="column-2">Số lượt còn lại</div>
                  <div class="column-3">Phần thưởng</div>
                  <div class="column-4">Coupon</div>
                  <div class="column-5">Quay lúc</div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div id="history-list" style="height: 400px;overflow-y: auto;">
                @php
                  $history_length = count($histories);
                @endphp
                @foreach($histories as $key=>$history)
                <div class="item-history">
                  <div class="column-1">{{ $history_length - $key }}</div>
                  <div class="column-2">{{ $history->rolls }}</div>
                  <div class="column-3">{{ $history->detail }}</div>
                  <div class="column-4">{{ isset($history->coupon) ? $history->coupon->coupon_code : '' }}</div>
                  <div class="column-5">{{ \Carbon\Carbon::parse($history->created_at)->format('h:i:s') }}</div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection