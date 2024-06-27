<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503</title>
    <style>
        .hmode_sec .hmode_content {
            max-width: 827px;
            margin: auto;
            text-align: center;
        }

        .hmode_sec .hmode_content .main_logs {
            margin-bottom: 50px;
        }

        .hmode_sec .hmode_content h1 {
            margin: 0;
            font-family: Mona Sans;
            font-size: 100px;
            font-weight: 700;
            line-height: 116.04px;
            text-align: center;
            margin-bottom: 30px;
        }

        .hmode_sec .hmode_content h4 {
            margin: 0;
            margin-bottom: 25px;
            font-family: Mona Sans;
            font-size: 34px;
            font-weight: 600;
            line-height: 32.88px;
            text-align: center;
        }

        .hmode_sec .hmode_content .mail_box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 460px;
            margin: auto;
        }

        .hmode_sec .hmode_content .mail_box .mail_input_fld {
            display: block;
        }

        .hmode_sec .hmode_content .mail_box .mail_input_fld input {
            display: block;
            width: 100%;
            border: 1px solid #000000;
            padding: 20px;
            border-radius: 5px;
            background: #000;
            color: #fff;
        }
        .hmode_sec .hmode_content .mail_box .notify_btn a {
            display: inline-block;
            text-decoration: none;
            padding: 20px;
            border-radius: 5px;
            background: #DC288A;
            color: #fff;
        }

        .hmode_sec .hmode_content .mail_box .mail_input_fld input::placeholder {
            color: #fff;
        }

        .hmode_sec .hmode_content p {
            font-family: Mona Sans;
            font-size: 20px;
            font-weight: 400;
            line-height: 19.34px;
            text-align: center;
        }

        .hmode_sec {
            overflow-x: hidden;
        }

        /* .hmode_sec .wld_img {
            max-width: calc(100% - 35%);
            margin: auto;
        } */

        .hmode_sec .wld_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media only screen and (max-width: 1499px){
            .hmode_sec .hmode_content h1 {
                font-size: 80px;
                line-height: 1.2;
                margin-bottom: 15px;
            }
            .hmode_sec .hmode_content h4 {
                font-size: 25px;
                line-height: 1.2;
                margin-bottom: 15px;
            
            }
            .hmode_sec .hmode_content p {
                font-size: 16px;
                line-height: 1.2;
            }
            .hmode_sec .hmode_content .mail_box .mail_input_fld input {
                padding: 15px 20px;
            }
            .hmode_sec .hmode_content .mail_box .notify_btn a {
                padding: 15px 20px;
                border-radius: 5px;
            }
        }

    </style>
</head>
<body>
    <section class="hmode_sec">
        <div class="container">
            <div class="hmode_content">
                <div class="main_logs">
                      <img src="{{ asset('Site_Images/crt_lg.png') }}"  class="img-fluid">
                </div>
                <h1>Coming Soon!</h1>
                <h4>The website is currently in holiday mode.</h4>
                <div class="mail_box">
                    <div class="mail_input_fld">
                        <input type="email" id="email" placeholder="Your Email" size="30" required />
                    </div>
                    <div class="notify_btn">
                        <a id="notify_me" type="button" >Notify Me</a>
                    </div>
                </div>
                <p>Enter Your Email To Be Notified Once Website Is Open To The Public</p>
            </div>
            <div class="wld_img">
                <img src=" {{ asset('Site_Images/wrld.png') }}"  class="img-fluid">
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#notify_me").on('click', function(){
            var email = $("#email").val();
            
            $.ajax({
                url: "{{ url('notify') }}",  
                type: "POST",  
                data: {email: email},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(data){
                    // alert(data);
                    if(data == "success"){
                        alert("Email Sent Successfully");
                    }else{
                        alert("Email Not Sent");
                    }
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText); 
                }
            });
        });
    });

    </script>
</body>
</html>