<?php
session_start();
try {
	$pdo = new PDO('mysql:host=localhost;dbname=project_ct467', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$error_message = 'Không thể kết nối đến CSDL';
	$reason = $e->getMessage();
    echo $reason;
}
function currency_format($number, $suffix = ' VND') {
	if (!empty($number)) {
		return number_format($number, 0, ', ', '.') . "{$suffix}";
	}
}


