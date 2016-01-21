<?php
	$dsn = 'mysql:host=localhost;dbname=portfolio;charset=utf8';
	$pdo = new PDO($dsn, 'root', 'azertypoiu');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);