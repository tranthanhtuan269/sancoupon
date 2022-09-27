<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>J2Team Community Offline</title>
    <link rel="stylesheet" href="/public/luckywheel/css/typo/typo.css" />
    <link rel="stylesheet" href="/public/luckywheel/css/hc-canvas-luckwheel.css" />
    <style>
      .hc-luckywheel{
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -175px;
        margin-left: -270px;
      }
    </style>
  </head>
  <body class="bg">
    <div class="wrapper typo" id="wrapper">
      <section id="luckywheel" class="hc-luckywheel">
        <div class="hc-luckywheel-container">
          <canvas class="hc-luckywheel-canvas" width="500px" height="500px"
            >Vòng Xoay May Mắn</canvas
          >
        </div>
        <a class="hc-luckywheel-btn" href="javascript:;">Xoay</a>
      </section>
    </div>
</style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/public/luckywheel/js/hc-canvas-luckwheel.js"></script>
    <script>
      var isPercentage = true;
      var prizes = [
              {
                text: "5 coins",
                img: "/public/luckywheel/images/coin.png",
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
                percentpage: 0.20 // 20%
              },
              {
                text: "Mất lượt",
                img: "/public/luckywheel/images/crying.png",
                percentpage: 0.25 // 25%
              },
              {
                text: "Thêm 3 lượt",
                img: "/public/luckywheel/images/exchange.png",
                number: 1, // 1%,
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
                Swal.fire(
                  'Bạn không trúng thưởng',
                  'Chúc bạn may mắn lần sau!',
                  'error'
                )
              } else{
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
  </body>
</html>
