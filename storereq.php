<?php

if(isset($_POST["email"]))
{
    $email = $_POST["email"];
    $city = $_POST["city"];
    $name = $_POST["name"];
    $school = $_POST["school"];
    $option = $_POST["option"];
    if(isset($_POST['comment']))
    {
        $device = $_POST['comment'];
    }
    else
    {
         $device = "N/A";
    }
    
    $URL = "http://54.251.104.13/Jupiter/sun.php";
    $input_xml = "<Sunstone><Action><Service>SendSignupInfo</Service><DeviceId>".$device."</DeviceId><InstitutionName>".$school."</InstitutionName><ContactPerson>".$name."</ContactPerson><EmailId>".$email."</EmailId><PhoneNo>N/A</PhoneNo><IpadFlag>".$option."</IpadFlag><Address>N/A</Address><City>".$city."</City><Longitude>N/A</Longitude><Latitude>N/A</Latitude></Action></Sunstone>";
    
    //$URL.=$input_xml;
    
    
$post_data = array('data' => $input_xml);
$stream_options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded' . "\r\n",
        'content' =>  http_build_query($post_data)));

$context  = stream_context_create($stream_options);
$response = file_get_contents($URL, null, $context);    


    
    //$data = file_get_contents($url1);
    echo "<script>
             alert('Message sent!'); 
             window.history.go(-1);
     </script>";
    
    
}
else
{
    echo "<script>
             alert('Email ID cant be blank!'); 
             window.history.go(-1);
     </script>";
}


?>