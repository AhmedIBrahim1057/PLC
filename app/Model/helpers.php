<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


if (!function_exists('d')) {
    function d($in)
    {
        echo "<div style='background-color:gray; color:white;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('em')) {
    function em($in)
    {
        echo "<div style='background-color:red; color:white;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}


if (!function_exists('upload_youtube')) {
    function upload_youtube($file, $title, $description)
    {
        $video = Youtube::upload($file->getPathName(), ['title' => $title, 'description' => $description], 'unlisted');
        return $video->getVideoId();
    }
}

if (!function_exists('sm')) {
    function sm($in)
    {
        echo "<div style='background-color:green; color:white;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'j-n-Y', $lang = 'ar')
    {
        if (empty($date)) return "";
        if (is_string($date))
            $date = new Carbon($date);
        if ($lang == 'en') return $date->format($format);
        return digits($date->format($format));
    }
}


if (!function_exists('digits')) {
    function digits($text, $fixArabicNumbersSpaces = true)
    {
//        if(app()->getLocale()=="ar") {
        $text = " " . $text;
        $arabic = [',', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', " \\ "];
        $english = ['.', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '/'];
        $text = str_replace($english, $arabic, $text);
//            if($fixArabicNumbersSpaces)$text = str_replace(" ", "&nbsp;", $text);
        return trim($text);
//        }
        return $text;
    }
}

if (!function_exists('wm')) {
    function wm($in)
    {
        echo "<div style='background-color:orange; color:black;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('dbg')) {
    function dbg($value, $title = "DEBUG")
    {
        \Log::info("$title:", [$value]);
    }
}

if (!function_exists('randnums')) {
    function randnums($n)
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}

if (!function_exists('format')) {
    function format($labels, $activities)
    {
        $array = [];
        foreach ($labels as $label) {
            $count = 0;
            foreach ($activities as $decision) {
                if ($decision->year == $label) {
                    $count = $decision->count;
                }
            }
            array_push($array, ['count' => $count, 'year' => $label]);
        }
        return $array;
    }
}


if (!function_exists('numValue')) {
    function numValue($value)
    {
        if (empty($value)) return 0;
        return $value;
    }
}


if (!function_exists('factoryID')) {
    function factoryID($model)
    {

        static $incrementalID = [];

        if (!array_key_exists($model, $incrementalID)) {
            $incrementalID[$model] = $model::max('id');
        }

        $id = $incrementalID[$model] + 1;
        $incrementalID[$model] = $id;

        return $id;
    }
}

if (!function_exists('encryptData')) {
    function encryptData($text, $password, $urlEncode = true)
    {
        $cipher = openssl_encrypt($text, "AES-256-ECB", hash('sha256', $password, true), OPENSSL_RAW_DATA);
        $output = base64_encode($cipher);
        if (!$urlEncode) return $output;
        return urlencode($output);
    }
}

if (!function_exists('decryptData')) {
    function decryptData($input, $password, $urlEncode = true)
    {
        $cipher = base64_decode($input);
        $text = openssl_decrypt($cipher, "AES-256-ECB", hash('sha256', $password, true), OPENSSL_RAW_DATA);
        if (!$urlEncode) return $text;
        return urldecode($text);
    }
}

if (!function_exists('curl')) {
    function curl($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requesred Headers
                    'Content-Type: application/json',
                ),
            ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if (!empty($err)) return false;
        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('getFTS')) {
    function getFTS($searchText)
    {

        if (filter_var($searchText, FILTER_VALIDATE_EMAIL)) {
            return $searchText;
        }

        $searchText = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($searchText));
        $searchText = preg_replace('/[^\p{L}0-9\s]+/u', ' ', $searchText);
        $patterns = array("/(ا|أ|إ|آ)/", "/(ه|ة)/", "/(ـ)/", "/(ى)/");
        $replacements = array("ا", "ه", "", "ي");
        $searchText = preg_replace($patterns, $replacements, $searchText);

        return $searchText;
    }
}

if (!function_exists('findFiles')) {
    function findFiles($folder, $findFileName)
    {

        $allFilesPaths = Storage::disk('local')->files($folder);
        $filesPaths = [];
        foreach ($allFilesPaths as $filePath) {
            $fileName = pathinfo($filePath, PATHINFO_FILENAME);
            if ($fileName == $findFileName) {
                $filesPaths[] = $filePath;
            }
        }

        return $filesPaths;
    }
}

if (!function_exists('findFirstFile')) {
    function findFirstFile($folder, $findFileName)
    {

        $filesPaths = findFiles($folder, $findFileName);

        if (count($filesPaths) > 0) {
            return $filesPaths[0];
        }

        return false;
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($path)
    {
        if (Storage::disk('local')->exists($path)) {
            Storage::disk('local')->delete($path);
            return true;
        }
        return true;
    }
}

if (!function_exists('saveRequestFile')) {
    function saveRequestFile($file, $name, $folder)
    {

        $title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->putFileAs($folder, $file, "$name.$extension");

        return "$title.$extension";
    }
}

if (!function_exists('responseFile')) {
    function responseFile($filePath, $fileName)
    {

        $file = Storage::disk('local')->get($filePath);
        $mimeType = Storage::disk('local')->mimeType($filePath);

        $seconds_to_cache = 3600;
        $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";

        return response($file, 200, [
            'Content-Type' => $mimeType,
            'Expires' => "$ts",
            'Pragma' => 'cache',
            'Cache-Control' => "max-age=$seconds_to_cache",
            'Content-Disposition' => "inline; filename='$fileName'",
        ]);

        return false;
    }
}

if (!function_exists('sendMails')) {
    function sendMails($roles)
    {
        $users = User::select('users.id', 'users.email')
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('logs', 'logs.user_id', 'users.id')
            ->whereNull('logs.id')
            ->whereRemovedAndDone(0, 0)->groupBy('users.id', 'users.email')
            ->whereIn('model_has_roles.role_id', $roles)
            ->get();

        foreach ($users as $user) {
            echo "<p>" . $user->email . "</p>";
            $user = User::find($user->id);
            if ($user) {
                $token = Crypt::encryptString($user->id);
                $mail = new \App\Mail\SystemMail("NAQAAE Password Reset", "reset_password_email", ["token" => $token]);
                if ($mail->submit($user->email)) {
                    $user->done = 1;
                    $user->save();
                }
            }
        }
        dd('done');
    }
}

if (!function_exists('socialCheck')) {
    function socialCheck($user, $name, $token)
    {

        $plain = decryptData($token, env('WEBSITE_SHARED_KEY'), false);

        //For testing module
        if ($plain == $name) {
            return true;
        }

        return true;

        if ($name == "google") {
            $response = Http::get('https://www.googleapis.com/oauth2/v3/tokeninfo', [
                "access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['error_description']))
                return false;
            return true;
        } else if ($name == "facebook") {
            $response = Http::get("https://graph.facebook.com/me", [
                "access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['error']))
                return false;
            return true;
        } else if ($name == "linkedin") {
            $response = Http::get("https://api.linkedin.com/v2/me", [
                "oauth2_access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['serviceErrorCode']))
                return false;
            return true;
        }


        return false;
    }
}

if (!function_exists('autoSetup')) {
    function autoSetup()
    {
        if (Role::count() > 0) return true;

        $permissions = [
            ['name' => 'admin_system', 'guard_name' => 'web'],
            ['name' => 'show_he', 'guard_name' => 'web'],
            ['name' => 'access_he', 'guard_name' => 'web'],
            ['name' => 'admin_he', 'guard_name' => 'web'],
            ['name' => 'president_he', 'guard_name' => 'web'],
            ['name' => 'technical-committee_he', 'guard_name' => 'web'],
            ['name' => 'vice_he', 'guard_name' => 'web'],
            ['name' => 'show_fs', 'guard_name' => 'web'],
            ['name' => 'access_fs', 'guard_name' => 'web'],
            ['name' => 'admin_fs', 'guard_name' => 'web'],
            ['name' => 'show_sc', 'guard_name' => 'web'],
            ['name' => 'president_sc', 'guard_name' => 'web'],
            ['name' => 'technical-committee_sc', 'guard_name' => 'web'],
            ['name' => 'vice_sc', 'guard_name' => 'web'],
            ['name' => 'access_sc', 'guard_name' => 'web'],
            ['name' => 'admin_sc', 'guard_name' => 'web'],
            ['name' => 'show_tr', 'guard_name' => 'web'],
            ['name' => 'access_tr', 'guard_name' => 'web'],
            ['name' => 'admin_tr', 'guard_name' => 'web'],
            ['name' => 'show_ot', 'guard_name' => 'web'],
            ['name' => 'access_ot', 'guard_name' => 'web'],
            ['name' => 'admin_ot', 'guard_name' => 'web'],
            ['name' => 'show_cs', 'guard_name' => 'web'],
            ['name' => 'access_cs', 'guard_name' => 'web'],
            ['name' => 'admin_cs', 'guard_name' => 'web'],
            ['name' => 'show_management', 'guard_name' => 'web'],
            ['name' => 'access_management', 'guard_name' => 'web'],
            ['name' => 'admin_management', 'guard_name' => 'web'],
            ['name' => 'access_submissions', 'guard_name' => 'web'],
            ['name' => 'admin_submissions', 'guard_name' => 'web'],
            ['name' => 'show_submissions', 'guard_name' => 'web'],
            ['name' => 'edit_submissions', 'guard_name' => 'web'],
            ['name' => 'access_users', 'guard_name' => 'web'],
            ['name' => 'edit_users', 'guard_name' => 'web'],
            ['name' => 'admin_users', 'guard_name' => 'web'],
            ['name' => 'show_users', 'guard_name' => 'web'],
            ['name' => 'access_logs', 'guard_name' => 'web'],
            ['name' => 'admin_logs', 'guard_name' => 'web'],
            ['name' => 'access_roles', 'guard_name' => 'web'],
            ['name' => 'edit_roles', 'guard_name' => 'web'],
            ['name' => 'admin_roles', 'guard_name' => 'web'],
            ['name' => 'show_roles', 'guard_name' => 'web'],
            ['name' => 'access_binaries', 'guard_name' => 'web'],
            ['name' => 'show_binaries', 'guard_name' => 'web'],
            ['name' => 'edit_binaries', 'guard_name' => 'web'],
            ['name' => 'show_binaries', 'guard_name' => 'web'],
            ['name' => 'show_archive', 'guard_name' => 'web'],
            ['name' => 'access_archive', 'guard_name' => 'web'],
            ['name' => 'admin_archive', 'guard_name' => 'web'],
            ['name' => 'edit_archive', 'guard_name' => 'web'],
            ['name' => 'show_forms', 'guard_name' => 'web'],
            ['name' => 'access_forms', 'guard_name' => 'web'],
            ['name' => 'admin_forms', 'guard_name' => 'web'],
            ['name' => 'edit_forms', 'guard_name' => 'web'],
            ['name' => 'show_hotels', 'guard_name' => 'web'],
            ['name' => 'access_hotels', 'guard_name' => 'web'],
            ['name' => 'admin_hotels', 'guard_name' => 'web'],
            ['name' => 'edit_hotels', 'guard_name' => 'web'],
            ['name' => 'show_teams', 'guard_name' => 'web'],
            ['name' => 'access_teams', 'guard_name' => 'web'],
            ['name' => 'admin_teams', 'guard_name' => 'web'],
            ['name' => 'edit_teams', 'guard_name' => 'web'],
            ['name' => 'show_organizations', 'guard_name' => 'web'],
            ['name' => 'access_organizations', 'guard_name' => 'web'],
            ['name' => 'admin_organizations', 'guard_name' => 'web'],
            ['name' => 'edit_organizations', 'guard_name' => 'web'],
        ];

        Permission::insert($permissions);

        $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::pluck('name')->toArray());


        $user = User::create([
            'email' => 'admin@naqaae.com',
            'mobile' => null,
            'password' => bcrypt('Naqaae@2020'),
        ]);
//        $user = User::find(56115);
        $user->syncRoles(['admin']);

        Artisan::call('cache:clear');

        return true;
    }
}

if (!function_exists('success')) {
    function success()
    {
        return response()->json(['success' => true], 200);
    }
}

if (!function_exists('isEn')) {
    function isEn()
    {
        $locale = app()->getLocale();
        if (empty($locale) || $locale == "en")
            return true;
        return false;
    }
}

if (!function_exists('error')) {
    function error($error, $type, $message = null)
    {
        $data = [];
        $data['error'] = $error;
        $data['type'] = $type;
        if (is_numeric($error)) $data['code'] = $error;
        if ($message) $data['message'] = $message;
        return response()->json($data, $type);
    }
}

if (!function_exists('can')) {
    function can($permission, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (empty($user)) return false;
        return $user->hasPermissionTo($permission, 'web');
    }
}

if (!function_exists('canAll')) {
    function canAll($permissions, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (empty($user)) return false;
        $permissions = collect($permissions)->flatten();
        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission, 'web')) {
                return false;
            }
        }
        return true;
    }
}


if (!function_exists('lang')) {
    function lang($name = null)
    {
        if (!app()->getLocale()) {
            return "en_" . $name;
        } else {
            return app()->getLocale() . "_" . $name;
        }

    }
}

if (!function_exists('canAny')) {
    function canAny($permissions, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (empty($user)) return false;
        $permissions = collect($permissions)->flatten();
        foreach ($permissions as $permission) {
            if ($user->checkPermissionTo($permission, 'web')) {
                return true;
            }
        }
        return false;
    }
}


if (!function_exists('sendNotification')) {
    function sendNotification($users, $message, $title, $type, $details, $app, $businessID, $locationID, $category)
    {

        $data = (object)[];
        $data->type = $type;
        $data->app = $app;
        $data->click_action = 'FLUTTER_NOTIFICATION_CLICK';
        $data->details = $details;
        $data->business_id = $businessID;
        $data->location_id = $locationID;
        $data->category = $category;

        $tokens = [];
        if (is_array($users)) {
            foreach ($users as $user) {
                dbg($user->id, "USER Notification");
                $tokens = array_merge($tokens, $user->devices()->pluck('token')->toArray());

                $notification = new Notification();
                $notification->user_id = $user->id;
                $notification->business_id = $businessID;
                $notification->location_id = $locationID;
                $notification->type = $type;
                $notification->category = $category;
                $notification->title = $title;
                $notification->message = $message;
                $notification->data = json_encode($data, JSON_UNESCAPED_UNICODE);
                $notification->save();
            }
        }

        $count = 0;

        foreach ($tokens as $token) {
            $parameters = [
                "to" => $token,
                "collapse_key" => "type_a",
                "notification" => [
                    "body" => $message,
                    "title" => $title,
                ],
                "data" => $data,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            ];

            $key = null;
            switch ($app) {
                case "booking":
                    $key = env('NOTIFICATIONS_KEY_BOOKING', NULL);
                    break;
                case "queue":
                    $key = env('NOTIFICATIONS_KEY_QUEUE', NULL);
                    break;
            }
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "key=$key",
            ])->post('https://fcm.googleapis.com/fcm/send', $parameters);

            if ($response->getStatusCode() == 200) {
                $count++;
            }
        }

        return $count;
    }
}

if (!function_exists('cleanPath')) {
    function cleanPath($path)
    {
        $path = str_replace("\\", "/", $path);
        $path = trim($path, "/");
        while (strrpos($path, "//") !== false) {
            $path = str_replace("//", "/", $path);
        }
        return $path;
    }
}

if (!function_exists('sendSMS')) {
    function sendSMS($to, $body)
    {

        $from = env('SMS_APP');
        $userID = env('SMS_UID');
        $password = env('SMS_PWD');

        $curl = curl_init();
        $message = array('messages' => array(array('body' => $body,
            'to' => '{{' . $to . '}}',
            'from' => $from
        )));

        $token = base64_encode("$userID:$password");

        curl_setopt_array($curl,
            array(
                CURLOPT_URL => 'https://rest.clicksend.com/v3/sms/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($message),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    "Authorization: Basic $token"
                ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        if (!empty($err))
            return false;
        curl_close($curl);

        return json_decode($response);
    }
}

