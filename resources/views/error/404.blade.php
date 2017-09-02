<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>提示信息</title>
    <style lang="css">
        .error-wrapper{
            margin-top:100px;
        }
        .error-wrapper .error-inner {
            width: 400px;
            margin: 50px auto;
            text-align: center
        }

        @media (max-width: 481px) {
            body{
                font-size: 8px;
            }
            .error-wrapper .error-inner {
                width: 100%;
                padding-left: 15px;
                padding-right: 15px;
                margin-top: 30px
            }
        }

        .error-wrapper .error-inner .error-type {
            position: relative;
            font-size: 8em;
            visibility: hidden
        }

        @media (max-width: 481px) {
            .error-wrapper .error-inner .error-type {
                font-size: 10em
            }
        }

        .error-wrapper .error-inner .error-type.animated {
            visibility: visible;
            animation: fadeInDown 1s ease;
            -webkit-animation: fadeInDown 1s ease;
            -moz-animation: fadeInDown 1s ease;
            -ms-animation: fadeInDown 1s ease;
            -o-animation: fadeInDown 1s ease
        }

        .fadeInDown {
            animation-name: fadeInDown;
            -webkit-animation-name: fadeInDown;
            -moz-animation-name: fadeInDown;
            -ms-animation-name: fadeInDown;
            -o-animation-name: fadeInDown;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            -ms-animation-duration: 1s;
            -o-animation-duration: 1s
        }

        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translateY(-20px)
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0)
            }
        }

        @-moz-keyframes fadeInDown {
            0% {
                opacity: 0;
                -moz-transform: translateY(-20px)
            }
            100% {
                opacity: 1;
                -moz-transform: translateY(0)
            }
        }

        @-ms-keyframes fadeInDown {
        0% {
            opacity: 0;
            -ms-transform: translateY(-20px)
        }
        100% {
            opacity: 1;
            -ms-transform: translateY(0)
        }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px)
            }
            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
</head>
<body>
<div class="error-wrapper">
    <div class="error-inner">
        <div class="error-type animated">{{$errorMsg['title']}}</div>
        {{--<h1>{{$errorMsg['title']}}</h1>--}}
        <p>
            {{$errorMsg['msg']}}
        </p>
        @if($errorMsg['isBack'])
        <div class="m-top-md">
            <a href="#" class="btn btn-default btn-lg text-upper">返回</a>
        </div>
        @endif
    </div>
    <!-- ./error-inner -->
</div>
</body>

</html>