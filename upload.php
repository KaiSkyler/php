//批量下载图片
    public function download_img_all($data_img){
        $res = json_decode($data_img);
        
      
        //创建压缩包的路径
        $filename = $_SERVER['DOCUMENT_ROOT'].'/upload/zip/'.time().'.zip';

        $zip = new \ZipArchive;

        $zip->open($filename,$zip::CREATE);
        //往压缩包内添加目录
        $zip->addEmptyDir('images'); 

        for($i = 0; $i < count($res); $i++)
        {
            $fileData = file_get_contents( $_SERVER['DOCUMENT_ROOT']."/upload/".$res[$i]);
            $zip->addFromString('images/'.$res[$i], $fileData);
        }
        
        $zip->close();
        //打开文件
       
        //下载文件
        ob_end_clean();
        header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename='.time().'.zip');
        header('Content-Length: '.filesize($filename));
        error_reporting(0);
        readfile($filename);
        flush();
        ob_flush();


    }
 
