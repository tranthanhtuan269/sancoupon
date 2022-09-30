@extends('layouts.app')

@section('content')
    <style>
      #wrapper{
        min-height: 550px;
      }
      #luckywheel .hc-luckywheel-container{
        left: -16px;
        top: -17px;
      }
      #luckywheel .hc-luckywheel-btn{
        left: 195px;
        top: 195px;
      }
      .item-history{
        float: left;
        width: 100%;
      }
      .item-history .column-1{
        float: left;
        width:5%;
      }
      .item-history .column-2{
        float: left;
        width:20%;
      }
      .item-history .column-3{
        float: left;
        width:40%;
      }
      .item-history .column-4{
        float: left;
        width:20%;
      }
      .item-history .column-5{
        float: left;
        width:15%;
      }
      .gift-panel{
        background-color: #fff;
        position: fixed;
        width: 60%;
        top: 180px;
        left: 20%;
        z-index: 999;
        padding: 15px;
        border: 1px solid #66666680;
        border-radius: 8px;
      }
      .item-gift{
        width: 100%;
        height: 50px;
        clear: both;
      }
      .item-number{
        width: 10%;
        float: left;
      }
      .item-image{
        width: 21%;
        float: left;
      }
      .item-content{
        width: 69%;
        float: left;
        text-align: left;
      }
      #close-svg-btn{
        width: 40px;
        position: absolute;
        right: -20px;
        top: -20px;
        border: 4px solid black;
        border-radius: 50%;
        height: 40px;
        background-color: white;
        opacity: 0.8;
        cursor: pointer;
      }
      .item-gift-header{
        font-weight: bold;
        font-size: 18px;
        padding: 10px 0 20px;
      }
      #user-coin, #user-roll{
        font-weight: bold;
        color: #ed3d3d;
      }
      .item-gift-list{
        height: 300px;
        overflow-y: auto;
      }
    </style>
    <link rel="stylesheet" href="/public/luckywheel/css/typo/typo.css" />
    <link rel="stylesheet" href="/public/luckywheel/css/hc-canvas-luckwheel.css" />
    <div class="container mt-8">
      <div class="row">
        <div class="col-md-12 col-lg-6">
          <div class="wrapper typo" id="wrapper">
            <section id="luckywheel" class="col-6 hc-luckywheel">
              <div class="hc-luckywheel-container">
                <canvas class="hc-luckywheel-canvas" width="500px" height="500px">Vòng Xoay May Mắn</canvas
                >
              </div>
              <a class="hc-luckywheel-btn" href="javascript:;">Xoay</a>
            </section>
          </div>
          <div class="btn btn-primary" id="buy-roll"><svg class="cart-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H76.1l60.3 316.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H179.9l-9.1-48h317c14.3 0 26.9-9.5 30.8-23.3l54-192C578.3 52.3 563 32 541.8 32H122l-2.4-12.5C117.4 8.2 107.5 0 96 0H24zM176 512c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm336-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z"/></svg> Mua thêm lượt quay</div>
          <div class="btn btn-secondary" id="show-list"><svg class="cart-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg> Xem danh sách quà trong túi quà</div>
        </div>
        <div class="col-md-12 col-lg-6">
          <div class="row">
            <div class="col-3">
              <label>Nickname: </label>
            </div>
            <div class="col-3">
              {{ Auth::user()->name }}
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
              <label>Số coin: </label>
            </div>
            <div class="col-3">
              <span id="user-coin">{{ Auth::user()->coins }}</span>
            </div>
            <div class="col-3">
              <label>Số lần quay: </label>
            </div>
            <div class="col-3">
              <span id="user-roll">{{ Auth::user()->rolls }}</span>
            </div>
          </div>
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

    <div class="panel gift-panel">
      <div class="close-gift-panel"><svg id="close-svg-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg></div>
      <div class="text-center item-gift-header">
        Vật phẩm trong túi quà hôm nay ({{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') }})
      </div>
      <div class="text-center item-gift-list">
      @foreach($coupons as $key=>$coupon)
      <div class="item-gift">
        <div class="item-number">{{ $key + 1}}</div>
        <div class="item-image"><img src="/public/images/download.jpg" width="45" /></div>
        <div class="item-content">{{ $coupon->detail }}</div>
      </div>
      @endforeach
      </div>
    </div>
    <script src="/public/luckywheel/js/hc-canvas-luckwheel.js"></script>
    <script>
      var isPercentage = true;
      var prizes = [
              {
                text: "Túi quà",
                img: "/public/luckywheel/images/MoneySack.png",
                number: 1,
                percentpage: 0.4 // 25%
              },
              {
                text: "3 coins",
                img: "/public/luckywheel/images/coin.png",
                number : 1,
                percentpage: 0.1 // 25%
              },
              {
                text: "1 coin",
                img: "/public/luckywheel/images/coin.png",
                number: 1,
                percentpage: 0.1 // 10%
              },
              {
                text: "Thêm 3 lượt",
                img: "/public/luckywheel/images/exchange.png",
                number: 1, // 1%,
                percentpage: 0.25 // 25%
              },
              {
                text: "Mất lượt",
                img: "/public/luckywheel/images/crying.png",
                percentpage: 0.15 // 15%
              },
            ];
      document.addEventListener(
        "DOMContentLoaded",
        function() {
          hcLuckywheel.init({
            id: "luckywheel",
            roll: "{{ Auth::user()->rolls }}",
            config: function(callback) {
              callback &&
                callback(prizes);
            },
            mode : "both",
            getPrize: function(callback) {
              var rand = randomIndex(prizes);
              var chances = rand;
              callback && callback([rand, chances]);
            },
            gotBack: function(data) {
              if(data == null){
                // Swal.fire(
                //   'Chương trình kết thúc',
                //   'Đã hết phần thưởng',
                //   'error'
                // )
                location.reload();
              } else if (data == 'Mất lượt'){
                // send data to server
                SaveDataToServer(data);
                Swal.fire(
                  'Bạn không trúng thưởng',
                  'Chúc bạn may mắn lần sau!',
                  'error'
                )
              } else{
                // send data to server
                SaveDataToServer(data);
                Swal.fire(
                  'Đã trúng giải',
                  data,
                  'success'
                )
              }
            }
          });
        },
        false
      );

      function returnDateFormat(input){
        return input.slice(11, 19)
      }

      function SaveDataToServer(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data    = {
            data    : data
        };

        $.ajax({
          url: '/save-data-roll',
          data : data,
          method: "POST",
          dataType:'json',
          success: function(data) {
            $('#user-roll').text(data.roll)
            $('#user-coin').text(data.coin)
            var count = $('#history-list .item-history').length + 1;
            if(data.coupon  !== null){
              $('#history-list').prepend('<div class="item-history"><div class="column-1">'+ count +'</div><div class="column-2">'+data.history.rolls+'</div><div class="column-3">'+data.history.detail+'</div><div class="column-4">'+ data.coupon.coupon_code +'</div><div class="column-5">'+returnDateFormat(data.created_at)+'</div></div>')
            }else{
              $('#history-list').prepend('<div class="item-history"><div class="column-1">'+ count +'</div><div class="column-2">'+data.history.rolls+'</div><div class="column-3">'+data.history.detail+'</div><div class="column-4"></div><div class="column-5">'+returnDateFormat(data.created_at)+'</div></div>')
            }
          },
          error: function(data) {
            console.log('Error:', data);
          },
        });
      }
      function randomIndex(prizes){
        if(isPercentage){
          var counter = 1;
          for (let i = 0; i < prizes.length; i++) {
            if(prizes[i].number == 0){
              counter++
            }
          }
          if(counter == prizes.length){
            return null
          }
          let rand = Math.random();
          let prizeIndex = null;
          console.log(rand);
          switch (true) {
            case rand < prizes[4].percentpage:
              prizeIndex = 4 ;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage:
              prizeIndex = 3;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage:
              prizeIndex = 2;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage + prizes[1].percentpage:
              prizeIndex = 1;
              break;  
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage + prizes[1].percentpage  + prizes[0].percentpage:
              prizeIndex = 0;
              break;  
          }
          if(prizes[prizeIndex].number != 0){
            prizes[prizeIndex].number = prizes[prizeIndex].number - 1
            return prizeIndex
          }else{
            return randomIndex(prizes)
          }
        }else{
          var counter = 0;
          for (let i = 0; i < prizes.length; i++) {
            if(prizes[i].number == 0){
              counter++
            }
          }
          if(counter == prizes.length){
            return null
          }
          var rand = (Math.random() * (prizes.length)) >>> 0;
          if(prizes[rand].number != 0){
            prizes[rand].number = prizes[rand].number - 1
            return rand
          }else{
            return randomIndex(prizes)
          }
        }
      }
    </script>
@endsection