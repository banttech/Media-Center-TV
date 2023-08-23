<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body style="background-color:rgb(210,194,178); text-align: center;">

    <div class="py-5"
        style="background: url({{ asset('images/mctv4-358-178.png') }}) no-repeat 0 0; background-size: 100% 250px; height: 250px; margin: 5px 20px 20px 20px;">
    </div>

    <div id="box1" class="container"
        style="background-color:rgb(10,109, 115); max-width:100% !important; padding: 30px 20px 30px 20px;line-height:20px; text-align: center; color:  #CCC7AA;">
        <div class="row">
            <div class="col-md-12">
                <p style="color: #CCC7AA; font-size:15px; text-align: center; font-weight:bold;">&#128174;&nbsp;Friendly Reminder&nbsp;&#128174;</p>
                <p style="font-size:15px; font-weight: 500; text-align: center; padding-top: 5px;">It's that time of the month!</p>
                <p style="font-size10px; font-weight: bold; text-align: center; padding-top: 5px; font-family: Book Antiqua; line-height:38px;"><i><u>Your account will expire in <span style="color: red;">5</span> Days, <br>PLEASE MAKE PAYMENT TO PREVENT SERVICE INTERRUPTION</u></i></p>
                <p style="font-size:12px; text-align: center; padding-top: 12px; font-family: Book Antiqua; line-height:38px;">We are now taking payment via CashApp<br>CASHAPP: $MediaCenterTech</p>
                <a href="https://cash.app/$MediaCenterTech" style="cursor: pointer;">
									<button style="background-color:rgb(210,194,178); color:rgb(51,72,31);border-radius:50px;padding:15px;margin-top:15px;font-size:13px;border: none; margin-bottom:-3px; cursor: pointer;">PAY NOW</button>
								</a>
            </div>
        </div>
    </div>

    <div class="container" style="padding:20px 10px 20px 10px; font-family: Arial; color: black;">
        <div class="row">
            <div class="col-sm-12">
								<p style="font-size:13px; text-align: center;">BE SURE TO PUT IN "Drinks" IN "Add A Note" ON<br>CASHAPP WHEN PAYING</p>
                <a href="https://bit.ly/3lntxY2" style="cursor: pointer;">
                    <button
                        style="background-color: rgb(51,72,31);color: white;border-radius:50px;padding:20px;margin-top:15px;font-size:13px;border: none; margin-bottom:-3px; cursor: pointer;">BUY NOW</button>
                </a>
            </div>
        </div>
    </div>    
    
    <div class="container" style="max-width: 98% !important; line-height:1px; text-align: left;  background-color:white;">
        <div class="row" >
          <p style="color: black; font-size:20px; padding-left: 2px; padding-top:20px; margin-left: 20px; font-family: Gebriola; font-weight:bold;"><i>Kind Regards</i></p>
        </div>
        
        <div class="row" style="display:flex;">
            <div style="margin-left:20px;padding-top:20px;"><img src="{{ asset('images/MCTV_Logo.png') }}" width="90px" height="90px"></div>
            <div style="margin-left: 15px;">
                <p style=" color: rgb(9,102,145);font-size:13px; font-weight:bold; padding-top: 7px;">Frank Vista</p>
                <p style="font-size:11px; font-weight:bold">Lead Tech Support</p>
                <hr width="100%;" color="#2D81C9" style="margin-top: -6px; margin-bottom: 6px; height:0px;">
                <p style="font-size:11px; font-weight:bold; margin-bottom:0.1rem;">
                    <img src="{{ asset('images/call.png') }}" alt="" style="width:20px; height:20px; vertical-align:middle">
                    <span style="padding-left:2px;">570-334-7018</span>
                </p>
                
                <p style="font-size:11px; font-weight:bold; margin-bottom:0rem;">
                    <img src="{{ asset('images/www.png') }}" alt="" style="width:20px; height:20px; vertical-align:middle">
                    <span style="padding-left:2px;"><a href="https://mediacentertv.company.site/" target="_blank">MediaCenterTV.company.site</a></span>
                </p>
                
                <p style="font-size:11px; font-weight:bold; margin-bottom:0rem;">
                    <img src="{{ asset('images/email.png') }}" alt="" style="width:20px; height:20px; vertical-align:middle">
                    <span style="padding-left:2px;"><a href="mailto:mediacenterdl@gmail.com">MediaCenterDL@gmail.com</a></span>
                </p>    
                
            </div>
        </div>
    </div>




</body>

</html>
