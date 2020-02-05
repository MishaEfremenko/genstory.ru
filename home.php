<?php
    $page=$_SERVER["REDIRECT_URL"];
    $theme=$twig->LoadTemplate('home.html');
    $connect=DBwork::get_connect('localhost','u0847564_adminm','*********','u0847564_states');
    $ar = DBwork::get_cat($connect);

    $ismobile=isMobile();
    if ($page=='/'){
        $title='все статьи';
        $states=DBwork::get_states($connect);
        echo $theme->render(array(
            'ismobile'=>$ismobile,
            'title'=>$title,
            'ar'=>$ar,
            'states'=>$states
        ));
    }
    elseif (explode('/',$page)[1]=='cat'){
        $states_list = DBwork::get_states($connect);
        $cat=(explode('/',$page)[2]);
        $states=[];
        $title='тематические статьи';
        foreach ($states_list as $states_list_part){
            if ($states_list_part['cat_href1']==$cat){
                array_push($states,$states_list_part);
            }
        }
        echo $theme->render(array(
            'title'=>$title,
            'ar'=>$ar,
            'states'=>$states
        ));
    }
?>