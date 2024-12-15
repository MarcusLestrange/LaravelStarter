<?php
	namespace App\Helpers;
	/**
	 * 1. добавить запись в композер:
	 * "autoload": {
	 *  "files": [
	 *      "app/Helpers/helpers.php"
	 *  ]
	 * },
	 * 2. выполнить команду composer dump-autoload, чтобы композер увидел новый файл
	 */
	
	if (!function_exists('toast')) {
		function toast(\App\Enums\ToastTypesEnum $enum, string $text) {
			$toastifications = session()->get('toastification');
			$toastifications[] = [ 'type' => $enum, 'text' => $text ];
			session()->flash('toastification', $toastifications);
		}
	}
