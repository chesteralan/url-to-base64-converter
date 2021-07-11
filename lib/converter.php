<?php

http://snipplr.com/view.php?codeview&id=70078

 /**
 * Data URI base64 PHP function.
 * 
 * @author        Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright     (c) 2012-2013, Pierre-Henry Soria. All Rights Reserved.
 * @license       Lesser General Public License (LGPL) <http://www.gnu.org/copyleft/lesser.html>
 * @param         string $sFile The path of your file to encode.
 * @return        string The encoded data in base64.
 */
function base64DataUri($sFile)
{                   

    // Switch to right MIME-type
    $sExt = strtolower(substr(strrchr($sFile, '.'), 1));

    switch($sExt)
    {
        case 'gif':
        case 'jpg':
        case 'png':
            $sMimeType = 'image/'. $sExt;
        break;

        case 'ico':
            $sMimeType = 'image/x-icon';
        break;

        case 'eot':
            $sMimeType = 'application/vnd.ms-fontobject';
        break;

        case 'otf':
        case 'ttf':
        case 'woff':
            $sMimeType = 'application/octet-stream';
        break;

        case 'woff2':
            $sMimeType = 'font/woff2';
        break;

        default:
            exit('Invalid extension file!');
    }

    $sBase64 = base64_encode(file_get_contents($sFile));
    return "data:$sMimeType;base64,$sBase64";
}