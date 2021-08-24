<!-- curl -X POST
    -u client_id:client_secret
    -d "grant_type=password"
    -d "username=user@sneaky.domain"
    -d "password=gimmeaccess"
    http://{example.com}/api/open/oauth/token -->
<?php
function set_url($var, $url)
{
    if (!isset($_SESSION[$var])) $_SESSION[$var] = $url;
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
    $url = $_SESSION['otomoto_auth'];
    $postRequest = "grant_type=password&username={$login}&password={$password}";

    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_USERPWD, otomoto_api());
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = json_decode(curl_exec($cURLConnection));

    curl_close($cURLConnection);

    return $apiResponse->access_token;
}

function post_car($data)
{
    //script for posting a car advert on otomoto
    $url = $_SESSION['otomoto_advert'];
    $token = $_SESSION['token'];
}
