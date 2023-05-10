<?php

$file = fopen("../data/data.txt", "r"); // Mở file để đọc, "r" là mode đọc
if ($file) {
    while (($line = fgets($file)) !== false) { // Đọc từng dòng trong file
        echo $line; // In dòng đó ra màn hình
    }
    fclose($file); // Đóng file
} else {
    echo "Không thể mở file";
}