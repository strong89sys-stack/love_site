<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if (isset($title)){
                echo $title;
            }else{
                echo 'I Love You';
            }
        ?>
    </title>
    <link rel="stylesheet" href=
        <?php
            if (isset($link)){
                echo $link;
            }else{
                echo '';
            }
        ?>
        
    >
</head>