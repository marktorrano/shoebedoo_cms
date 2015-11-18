<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shoe be doo</title>
        <meta name="description" content="">
	    <meta name="author" content="">
	    
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    
	    <?php
            foreach($styles as $style){
        ?>
            <link rel="stylesheet" href="assets/css/<?php echo $style;?>.css">
        <?php
            }
        ?>
 
    </head>
    <body>