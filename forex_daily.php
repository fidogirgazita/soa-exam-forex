<?php
    $url ='https://www.alphavantage.co/query?function=FX_DAILY&from_symbol=EUR&to_symbol=USD&apikey=&datatype=csv';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    $info   = curl_getinfo($ch);
    /*
    if ($output === false)
    {
        if (curl_error($ch))
        {
            throw new Exception(curl_error($ch));
        }
        else
        {
            throw new Exception($info);
        }
    }
    if ($csv_data == NULL)
    {
        // json parsing failed
        throw new Exception($output);
    }
    $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_status_code != 200)
    {
        throw new Exception($csv_data);
    }
    */
    curl_close($ch);
    
    $parse_data = array();
    //header
    $header = substr($output, 0, 29);
    //data
    $data = substr($output, 30);
    $parse_data = str_getcsv($data,",");

    //print header
    print_r($header."<br>");
    //print parse_data
    $last = count($parse_data);
    for ($i = 0; $i <= $last; $i+4) {
        echo($parse_data[0]." ".$parse_data[1]." ".$parse_data[2]." ".$parse_data[3]." ".$parse_data[4]);
        echo("<br>");
    }
?>
