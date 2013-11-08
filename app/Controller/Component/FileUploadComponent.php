<?php

class FileUploadComponent extends Component {

    var $controller = '';

    /**
     * uploads files to the server
     * @params:
     *         $folder     = the folder to upload the files e.g. 'img/files'
     *         $formdata     = the array containing the form files
     *         $itemId     = id of the item (optional) will create a new sub folder
     * @param $folder
     * @param $formdata
     * @param null $itemId
     * @param $permitted
     * @param bool $multifile
     * @return:
     *         will return an array with the success of each file upload
     */

    function uploadFiles($folder, $formdata, $itemId = null, $permitted, $multifile = false) {
        $typeOK = false;

        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {

            mkdir($folder_url, 0777);
            //change the chmod of medium project directory
            chmod($folder_url, 0777);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
                //change the chmod of medium project directory
                chmod($folder_url, 0777);
            }
        }
        // list of permitted file types, this is only images but documents can be added
        //$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

        if ($multifile == true) {
            // loop through and deal with the files
            foreach ($formdata as $file) {

                $file_ext = explode('.', $file['name']);

                // replace invalid characters with underscores
                $filename = Inflector::slug($file_ext[0]) . "." . $file_ext[1];

                // assume filetype is false
                $typeOK = false;
                // check filetype is ok
                foreach ($permitted as $type) {
                    if ($type == $file['type']) {
                        $typeOK = true;
                        break;
                    }
                }
            }
        } else {
            if (!empty($formdata['name'])) {

                //                pr($formdata);
                $file_ext = explode('.', $formdata['name']);

                // replace invalid characters with underscores
                $filename = Inflector::slug($file_ext[0]) . "." . $file_ext[1];

                // assume filetype is false
                $typeOK = false;

                // check filetype is ok
                foreach ($permitted as $type) {

                    if ($type == $formdata['type']) {
                        $typeOK = true;
                        break;
                    }
                }
                $file = $formdata;
            } else {
                $file = $formdata;
            }
        }

        //echo $filename;die;
        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch ($file['error']) {

                case 0:

                    //echo $folder_url . $filename . '=====';
                    //echo file_exists($folder_url . $filename);
                    // check filename already exists
                    if (!file_exists($folder_url . $filename)) {
                        // create full filename
                        $full_url = $folder_url . $filename;
                        $url = $rel_url . $filename;
                        // upload the file
                        $success = move_uploaded_file($file['tmp_name'], $url);
                    } else {
                        // create unique filename and upload file
                        ini_set('date.timezone', 'Europe/London');
                        $now = strtotime("now") . "_";
                        $filename = $now . $filename;
                        $full_url = $folder_url . '/' . $filename;
                        $url = $rel_url . $filename;
                        $success = move_uploaded_file($file['tmp_name'], $url);
                    }
                    // if upload was successful
                    if ($success) {
                        // save the url of the file
                        //echo $url;
                        chmod($url, 0777); //exit;
                        $result['urls'][] = $filename;
                    } else {
                        $result['errors'][] = "Error uploaded $filename. Please try again.";
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error uploading $filename. Please try again.";
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                    break;
            }
        } elseif ($file['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
            // unacceptable file type
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types:" . implode(',', $permitted) . "";
        }

        return $result;
    }

    function uploadFilesOnOtherFolder($folder, $formdata, $itemId = null, $permitted, $multifile = false) {
        $typeOK = false;

        // setup dir names absolute and relative
        $folder_url = $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {

            mkdir($folder_url, 0777);
            //change the chmod of medium project directory
            chmod($folder_url, 0777);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
                //change the chmod of medium project directory
                chmod($folder_url, 0777);
            }
        }
        // list of permitted file types, this is only images but documents can be added
        //$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

        if ($multifile == true) {
            // loop through and deal with the files
            foreach ($formdata as $file) {

                $file_ext = explode('.', $file['name']);

                // replace invalid characters with underscores
                $filename = Inflector::slug($file_ext[0]) . "." . $file_ext[1];

                // assume filetype is false
                $typeOK = false;
                // check filetype is ok
                foreach ($permitted as $type) {
                    if ($type == $file['type']) {
                        $typeOK = true;
                        break;
                    }
                }
            }
        } else {
            if (!empty($formdata['name'])) {

                $file_ext = explode('.', $formdata['name']);

                // replace invalid characters with underscores
                $filename = Inflector::slug($file_ext[0]) . "." . $file_ext[1];

                // assume filetype is false
                $typeOK = false;

                // check filetype is ok
                foreach ($permitted as $type) {

                    if ($type == $formdata['type']) {
                        $typeOK = true;
                        break;
                    }
                }
                $file = $formdata;
            } else {
                $file = $formdata;
            }
        }

        //echo $filename;die;
        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch ($file['error']) {

                case 0:
                    // check filename already exists
                    if (!file_exists($folder_url . $filename)) {
                        // create full filename
                        $full_url = $folder_url . $filename;
                        $url = $rel_url . $filename;
                        // upload the file
                        $success = move_uploaded_file($file['tmp_name'], $url);
                    } else {
                        // create unique filename and upload file
                        ini_set('date.timezone', 'Europe/London');
                        $now = strtotime("now") . "_";
                        $filename = $now . $filename;
                        $full_url = $folder_url . '/' . $filename;
                        $url = $rel_url . $filename;
                        $success = move_uploaded_file($file['tmp_name'], $url);
                        rename($folder_url . $filename, $folder_url . $file['name']);
                        $url = $folder_url . $file['name'];
                    }
                    // if upload was successful
                    if ($success) {
                        // save the url of the file
                        //echo $url;
                        chmod($url, 0777); //exit;
                        $result['urls'][] = $filename;
                    } else {
                        $result['errors'][] = "Error uploaded $filename. Please try again.";
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error uploading $filename. Please try again.";
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                    break;
            }
        } elseif ($file['error'] == 4) {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
            // unacceptable file type
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types:" . implode(',', $permitted) . "";
        }

        return $result;
    }

    function createDir($dir_path = WWW_ROOT, $dir_names = array()) {

        for ($i = 0; $i < sizeof($dir_names); $i++) {

            $folder_url = WWW_ROOT . $dir_path . DS . $dir_names[$i];

            if (!is_dir($folder_url)) {
                //create dir
                mkdir($folder_url, 01777);
                //change the chmod of medium project directory
                chmod($folder_url, 01777);
            }
        }
    }

    function unlinkFile($file_path) {

        $path = WWW_ROOT . $file_path;

        if (unlink($path)) {
            return true;
        }
    }

    function download($file, $content_type) {

        if (file_exists($file)) {

            header('Content-Description: File Transfer');
            header("Content-Type: $content_type");
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');

            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));

            ob_clean();
            flush();

            readfile($file);
            exit;
        } else {
            return false;
        }
    }

    function renameMe($name, $rename) {

        $path = 'files/flash/';

        if (file_exists($path . $name)) {

            if (rename($path . $name, $path . $rename)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function deleteMe($file_Folder) {

        if (unlink($file_Folder)) {
            return true;
        } else {
            return false;
        }
    }

    function copydir($source, $destination) {

        if (!is_dir($destination)) {

            $oldumask = umask(0);
            mkdir($destination, 01777); // so you get the sticky bit set
            umask($oldumask);
        }

        $dir_handle = @opendir($source) or die("Unable to open");

        while ($file = readdir($dir_handle)) {

            if ($file != "." && $file != ".." && !is_dir("$source/$file")) {
                copy("$source/$file", "$destination/$file");
                unlink("$source/$file");
            }
        }

        closedir($dir_handle);
    }

    function removedir($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else {
                    $a = $dirname . '/' . $file;
                    removedir($a);
                }
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    function getImageDimentions($tmpName) {

        list($width, $height, $type, $attr) = getimagesize($tmpName);

        return array('width' => $width, 'height' => $height);
    }


    /**
     * @name  resize image
     * @perpose to resize image
     * @param $path
     * @param $width
     * @param $height
     * @param $webroot_path
     * @param $file
     * @param bool $aspect
     * @param array $htmlAttributes
     * @param bool $return
     * @return string
     */

    function resize_image($path, $width, $height, $webroot_path, $file, $aspect = false, $htmlAttributes = array(), $return = false) {

        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp", "JPG"); // used to determine image type

        $folder_name = str_replace(basename($path), '', $path);
        //$this->cacheDir = str_replace('/img/','',$folder_name);
        $this->cacheDir = '/img/uploaded';
        $fullpath = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS;

        $path = '/' . str_replace($fullpath, '', $path);
        //return $fullpath;
        $url = $fullpath . $path;
        if (!($size = getimagesize($url))) {
            return;
        }

        $FTP_OFFER_DIR = ROOT . $file;

        if ($aspect) { // adjust to aspect.

            $target = 150;
            //takes the larger size of the width and height and applies the formula accordingly...this is so this script will work dynamically with any size image
            if ($width > $height) {
                $percentage = ($target / $width);
            } else {
                $percentage = ($target / $height);
            } //gets the new value and applies the percentage, then rounds the value
            $width = round($width * $percentage);
            $height = round($height * $percentage);

        }

        $relfile = $fullpath . $this->cacheDir . '/' . $file; // relative file
        $cachefile = $fullpath . $this->cacheDir . DS . $width . 'x' . $height . DS . $file; //exit; // location on server
        $cachefile = str_replace('//', '/', $cachefile);
        $relfile = str_replace('//', '/', $relfile);

        $this->create_dir($fullpath . $this->cacheDir . DS . $width . 'x' . $height);

        if (file_exists($cachefile)) {
            $csize = getimagesize($cachefile);
            $cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
            if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
                $cached = false;
        } else {
            $cached = false;
        }

        if (!$cached) {

            $resize = ($size[0] >= $width || $size[1] >= $height) || ($size[0] <= $width || $size[1] <= $height);

        } else {
            $resize = false;
        }

        if ($resize) {
            $image = call_user_func('imagecreatefrom' . $types[$size[2]], $relfile);

            if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor($width, $height))) {
                imagecopyresampled($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            } else {
                $temp = imagecreate($width, $height);
                imagecopyresized($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            }

            call_user_func("image" . $types[$size[2]], $temp, $cachefile);
            imagedestroy($image);
            imagedestroy($temp);
        }

        return basename($relfile);

    }


    function create_dir($path) {

        $return = false;

        //create directory if not created already
        if (!is_dir($path)) {

            mkdir($path, 0777, true); // or even 01777 so you get the sticky bit set

            $this->change_permissions($path, 0777);

            $return = true;
        }

        return $return;
    }

    function change_permissions($file, $permissions) {

        $return = false;

        if (file_exists($file)) {

            chmod($file, $permissions); // or even 01777 so you get the sticky bit set

            $return = true;
        }

        if (is_dir($file)) {

            chmod($file, $permissions); // or even 01777 so you get the sticky bit set

            $return = true;
        }

        return $return;
    }
}

?>