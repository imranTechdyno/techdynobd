<?php

use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\SectionData;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}

function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function uploadImage($file, $location, $size, $old = null, $thumb = null)
{


    $path = makeDirectory($location);

    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

    $image = Image::make($file);

    if (!empty($size)) {

        $size   = explode('x', strtolower($size));
        $width  = $size[0];
        $height = $size[1];

        $canvas = Image::canvas($width, $height);

        $image = $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $canvas->insert($image, 'center');
        $canvas->save($location . '/' . $filename);
    } else {

        $image = $image->resize(1980, 1080, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($location . '/' . $filename);
    }

    return $filename;
}


function menuActive($routeName)
{

    $class = 'active';

    if (is_array($routeName)) {
        foreach ($routeName as $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}


function filePath($folder_name)
{
    return 'asset/images/' . $folder_name;
}


function frontendFormatter($key)
{
    return ucwords(str_replace('_', ' ', $key));
}


function getFile($folder_name, $filename)
{
    return asset('asset/images/' . $folder_name . '/' . $filename);
}


function variableReplacer($code, $value, $template)
{
    return str_replace($code, $value, $template);
}

function sendGeneralMail($data)
{
    $general = GeneralSetting::first();

    if ($general->email_method == 'php') {
        $headers = "From: $general->sitename <$general->site_email> \r\n";
        $headers .= "Reply-To: $general->sitename <$general->site_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($data['email'], $data['subject'], $data['message'], $headers);
    } else {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $general->email_config->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->email_config->smtp_username;
            $mail->Password   = $general->email_config->smtp_password;
            if ($general->email_config->smtp_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $general->email_config->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->site_email, $general->sitename);
            $mail->addAddress($data['email'], $data['name']);
            $mail->addReplyTo($general->site_email, $general->sitename);
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}

function sendMail($key, array $data, $user)
{

    $general = GeneralSetting::first();

    $template =  EmailTemplate::where('name', $key)->first();


    $message = variableReplacer('{username}', $user->username, $template->template);

    $message = variableReplacer('{sent_from}', @$general->sitename, $message);

    foreach ($data as $key => $value) {

        $message = variableReplacer("{" . $key . "}", $value, $message);
    }


    if ($general->email_method == 'php') {
        $headers = "From: $general->sitename <$general->site_email> \r\n";
        $headers .= "Reply-To: $general->sitename <$general->site_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($user->email, $template->subject, $message, $headers);
    } else {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = $general->email_config->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->email_config->smtp_username;
            $mail->Password   = $general->email_config->smtp_password;
            if ($general->email_config->smtp_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $general->email_config->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->site_email, $general->sitename);
            $mail->addAddress($user->email, $user->username);
            $mail->addReplyTo($general->site_email, $general->sitename);
            $mail->isHTML(true);
            $mail->Subject = $template->subject;
            $mail->Body    = $message;
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
function content($key)
{
    return SectionData::where('key', $key)->first();
}

function element($key, $take = 10)
{
    return SectionData::where('key', $key)->take($take)->get();
}



//cloud-picture-upload-function
function cloudUpload($size, $image, $folder, $old)
{
    preg_replace('/\.[^.]+$/', '.', $image->getClientOriginalName()) . 'webp';

    if ($old) {
        $token = explode('/', $old);
        $token2 = explode('.', $token[sizeof($token) - 1]);
        cloudinary()->destroy('CA/' . $folder . '/' . $token2[0]);
    }   
    $new_size   = explode('x', strtolower($size));
    $width  = $new_size[0] ? $new_size[0] : null;
    $height = $new_size[1] ? $new_size[1] : null;
    $response = cloudinary()->upload($image->getRealPath(), [
        'folder' => 'CA/'.$folder,
        'transformation' => [
            'width' => $width,
            'height' => $height,
            'crop' => 'fill',
            'quality' => 'auto',
        ]
    ])->getSecurePath();

    return $response;
}


//remove image from cloud
function imageRemoveFromCloud($image, $folder)
{
    $token = explode('/', $image);
    $token2 = explode('.', $token[sizeof($token) - 1]);
    $response = cloudinary()->destroy('CA/' . $folder . '/' . $token2[0]);

    return $response;
}


function changeEnvironmentVariable($key, $value)
{
    $path = base_path('.env');
    
    if (is_bool(env($key))) {
        $old = env($key) ? 'true' : 'false';
    } elseif (env($key) === null) {
        $old = 'null';
    } else {
        $old = env($key);
    }    

    if (file_exists($path)) {        
        file_put_contents($path, str_replace(
            "$key=" . $old,
            "$key=" . $value,
            file_get_contents($path)
        ));
    }
}
