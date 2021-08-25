<?php
function set_url()
{
    if (!isset($_SESSION['otomoto_test'])) $_SESSION['otomoto_test'] = 'https://www.otomoto.pl/api/open';
    if (!isset($_SESSION['otomoto_auth'])) $_SESSION['otomoto_auth'] = 'https://www.otomoto.pl/api/open/oauth/token';
    if (!isset($_SESSION['otomoto_advert'])) $_SESSION['otomoto_advert'] = 'https://www.otomoto.pl/api/open/account/adverts';
    if (!isset($_SESSION['otomoto_regions'])) $_SESSION['otomoto_regions'] = 'https://www.otomoto.pl/api/open/regions';
    if (!isset($_SESSION['otomoto_cities'])) $_SESSION['otomoto_cities'] = 'https://www.otomoto.pl/api/open/cities';
    if (!isset($_SESSION['otomoto_districts'])) $_SESSION['otomoto_districts'] = 'https://www.otomoto.pl/api/open/districts';
}
function otomoto_encode($data)
{
    $string = '{';
    foreach ($data as $key => $value) {
        $string .= '"';
        $string .= $key;
        $string .= '":';
        if (is_numeric($value)) $string .= $value;
        else {
            if (strlen($value) > 1) {
                if ($value[0] == '[') $string .= $value;
                else $string .= '"' . $value . '"';
            } else $string .= '"' . $value . '"';
        }
        $string .= ',';
    }
    $string[strlen($string) - 1] = '}';
    return $string;
}
function otomoto_api()
{
    $api = '329:20db09f3e99a6fba22abdf2c756fe70b';
    return $api;
}
function curl_test($url)
{
    $ch = curl_init($url);
    $fp = fopen("test_result.txt", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    if (curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }
    curl_close($ch);
    fclose($fp);
}
function curl_connection_test($login, $password)
{
    $url = $_SESSION['otomoto_auth'];
    $postRequest = "grant_type=password&username={$login}&password={$password}";

    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_USERPWD, otomoto_api());
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return $apiResponse;
}

function curl_getToken($login, $password)
{
    if (!isset($_SESSION['token'])) {
        $url = $_SESSION['otomoto_auth'];
        $postRequest = "grant_type=password&username={$login}&password={$password}";

        $cURLConnection = curl_init($url);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
        curl_setopt($cURLConnection, CURLOPT_USERPWD, otomoto_api());
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $apiResponse = json_decode(curl_exec($cURLConnection));

        curl_close($cURLConnection);

        $_SESSION['token'] = $apiResponse->access_token;
    }
}

function display_cars()
{
    //displays posted cars
    $url = $_SESSION['otomoto_advert'];
    $url .= '?limit=10&page=1';
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function get_regions()
{
    $url = $_SESSION['otomoto_regions'];
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function get_cities()
{
    $url = $_SESSION['otomoto_cities'];
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function get_districts($id)
{
    $url = $_SESSION['otomoto_districts'];
    $url .= '?city_id=' . $id;
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function add_car($data)
{
    //script for posting a car advert on otomoto
    $url = $_SESSION['otomoto_advert'];
    $token = $_SESSION['token'];
    $post_array = array();
    foreach ($data as $item) {
        $post_array[$item->meta_key] = $item->meta_val;
    }
    $post_string = otomoto_encode($post_array);
    $test_string = '{
        "title": "Advert title",
        "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "category_id": 29,
        "region_id": 1,
        "city_id": 1,
        "district_id": 1,
        "coordinates":
        {
            "latitude": 52.39255,
            "longitude": 16.86718
        },
        "contact":
        {
            "person": "John Doe"
        },
        "params":
        {
            "vin": "11111111111111111",
            "year": 2018,
            "make": "ford",
            "model": "focus",
            "fuel_type": "petrol",
            "engine_power": "86",
            "engine_capacity": "1596",
            "door_count": 4,
            "gearbox": "manual",
            "generation": "gen-mk4-2018",
            "version": "ver-1-6-gold-x",
            "mileage": 199000,
            "fuel_type": "petrol",
            "body_type": "sedan",
            "color": "white",
            "price":
            {
                "0": "arranged",
                "1": 20000,
                "currency": "PLN",
                "gross_net": "gross"
            },
            "video": "https://www.youtube.com/watch?v=code"
        },
        "advertiser_type": "private"
    }';
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}
