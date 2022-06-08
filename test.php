#!/usr/bin/php
<?php

// Check if file exists or not 
if(!file_exists('./input_1.txt'))
{
    exit("Error: Input File 1 Not found");
}


if(!file_exists('./input_2.txt'))
{
    exit("Error: Input File 2 Not found");
}

// Take input 
$file_1 = file_get_contents('./input_1.txt');
$file_2 = file_get_contents('./input_2.txt');

//Fix for windows machines
$file_1 = str_replace("\r\n", "\n", $file_1);
$file_2 = str_replace("\r\n", "\n", $file_2);

// Remove empty spaces
$file_1 = str_replace("\n\n", "\n", $file_1);
$file_2 = str_replace("\n\n", "\n", $file_2);

// Split the contents of file into array by splitting it per line
$file_1_array = explode("\n",$file_1);
$file_2_array = explode("\n",$file_2);

// Sort in lexicographically case sensitive
natcasesort($file_1_array);
natcasesort($file_2_array);

// Remove matching elements found in another array
$new_file_1_array = array_udiff($file_1_array,$file_2_array,'strcasecmp');
$new_file_2_array = array_udiff($file_2_array,$file_1_array,'strcasecmp');

// Converting the filtered and sorted items into text
$new_file_1 = implode("\n",$new_file_1_array);
$new_file_2 = implode("\n",$new_file_2_array);

// Saving the results to output files
file_put_contents('./result_file_1.txt',$new_file_1);
file_put_contents('./result_file_2.txt',$new_file_2);
