<?php

$s = "<script>alert(1);</script> \n";
                $studentDataPart = filter_var($studentDataPart, FILTER_SANITIZE_SPECIAL_CHARS);
$s1 = filter_var("<script>alert(1);</script> \n", FILTER_SANITIZE_SPECIAL_CHARS);
$s2 = filter_var($s1, FILTER_SANITIZE_SPECIAL_CHARS);
echo $s;
echo $s1 . "\n";
echo $s2 . "\n";