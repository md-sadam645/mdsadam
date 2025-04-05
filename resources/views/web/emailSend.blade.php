
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>MdSadam.World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
        p{
            text-transform:capitalize;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #fff;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%"
        style="background-color: #fff; @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #fff;">
                    {{-- <tr>
                        <td style="text-align:center;">
                            <a href="https://airfaresreservation.com/" title="logo" target="_blank">
                            <img width="150" src="https://airfaresreservation.com/images/logo/logo-vertical.jpg" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #fff;">
                              
                                <tr>
                                    <td>
                                        
                                        @if(!empty($data))
                                        <div style="font-size:15px; margin:8px 0 0; line-height:24px;">
                                            <p><strong>Name : </strong> {{$data['name']}}</p>
                                            <p><strong>Email : </strong> {{$data['email']}}</p>
                                            <p><strong>Mobile : </strong> {{$data['mobile']}}</p>
                                            <p><strong>Subject : </strong> {{$data['subject']}}</p>
                                            <p><strong>Message : </strong> {{$data['message']}}</p>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                               
                            </table>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong><a href="https://www.rakiro.net/">www.rakiro.net</a></strong> </p>
                        </td>
                    </tr> --}}
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>