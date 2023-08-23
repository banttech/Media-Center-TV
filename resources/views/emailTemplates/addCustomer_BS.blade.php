<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  
  <style>
    /*body {
      background-color: antiquewhite;
      text-align:center;
    }*/

    #img {
      height: 50vh;
      width: 100vw;
    }   

    .iconimg img {
      height: 40px!important;
      width: 40px!important;
    }
    #footer1 img{
      height: 200px;
      width: 200px;

    }
    .bgcolorm{
      background-color:rgb(10,109,115);
    }
    @media screen and (min-device-width:0px) and (max-device-width:290px) {
      #mctvlogodiv {width:10vw; margin-left:5px;}
      #mctvlogodiv img {width:30px; height:30px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:9px; margin-bottom:0rem !important;}
      .kindsregards{font-size:9px;}
      #footer2 #p2 { font-weight:bold; font-size:6px;}
      .iconimg img {width:9px !important; height:9px !important;}
      .iconimg span {font-size:6px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:0.5rem !important;}
      h2{font-size:9px; color: white;}
      h3{font-size:6px;}
      .vipcard{font-size:9px; color:white;}
      .text-white {font-size:6px;line-height:0.1px;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:6px;}
    }


    @media screen and (min-device-width:291px) and (max-device-width:368px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:45px; height:45px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:11px; margin-bottom:0rem !important;}
      .kindsregards{font-size:11px;}
      #footer2 #p2 { font-weight:bold; font-size:8px;}
      .iconimg img {width:12px !important; height:12px !important;}
      .iconimg span {font-size:8px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:0.6rem !important;}
      h2{font-size:11px; color: white;}
      h3{font-size:8px;}
      .vipcard{font-size:11px; color:white;}
      .text-white {font-size:8px;line-height:1px;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:8px;}
    }


    @media screen and (min-device-width:369px) and (max-device-width: 376px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:55px; height:55px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:13px; margin-bottom:0rem !important;}
      .kindsregards{font-size:13px;}
      #footer2 #p2 { font-weight:bold; font-size:10px;}
      .iconimg img {width:15px !important; height:15px !important;}
      .iconimg span {font-size:10px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:1rem !important;}
      h2{font-size:13px; color: white;}
      h3{font-size:10px;}
      .vipcard{font-size:13px; color:white;}
      .text-white {font-size:10px;line-height:0.1rem;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:10px;}
    }

    @media screen and (min-device-width: 377px) and (max-device-width: 500px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:65px; height:65px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:15px; margin-bottom:0rem !important;}
      .kindsregards{font-size:15px;}
      #footer2 #p2 { font-weight:bold; font-size:12px;}
      .iconimg img {width:15px !important; height:15px !important;}
      .iconimg span {font-size:12px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:1rem !important; margin-left:5px;}
      h2{font-size:15px; color: white;}
      .text-white {font-size:12px;line-height:0.2rem;}
      h3{font-size:12px;}
      .vipcard{font-size:15px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:12px;}
    }

    @media screen and (min-device-width: 501px) and (max-device-width: 576px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:70px; height:70px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:15px; margin-bottom:0rem !important;}
      .kindsregards{font-size:15px;}
      #footer2 #p2 { font-weight:bold; font-size:12px;}
      .iconimg img {width:15px !important; height:15px !important;}
      .iconimg span {font-size:12px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:1rem !important;}
      h2{font-size:15px; color: white;}
      .text-white {font-size:12px;line-height:0.3rem;}
      h3{font-size:12px;}
      .vipcard{font-size:15px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:12px;}
    }

    @media screen and (min-device-width: 577px) and (max-device-width: 768px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:90px; height:90px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:17px; margin-bottom:0rem !important;}
      .kindsregards{font-size:17px;}
      #footer2 #p2 { font-weight:bold; font-size:15px;}
      .iconimg img {width:15px !important; height:15px !important;}
      .iconimg span {font-size:15px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:1.5rem !important;}
      h2{font-size:17px; color: white;}
      .text-white {font-size:15px;line-height:0.5rem;}
      h3{font-size:15px;}
      .vipcard{font-size:17px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:15px;}
    }

    @media screen and (min-device-width: 769px) and (max-device-width: 992px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:110px; height:110px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:20px; margin-bottom:0rem !important;}
      .kindsregards{font-size:20px;}
      #footer2 #p2 { font-weight:bold; font-size:17px;}
      .iconimg img {width:17px !important; height:17px !important;}
      .iconimg span {font-size:17px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:1.7rem !important;}
      h2{font-size:20px; color: white;}
      .text-white {font-size:17px;line-height:0.6rem;}
      h3{font-size:17px;}
      .vipcard{font-size:20px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:17px;}
    }

    @media screen and (min-device-width: 993px) and (max-device-width: 1200px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:140px; height:140px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:23px; margin-bottom:0rem !important;}
      .kindsregards{font-size:23px;}
      #footer2 #p2 { font-weight:bold; font-size:20px;}
      .iconimg img {width:20px !important; height:20px !important;}
      .iconimg span {font-size:20px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:2rem !important;}
      h2{font-size:23px; color: white;}
      .text-white {font-size:20px;line-height:0.7rem;}
      h3{font-size:20px;}
      .vipcard{font-size:23px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:20px;}
    }

    @media screen and (min-device-width: 1201px) and (max-device-width: 1440px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:170px; height:170px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:26px; margin-bottom:0rem !important;}
      .kindsregards{font-size:26px;}
      #footer2 #p2 { font-weight:bold; font-size:22px;}
      .iconimg img {width:22px !important; height:22px !important;}
      .iconimg span {font-size:22px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:2.3rem !important;}
      h2{font-size:26px; color: white;}
      h3{font-size:22px;}
      .vipcard{font-size:26px; color:white;}
      .text-white {font-size:22px;line-height:0.9rem;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:22px;}
    }

    @media screen and (min-device-width: 1401px) and (max-device-width: 1660px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:190px; height:190px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:28px; margin-bottom:0rem !important;}
      .kindsregards{font-size:28px;}
      #footer2 #p2 { font-weight:bold; font-size:24px;}
      .iconimg img {width:24px !important; height:24px !important;}
      .iconimg span {font-size:24px;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:2.5rem !important;}
      h2{font-size:28px; color: white;}
      .text-white {font-size:24px;line-height:1rem;}
      h3{font-size:24px;}
      .vipcard{font-size:28px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:24px;}
    }

    @media screen and (min-device-width: 1661px) {
      #mctvlogodiv {width:14vw; margin-left:5px;}
      #mctvlogodiv img {width:220px; height:220px; margin-top:10px;}
      #footer2 #p1 { font-weight:bold; font-size:35px; margin-bottom:0rem !important;}
      .kindsregards{font-size:35px;}
      #footer2 #p2 { font-weight:bold; font-size:30px;}
      .iconimg img {width:30px !important; height:30px !important;}
      .iconimg span {font-size:30x;}
      hr {margin-bottom:0rem !important; margin-top:-1rem !important;}
      #footer2 {line-height:3rem !important;}
      h2{font-size:35px; color: white;}
      .text-white {font-size:30px;line-height:1.5rem;}
      h3{font-size:30px;}
      .vipcard{font-size:35px; color:white;}
      .btn {background-color: rgb(51,72,31);color: white; border-radius:50px;padding:10px;margin-top: 20px;border: none; margin-bottom: 20px; cursor: pointer; font-size:30px;}
    }


  </style>

</head>

<body style="background-color:rgb(210,194,178) !important; text-align:center;">
  <div class="container-fluid">

    <div class="row py-1 px-2">
      <div class="col-sm-12 col-md-12">
        <img id="img" src="{{ asset('images/MCTV_Background.png') }}" class="img-fluid" alt="">
      </div>
    </div>


  </div>

  <div class="container-fluid bgcolorm">

    <div class="row">
      <div class="col-md-12 col-sm-12 text-center py-4">
        <h2 style="text-align:center;">Welcome to the MediaCenterTV family!123</h2>
        <h3>We greatly appreciate the</h3>
        <h3>business and look forward</h3>
        <h3>to providing you with</h3>
        <h3>reliable services as well as </h3>
        <h3>creating a long lasting</h3>
        <h3>relationships!</h3><br>

        <h3>Below you will find very</h3>
        <h3>important information, starting</h3>
        <h3>with your VIP Card, which </h3>
        <h3>contains the following</h3><br>
        <h1 class="vipcard">VIP CARD</h1>
        <h3>&#10004;&nbsp;Technical Support Section</h3>
        <h3>&#10004;&nbsp;Group Support Chat</h3>
        <h3>&#10004;&nbsp;How To's</h3>
        <h3>&#10004;&nbsp;Device Installation Guide</h3>
        <h3>&#10004;&nbsp;Pay your Bill</h3>
        <h3>&#10004;&nbsp;Download Codes</h3>
      </div>
    </div>

  </div>

  <div class="container my-0">
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="https://bit.ly/3Fadx2B" style="cursor: pointer;">
          <button class="btn">VIP CARD</button>
        </a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row mx-3 pt-3 bgcolorm">
      <div class="col-md-12 text-center">
        <p class="text-white">We are now receiving payment via CashApp</p>
        <p class="text-white">$MediaCenterTech</p>
      </div>
    </div>
  </div>



  <div class="container-fluid my-3">
      <div class="row mx-3 bg-white pt-2">
        <div class="col-sm-12 col-md-12"><h1 class="kindsregards">Kinds Regards</h1></div>
      </div>
         <div class="row mx-3 bg-white pb-5" id="footer1">
             <div id="mctvlogodiv">
                 <img src="{{ asset('images/MCTV_Logo.png') }}" alt="">
             </div>
        <div style="width:80%; padding-left:10px;" id="footer2">
              <p id="p1">Frank Vista</p>
              <p id="p2">Lead Tech Support</p>
              <hr width="100%;" color="#2D81C9">

              <div class="iconimg"><img src="{{ asset('images/call.png') }}" alt="">&nbsp;&nbsp;<span>800-999-0000</span></div>

              <div class="iconimg"><img src="{{ asset('images/www.png') }}" alt="">&nbsp;&nbsp;<span>MediaCenterTV.company.site</span></div>

              <div class="iconimg"><img src="{{ asset('images/email.png') }}" alt="">&nbsp;&nbsp;<span>MediaCenterDL@gmail.com</span></div>
         </div>
    </div>
  </div>



</body>

</html>