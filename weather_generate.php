<?php
$city=$_POST['city'];
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=fb151047df68fec2b074249d2958d417";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);

$mydata='';
if ($result['cod']==200) {

$mydata.='<div class="weatherIcon">
            <img src="http://openweathermap.org/img/wn/'.$result['weather'][0]['icon'].'@4x.png">
        </div>
        <div class="weatherInfo">
            <div class="temperature">
                <span>'.round($result['main']['temp']).'&deg;</span>
            </div>

            <div class="description">
                <div class="weatherCondition">
                    '.$result['weather'][0]['main'].'
                </div>
                <div class="place">'.$result['name'].'</div>
            </div>

            <div class="wind">
                <div class="windCondition">
                    Wind
                </div>
                <div class="windSpeed">'.$result['wind']['speed'].' M/H</div>
            </div>

            <div class="date">
               <span>'.date('d M',$result['dt']).'</span>
            </div>

        </div>';
}else{
	$mydata='<div class="weatherIcon">
                <p style="font-size:50px;display:flex;justify-content:center;font-weight:bold;">City Not Found</p>
            </div>
            <div class="weatherInfo">
                <div class="temperature"></div>
                <div class="description"></div>
                <div class="wind"></div>
                <div class="date"></div>
            </div>';
}

echo $mydata;
?>