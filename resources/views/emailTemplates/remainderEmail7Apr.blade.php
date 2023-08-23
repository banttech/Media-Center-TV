<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>

    <style>
        * {
            padding: 0PX;
            margin: 0px;
        }
    </style>
</head>

<body>

    <div style=" background-color:rgb(210,194,178); display:flex;
    justify-content: center;">
        <img src="{{ asset('images/image1.png') }}" alt=""
            style=" padding-top: 70px;padding-bottom: 30px;padding-left: 30px;padding-right: 30px;width: 100%;height: 500px;">
    </div>
    <div class="container2"
        style="  background-color:rgb(10,109, 115);text-align: center;
    color: white;line-height:70px;">
        <h1 style="font-size: 50px; text-align: center;">&#128174;Friendly Reminder&#128174;</h1>
        <h2 style="font-size: 40px; text-align: center;">It's that time of the month!</h2>
        <h3 style="font-size: 25px; text-align: center;"><i><u>Your account will expire in</u> <span
                    style="color: red;font-size: 40px;">5</span><u>days, PLEASE</u> </i></h3>
        <h3 style="font-size: 25px; text-align: center;"><i><u>MAKE PAYMENT TO PREVENT SERVICE</u></i></h3>
        <h3 style="font-size: 25px; text-align: center;"><u><i>INTERUPTION</i></u></h3>

        <h3 style="line-height: 20px;font-size: 25px; text-align: center;">We are now taking payment via CashApp</h3>
        <h3 style="font-size: 25px; text-align: center;">CASHAPP: $MediaCenterTech</h3>

        <a href="https://cash.app/$MediaCenterTech"><button
                style="background-color: white;color: rgb(55,73,33);border-radius:50px;padding:20px;margin-top: 40px;font-size:30px;border: none;margin-bottom: 50px;">PAY
                NOW</button></a>
    </div>
    <div style="background-color:rgb(210,194,178);text-align: center;line-height:70px;
    height:80vh;">
        <!-- <h1>WANT TO UPGRADE YOUR</h1>
        <h1 style="margin-bottom:30px;">PLAN?</h1>
        <h2>1 month - $20.00</h2>
        <h2>3 months - $50.00</h2>
        <h2>6 months - $100.00</h2>
        <h2>12 month - $12.00</h2> -->
        <h2 style="font-size: 40px; text-align: center; color: #000;">BE SURE TO PUT IN "DRINKS" IN "ADD A NOTE"ON</h2>
        <h2 style="font-size: 40px; text-align: center; color: #000;">CASHAPP WHEN PAYING</h2>

        <a href="https://bit.ly/3lntxY2"><button
                style=" background-color: rgb(51,72,31);color: white;border-radius:50px;padding:20px;margin-top: 50px;font-size:40px;border: none;
            margin-bottom: 50px;">BUY
                NOW</button></a>
    </div>

    <div style="   background-color:rgb(210,194,178);height:70vh;">
        <div style="   background-color: white; margin-left: 40px;margin-right: 40px;height: 400px;">
            <h1 style="margin-left:20px;"><i> Kinds Regards </i></h1>
            <div style="display: flex;margin-top: 20px;">
                <div style=" display: flex;margin-top: 20px;"><img src="{{ asset('images/image1.png') }}" alt=""
                        style="width:200px;height: 200px;margin-left: 20px;margin-top:22px;object-fit:cover;"></div>

                <div style="width:50%;margin-left: 20px;    
                ">

                    <strong style=" color: rgb(9,102,145);font-size: 35px;">
                        Frank Vista</strong><br>
                    <B style="font-size: 30px; color: #000;">Lead Tech Support</B><br>

                    <hr width="80%;" color="#2D81C9" size="8">


                    <div style="display: flex; align-items: center; margin-top: 10px;">
                        <img src="{{ asset('images/phone.png') }}" alt=""
                            style="width:50px;height:50px; margin: 5px -2px;"><b class="number"
                            style="font-size: 30px;padding: 3px 19px 14px;position: absolute; color: #000;">570-334-7018</b>
                    </div>
                    <div style="display: flex; align-items: center; margin-top: 10px;">
                        <img src="{{ asset('images/siteicon.png') }}"
                            alt=""style="width:50px;height:50px; margin: 5px -2px;"><b
                            class="number"style="font-size: 30px;padding: 3px 19px 14px;position: absolute; color: #000;"><a
                                href="https://mediacentertv.company.site/">MediaCenterTV.company.site</a></b>
                    </div>
                    <div style="display: flex; align-items: center; margin-top: 10px;">
                        <img src="{{ asset('images/email.png') }}"
                            alt=""style="width:50px;height:50px; margin: 5px -2px;"><b
                            class="number"style="font-size: 30px;padding: 3px 19px 14px;position: absolute; color: #000;">MediaCenterDL@gmail.com</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
