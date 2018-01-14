<?php


function data_uri($file, $mime) 

{  

  $contents = file_get_contents($file);

  $base64   = base64_encode($contents); 

  return ('data:' . $mime . ';base64,' . $base64);

}

function ShowThePictures($imageFolder){

# To prevent browser error output

header('Content-Type: text/javascript; charset=UTF-8');

$imageFolder = $_SESSION['folder'];

# Show only these file types from the image folder

$imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

# Set to true if you prefer sorting images by name

# If set to false, images will be sorted by date

$sortByImageName = false;

# Set to false if you want the oldest images to appear first

# This is only used if images are sorted by date (see above)

$newestImagesFirst = true;

# The rest of the code is technical

# Add images to array

$images = glob($imageFolder . $imageTypes, GLOB_BRACE);

# Sort images

if ($sortByImageName) {

    $sortedImages = $images;

    natsort($sortedImages);

} else {

    # Sort the images based on its 'last modified' time stamp

    $sortedImages = array();

    $count = count($images);

    for ($i = 0; $i < $count; $i++) {

        $sortedImages[date('YmdHis', filemtime($images[$i])) . $i] = $images[$i];

    }

    # Sort images in array

    if ($newestImagesFirst) {

        krsort($sortedImages);

    } else {

        ksort($sortedImages);

    }

}

# Generate the HTML output

writeHtml('<ul class="ins-imgs">');

foreach ($sortedImages as $image) {

    # Get the name of the image, stripped from image folder path and file type extension

    $name = 'Image name: ' . substr($image, strlen($imageFolder), strpos($image, '.') - strlen($imageFolder));

    # Get the 'last modified' time stamp, make it human readable

    $lastModified = '(last modified: ' . date('F d Y H:i:s', filemtime($image)) . ')';

    # Begin adding

    writeHtml('<li class="ins-imgs-li">');

    writeHtml('<div class="ins-imgs-img" onclick=this.classList.toggle("zoom");><a name="' . $image . '">');

    writeHtml('<img src="' . data_uri($image,$imageFolder) . '" alt="' . $name . '" title="' . $name . '">');

    writeHtml('</a></div>');

    writeHtml('<div class="ins-imgs-label">' . $name . ' ' . $lastModified . '</div>');

    

    writeHtml('</li>');

}

writeHtml('</ul>');

writeHtml('<link rel="stylesheet" type="text/css" href="stylesheets/ins-imgs.css">');

# Convert HTML to JS

function writeHtml($html) {

    echo "document.write('" . $html . "');\n";

}
}