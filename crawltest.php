<?php
include 'crawl/simple_html_dom.php';

function rel2abs($rel, $base){
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
    extract(parse_url($base));
    $path = preg_replace('#/[^/]*$#', '', $path);
    if ($rel[0] == '/') $path = '';
    $abs = "$host$path/$rel";
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n=1; $n>0;$abs=preg_replace($re,'/', $abs,-1,$n)){}
    $abs=str_replace("../","",$abs);
    return $scheme.'://'.$abs;
}

function perfect_url($u,$b){
//                echo "<br/>u: ".$u."<br/>";
//                echo "b: ".$b."<br/>";
    $bp=parse_url($b);
    if(($bp['path']!="/" && $bp['path']!="") || $bp['path']==''){
        //echo "first IF<br/>";
        if($bp['scheme']==""){$scheme="http";}else{$scheme=$bp['scheme'];}
        $b=$scheme."://".$bp['host']."/";
    }
    if(substr($u,0,2)=="//"){
        //echo "second IF<br/>";
        $u="http:".$u;
    }
    if(substr($u,0,4)!="http"){
        //echo "third IF<br/>";
        $u=rel2abs($u,$b);
    }
    return $u;
}

$url1 = "http://www.cricbuzz.com/cricket-series/2684/super-four-provincial-tournament-2018/matches";

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url1);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($curl);
curl_close($curl);

//echo $response;

$html = new simple_html_dom();
$html->load($response);

foreach ($html->find('span') as $link){
    echo $link;
//    foreach ($link->find('a[href]') as $item){
//        $url = perfect_url($item->href,$url1);
//        if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java"){
//            echo "<li><a target='_blank' href='".$url."'>$item->title</a></li>";
//        }
//        echo "another test ".$item->title;
//    }

}


//
//
//            foreach ($html->find('h3') as $link){
//                echo $link;
//                foreach ($link->find('a[href]') as $item){
//                    //echo "item: ".$item;
//                    $url = perfect_url($item->href,$url1);
//                    if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java"){
//                        echo "<li><a target='_blank' href='".$url."'>$item->title</a></li>";
//                    }
//                }
//            }
//
//
//            ?>












