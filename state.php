<?php
	$page=explode('/',$_SERVER["REDIRECT_URL"])[2];
    $theme=$twig->LoadTemplate('mystate.html');
    $connect=DBwork::get_connect('localhost','u0847564_adminm','*********','u0847564_states');
	$ar = DBwork::get_cat($connect);

	$state=DBwork::get_state($connect,$page);
	$ismobile=isMobile();
	if ($state==null)
		exit('страницы не существует');
	else{
		echo $theme->render(array(
			'ismobile'=>$ismobile,
            'ar'=>$ar,
            'state'=>$state
        ));
	}
?>