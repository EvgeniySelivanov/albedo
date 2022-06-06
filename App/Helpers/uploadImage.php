<?php
require_once 'App/Helpers/Messages.php';
function uploadImage()
{
    $file = $_FILES['filename'];
    extract($file); //реструктуризация массива (разбили на переменные)
   /*  if ($error == 4) {
        setMessage('File not selected');
        
    } */
    $path='/';
    $accessType = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($type, $accessType)) {         //проверяет совпадет ли тип картинки со значениями в массиве $accessType
        setMessage('File is not image!!!');
        header('Location: '.$path);
        die();
    }
    if ($size > 50 * 1024 * 1024) {     //ограничили размер в 50 мегабайт
        setMessage('Size is over!!!');
        
        header('Location: '.$path);
        die();
    }

    if (!file_exists('upload')) //проверяет существование папки и если нет то создаём директорию
    {
        mkdir('upload'); //создаем директорию
    }
    $name = time() . rand(0, 1000) . '_' . $name; //для рандомного имени файла

    move_uploaded_file($tmp_name, "upload/$name"); //перемести файл из временной директории в ту которую мы назвали 

    
    cropImage("upload/$name", 150, true,'small');
    
    return $name;

}





     function cropImage($path, $dest_width, $crop,$size)
    {
    //создаем изоборажение на основе пути
    $funcCreate='imagecreatefrom' . getTypeImage($path);
    $src =$funcCreate($path); //создай джипег на основе указанного пути
    $src_width = imagesx($src); // возвращает ширину изображение
    $src_height = imagesy($src); //высота изображения


    if ($crop) {                                                //если обрезать
        $dest = imagecreatetruecolor($dest_width, $dest_width); //создали квадрат
        if ($src_width > $src_height) {
            imagecopyresized($dest, $src, 0, 0, ($src_width - $src_height) / 2, 0, $dest_width, $dest_width, $src_height, $src_height);  //скопировали из большо картинки в маленькую
        } else {
            imagecopyresized($dest, $src, 0, 0, 0, ($src_height - $src_width) / 2, $dest_width, $dest_width, $src_width, $src_width);
        }
    }

else{                                                //пропорциональное изменение размеров

    $dest_height  =  $dest_width / ( $src_width/$src_height);//вычисляем соотношение сторон
    $dest = imagecreatetruecolor($dest_width, $dest_height);////создали прямоугольник
    imagecopyresized($dest,$src,0,0,0,0,$dest_width, $dest_height,$src_width,$src_height);
}

$funcSave='image' . getTypeImage($path);//===image+расширение(imagejpeg) как встроеная функция
extract (pathinfo($path));//извлекли $dirname,$size,$basename
//imagejpeg($dest, 'upload/crop.jpg');//создать изображение в заданной директории
$funcSave($dest,"$dirname/{$size}_$basename");

}


function getTypeImage($path){
    $info=pathinfo($path);
    return  strtolower($info['extension'])=='jpg'?'jpeg':$info['extension'];//если в инфо есть jpg возвращай jpeg иначе возвращай содержимое $info['extention']  и преобразовали в нижний регистр
    
    }


