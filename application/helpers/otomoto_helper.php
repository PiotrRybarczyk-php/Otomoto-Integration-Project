<?php
function set_url($select)
{
    switch ($select) {
        case 'auth':
            return 'https://www.otomoto.pl/api/open/oauth/token';
            break;
        case 'advert':
            return 'https://www.otomoto.pl/api/open/account/adverts';
            break;
        case 'regions':
            return 'https://www.otomoto.pl/api/open/regions';
            break;
        case 'cities':
            return 'https://www.otomoto.pl/api/open/cities';
            break;
        case 'disctricts':
            return 'https://www.otomoto.pl/api/open/districts';
            break;
        case 'categories':
            return 'https://www.otomoto.pl/api/open/categories';
            break;
        case 'gallery':
            return 'https://www.otomoto.pl/api/open/imageCollections';
            break;
        default:
            return 'https://www.otomoto.pl/api/open';
    }
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
                if ($value[0] == '[' || $value[0] == '{') $string .= $value;
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
function curl_connection_test($login, $password)
{
    $url = set_url('auth');
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
    $url = set_url('auth');
    $postRequest = "grant_type=password&username={$login}&password={$password}";

    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_USERPWD, otomoto_api());
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = json_decode(curl_exec($cURLConnection));

    curl_close($cURLConnection);

    $_SESSION['token'] = $apiResponse->access_token;
}

function display_cars()
{
    //displays posted cars
    $url = set_url('advert');
    $url .= '?limit=10&page=1';
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = json_decode(curl_exec($cURLConnection));
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function get_regions()
{
    $url = set_url('regions');
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
    $url = set_url('cities');
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
    $url = set_url('disctricts');
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

function get_categories($id)
{
    $url = set_url('categories');
    $url .= '/' . $id;
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    print_r($apiResponse);
    exit;
}

function create_collection($images)
{
    $temp_collection = array();
    for ($i = 0; $i < count($images); $i++) {
        $temp_collection[strval($i + 1)] = 'https://ignaszak.pl/files/' . $images[$i]->folder . '/' . $images[$i]->filename;
    }
    $post_string = otomoto_encode($temp_collection);
    $url = set_url('gallery');
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apijson = curl_exec($cURLConnection);
    $apiResponse = json_decode($apijson, true);
    curl_close($cURLConnection);
    return $apiResponse;
}

function activate_car($id)
{
    //activate car's advert on otomoto
    $url = set_url('advert');
    $url .= '/' . $id . '/activate';
    $token = $_SESSION['token'];
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, '{}');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = json_decode(curl_exec($cURLConnection));
    curl_close($cURLConnection);
    return $apiResponse;
}

function add_car($car_data, $location)
{
    //script for posting a car advert on otomoto
    $url = set_url('advert');
    $token = $_SESSION['token'];
    $params = array();
    $temp_array = array();
    $post_array = array();
    foreach ($car_data as $item) {
        $temp_array[$item->meta_key] = $item->meta_val;
    }
    $params['vin'] = $temp_array['vin'];
    $params['year'] = $temp_array['year'];
    $params['make'] = $temp_array['make'];
    $params['model'] = $temp_array['model'];
    $params['fuel_type'] = $temp_array['fuel_type'];
    $params['engine_power'] = $temp_array['engine_power'];
    $params['engine_capacity'] = $temp_array['engine_capacity'];
    $params['door_count'] = $temp_array['door_count'];
    $params['gearbox'] = $temp_array['gearbox'];
    $params['mileage'] = $temp_array['mileage'];
    $params['body_type'] = $temp_array['body_type'];
    $params['color'] = $temp_array['color'];
    $params['colour_type'] = $temp_array['colour_type'];
    $params['rhd'] = $temp_array['rhd'];
    $params['country_origin'] = $temp_array['country_origin'];
    $params['date_registration'] = $temp_array['date_registration'];
    $params['registered'] = $temp_array['registered'];
    $params['nr_seats'] = $temp_array['nr_seats'];
    $params['no_accident'] = $temp_array['no_accident'];
    $params['service_record'] = $temp_array['service_record'];
    $params['transmission'] = $temp_array['transmission'];
    $params['price'] = $temp_array['price'];
    //$params['video'] = $temp_array['video'];
    $params['features'] = $temp_array['features'];
    $post_array['title'] = $temp_array['title'];
    $post_array['description'] = $temp_array['description'];
    $post_array['category_id'] = $temp_array['category_id'];
    $post_array['region_id'] = 1;
    $post_array['coordinates'] = '{"latitude": ' . $location['latitude'] . ',"longitude": ' . $location['longitude'] . '}';
    $post_array['contact'] = $temp_array['contact'];
    $post_array['new_used'] = $temp_array['new_used'];
    $post_array['params'] = otomoto_encode($params);
    $post_array['image_collection_id'] = $temp_array['image_collection_id'];
    $post_string = otomoto_encode($post_array);
    //print_r($post_string);
    //exit;
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: Bearer ' . $token,]);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = json_decode(curl_exec($cURLConnection));
    curl_close($cURLConnection);
    return $apiResponse;
}
