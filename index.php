<?php
$categories = array(
    array(
        'id'        =>  1,
        'parent_id' =>  0,
        'text'      =>  'Man',
    ), array(
        'id'        =>  2,
        'parent_id' =>  0,
        'text'      =>  'Woman',
    ), array(
        'id'        =>  3,
        'parent_id' =>  2,
        'text'      =>  'Top',
    ), array(
        'id'        =>  4,
        'parent_id' =>  2,
        'text'      =>  'Skirt',
    ), array(
        'id'        =>  5,
        'parent_id' =>  4,
        'text'      =>  'Square Tops',
    ), array(
        'id'        =>  6,
        'parent_id' =>  0,
        'text'      =>  'Child',
    ), array(
        'id'        =>  7,
        'parent_id' =>  5,
        'text'      =>  'Fit Square',
    )
);




function makeCategoryList($categories,$parent=0){
    $result = array();
    for( $i=0,$c=count($categories); $i<$c; $i++ ){
        if( $categories[$i]['parent_id']==$parent ){
            $categories[$i]['childs'] = makeCategoryList($categories,$categories[$i]['id']);
            $result[] = $categories[$i];
        }
    }
    return $result;
}

 echo '<pre>';
var_dump(makeCategoryList($categories));
 echo '</pre>';


$result = array();
$result['categories'] = makeCategoryList($categories);
echo json_encode($result);



 function printCategoryList(&$categories,$parent=0){
     $foundSome = false;
     for( $i=0,$c=count($categories);$i<$c;$i++ ){
         if( $categories[$i]['parent_id']==$parent ){
             if( $foundSome==false ){
                 echo '<ul>';
                 $foundSome = true;
             }
             echo '<li>'.$categories[$i]['text'].'</li>';
             printCategoryList($categories,$categories[$i]['id']);
         }
     }
     if( $foundSome ){
         echo '</ul>';
     }
 }

 printCategoryList($categories);



?>