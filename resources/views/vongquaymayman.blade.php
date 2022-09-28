@extends('layouts.app')

@section('content')
    <style>
      #wrapper{
        min-height: 698px;
      }
      #luckywheel .hc-luckywheel-container{
        left: -16px;
        top: -17px;
      }
      #luckywheel .hc-luckywheel-btn{
        left: 195px;
        top: 195px;
      }
    </style>
    <link rel="stylesheet" href="/public/luckywheel/css/typo/typo.css" />
    <link rel="stylesheet" href="/public/luckywheel/css/hc-canvas-luckwheel.css" />
    <div class="container mt-8">
      <div class="row">
        <div class="col-6">
          <div class="wrapper typo" id="wrapper">
            <section id="luckywheel" class="col-6 hc-luckywheel">
              <div class="hc-luckywheel-container">
                <canvas class="hc-luckywheel-canvas" width="500px" height="500px"
                  >Vòng Xoay May Mắn</canvas
                >
              </div>
              <a class="hc-luckywheel-btn" href="javascript:;">Xoay</a>
            </section>
          </div>
        </div>
        <div class="col-6">
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
            <p class="text-center mt-3"><u>Lịch sử quay hôm nay</u></p>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Số lượt còn lại</th>
                  <th scope="col">Phần thưởng</th>
                  <th scope="col">Thời gian quay</th>
                </tr>
              </thead>
              <tbody id="history-list">
                @foreach($histories as $key=>$history)
                <tr>
                  <th scope="row">{{ ($key + 1) }}</th>
                  <td>{{ $history->rolls }}</td>
                  <td>{{ $history->detail }}</td>
                  <td>{{ $history->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/public/luckywheel/js/hc-canvas-luckwheel.js"></script>
    <script>
      var isPercentage = true;
      var prizes = [
              {
                text: "Túi quà",
                img: "/public/luckywheel/images/MoneySack.png",
                number: 1,
                percentpage: 0.05 // 5%
              },
              {
                text: "3 coins",
                img: "/public/luckywheel/images/coin.png",
                number : 1,
                percentpage: 0.1 // 10%
              },
              {
                text: "1 coin",
                img: "/public/luckywheel/images/coin.png",
                number: 1,
                percentpage: 0.2 // 20%
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
                percentpage: 0.4 // 40%
              },
            ];
      document.addEventListener(
        "DOMContentLoaded",
        function() {
          hcLuckywheel.init({
            id: "luckywheel",
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
                Swal.fire(
                  'Chương trình kết thúc',
                  'Đã hết phần thưởng',
                  'error'
                )
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
            console.log(data);
            $('#user-roll').text(data.roll)
            $('#user-coin').text(data.coin)
            $('#history-list').append('<tr><th scope="row">'+ 1 +'</th><td>'+data.history.rolls+'</td><td>'+data.history.detail+'</td><td>'+data.history.created_at+'</td></tr>')
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