<?php
namespace App\Enums;

enum ToastTypesEnum: int {
	case Default = 1;
	case Success = 2;
	case Info = 3;
	case Warning = 4;
	case Error = 5;
}
