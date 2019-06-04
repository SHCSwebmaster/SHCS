<?php  
$message = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Email message template </title>    
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center>

        <div style="font-style:normal;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left">
                                                        
            <p><span style="font-weight:bold;font-size:16px"> Received From: </span> '. $fullname .'</p>
            <p><span style="font-weight:bold;font-size:16px"> Sender Email: </span> '. $emailaddress .'</p>
            <p><span style="font-weight:bold;font-size:16px"> Message Subject: </span> '. $subject .'</p>
            <p><span style="font-weight:bold;font-size:16px;">The sender sent the following message/s: </span></p>
            <p style="margin-bottom:0;"> '. nl2br($query) .' </p>
                                                        
        </div>

    </center>
</body>
</html>';
?>