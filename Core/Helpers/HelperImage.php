<?php


// عملت ضغط لصور بسبب بعض احجام الصور كبيرة بتصل الى 
// MB15 
// ومش ملاقي في الموقع احجام اقل وحتى يكون الموقع سريع في تحميل والاداء

function compressImage(string $tmpPath, string $destination, int $quality = 70): bool
{
    $mime = mime_content_type($tmpPath);

    switch ($mime) {

        
        case 'image/jpeg':
        case 'image/jpg':
            $image = imagecreatefromjpeg($tmpPath);
            break;

        case 'image/png':
            $image = imagecreatefrompng($tmpPath);
            break;

        case 'image/webp':
            $image = imagecreatefromwebp($tmpPath);
            break;

        default:
            return false;
    }

    imagejpeg($image, $destination, $quality);

    imagedestroy($image);

    return true;
}

function uploadAndCompressImage($file, $folder = 'public/assets/imgs', $quality = 70)
{
    $imgName = uniqid() . '.jpg';
    $path = base_path($folder . '/' . $imgName);

    compressImage($file['tmp_name'], $path, $quality);

    return $imgName; 
}
