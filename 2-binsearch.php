<h1>Binary Search</h1>

<?php
$arrtmp = "";
$input = "";
$fname = 'array.txt';
$fbool = false;

if(isset($_POST['Submit']))
{
    $input = (int)$_POST['searchfor'];
    $arrtmp = $_POST['array'];
    $arr = explode(' ', $arrtmp);

    //for filestream
    if(empty($_POST['array']))
        if ($file = fopen($fname, 'r')) {
            $fbool = true;
            while (!feof($file)) {
                $line = fgets($file);
                $arr = explode(' ', $line);
            }
            fclose($file);
        }

    foreach($arr as $p) {
        $p = (int)$p;
    }


    $left = 0;
    $right = sizeof($arr) - 1;
    $isFound = false;
    $middle = 0;

    $index = -1;

    while(($left <= $right) && (!$isFound))
    {
        $middle = round(($left + $right) / 2);

        if($arr[$middle] == $input)
        {
            $isFound = true;
            $index = $middle;
        }
        else if($arr[$middle] > $input)
        {
            $right = $middle - 1;
        }
        else if($arr[$middle] < $input)
        {
            $left = $middle + 1;
        }
    }

}

?>

<form action="" method="POST"> 
    Array (in order) : <input type="text" name="array" value="<?php echo $arrtmp; ?>"><br>
    Search For : <input type="text" name="searchfor" value="<?php echo $input; ?>"><br>
    <input type="submit" name="Submit" value="Submit">
</form>

<b>
<?php

if(isset($_POST['Submit']))
{
    if($fbool)
        echo "filestream : ".$fname.'<br>';
        
    foreach($arr as $p) {
        echo $p.' ';
    }

    echo '<br>search : '.$input.'<br>index : '.$index;
}

?>
</b>