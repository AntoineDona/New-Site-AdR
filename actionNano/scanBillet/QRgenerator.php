<?php
session_start();



$id=$_GET['id'];

function codeId($id){
    $tabN=array(
        '0'=>'7I',
        '1'=>'2X',
        '2'=>'7A',
        '3'=>'ZB',
        '4'=>'JI',
        '5'=>'K0',
        '6'=>'H3',
        '7'=>'GM',
        '8'=>'W6',
        '9'=>'12',
    );
    for($i=0;$i<strlen($id);$i++){
        $key=$id[$i];
        echo $tabN[$key];
    }
}
function decodeId($id){
    $tabL=array(
        '7I'=>'0',
        '2X'=>'1',
        '7A'=>'2',
        'ZB'=>'3',
        'JI'=>'4',
        'K0'=>'5',
        'H3'=>'6',
        'GM'=>'7',
        'W6'=>'8',
        '12'=>'9',
    );
    for($i=0;$i<strlen($id);$i++){
        if($i%2==1){
            $key=$id[$i-1].$id[$i];
            echo $tabL[$key];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR code</title>
</head>
<body>
    <div id="content" >
    
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=http://adr.cs-campus.fr/actionNano/scanBillet/billet.php?id=<?php echo codeId($id);?>" title="QR code soirée" /> 
    
    </div>

</body>
    <style>
        body{
            text-align:center;
        }
        #content{
            display:flex;
            flex-direction:column;
        }
        #content div,#content p{
            margin:15px;
        }
        a{
        border-radius: 10px;
        background-color:#506AD4 ;
        color:#FFFCE6;
        border:#506AD4;
        padding: 8px 12px;
        text-decoration:none;
        }
        img{
            max-width:400px;
        }
    </style>
</html>
