<?php

namespace App\Helper;

use NumberFormatter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static  function checkdelupt(int $uid, int $creuid, string $credate)
    {
        if (Auth::user()->hasRole('Super Admin')) {
            return;
        }
        if ($uid != $creuid) {
            return ['User' => 'You are not the user Add data'];
        }
        if ((int)((strtotime(date('Y-m-d')) - strtotime($credate)) / 86400) > 15) {
            return ['Date' => 'The Data Created before 15 days'];
        }
        return;
    }
    public static  function storeFiles(array $data, array $files)
    {
        foreach ($files as $myFile => $field) {
            if (isset($data[$myFile])) {
                $file = $data[$myFile];
                $path = $file->store('', ['disk' => 'uploads']);
                $data[$field] = $path;
            };
        }
        return $data;
    }
    public static  function deleteFiles(array $files)
    {
        foreach ($files as $myFile) {
            Storage::disk('uploads')->delete($myFile);
        }
    }

    public static function currencyFormater($amount)
    {
        $formater = new NumberFormatter('ar', NumberFormatter::CURRENCY);
        $formater->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
        return $formater->formatCurrency($amount, 'EGP');
    }
    public static function dateFormater(string $date)
    {
        $newDateFormat = Carbon::parse($date);
        $newDateFormat = $newDateFormat->isoFormat('dddd D MMMM YYYY _ h:mm a'); // LLLL old
        $newDateFormat = self::convert_number_to_arabic($newDateFormat);
        return $newDateFormat;
    }

    public static function convert_number_to_arabic(string $text)
    {
        $western_arabic_numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $eastern_arabic_numbers = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

        return str_replace($western_arabic_numbers, $eastern_arabic_numbers, $text);
    }
}
