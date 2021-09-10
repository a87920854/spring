<?php
ini_set("memory_limit","2048M");
function openpdo()
{
    $dsn = "sqlsrv:server=192.168.88.2,1433;Database=springclub";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    return new PDO($dsn,'spring','28212342', $opt);
}

    $pdo = openpdo();

    echo '<table border=1 width=500>';    
    echo '<tr><td colspan=2>含 call</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/02/01 00:00' and '2020/02/29 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>2月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/03/01 00:00' and '2020/03/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>3月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/04/01 00:00' and '2020/04/30 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>4月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/05/01 00:00' and '2020/05/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>5月</td><td>'.$dd["t"].'</td></tr>';
    echo '<tr><td colspan=2>所有名單</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/02/01 00:00' and '2020/02/29 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>2月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/03/01 00:00' and '2020/03/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>3月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/04/01 00:00' and '2020/04/30 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>4月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/05/01 00:00' and '2020/05/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>5月</td><td>'.$dd["t"].'</td></tr>';
    
    echo '</table>';

?>