<html>
    <head>
        
    </head>
    <body>
        <h1>Welcome !</h1>

<h1>List for databases</h1>

<form action="myscript.php" method="post">
<input type="text" name="This_name">
<input type="submit" name="envoi" value="Send">
<input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>">
<input type="submit" name="filter" value="Filter">
</form>
                                                                    
<?php      
    $filename = "friends.txt";
    
    $name = $_POST['This_name'];
    $file = fopen( $filename, "a" );
    if ("$name" != NULL) {
        fwrite( $file, "$name\n");
    }
    
    $file = fopen( $filename, "r" );
    $nameFilter = $_POST['nameFilter'];
    $file2 = fopen( $filename, "r" );
    while (!feof($file)) {
        if ($nameFilter != NULL){
            if (strstr(fgets($file), "$nameFilter", false) != NULL){
                $ligne = fgets($file2)."<br/>";
                echo $ligne;
            }
            else {
                fgets($file2);
            }
        }
        else {
            echo fgets($file)."<br/>";
        }
    }
?>
    </body>
</html>