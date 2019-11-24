<?php


namespace App\Controller;

use Qiniu\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Qiniu\Storage\UploadManager;

class QiuniuController extends AbstractController
{
    /**
     * @Route("/qiNiuToken")
     */
    public function qiNiuToken()
    {
        $accessKey = 'Pplb_eTmCmPBrVY9Pk8-7tgYvEtl1gnbW0l6s39c';
        $secretKey = 'ufVV5X2fL9ZBZkIG7DZMYXrN4Hpyreqh_acCNYLh';
        $bucket = ' hq-high-room';
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传Token
        $token = $auth->uploadToken($bucket);

        // 构建 UploadManager 对象
        $uploadMgr = new UploadManager();

        return new Response($token);
    }

    /**
     * @Route("/upload")
     */
    public function uploadQiNiuAction(Request $request)
    {
//        $accessKey = 'Pplb_eTmCmPBrVY9Pk8-7tgYvEtl1gnbW0l6s39c';
//        $secretKey = 'ufVV5X2fL9ZBZkIG7DZMYXrN4Hpyreqh_acCNYLh';
//        $bucket = ' hq-high-room';
//        $auth = new Auth($accessKey, $secretKey);     
//        // 生成上传Token
//        $token = $auth->uploadToken($bucket);
//    
//        //构建 UploadManager 对象
//        $uploadMgr = new UploadManager();

        return new Response('$token');
    }

    /**
     * @Route("/form")
     */
    public function toFileFormAction()
    {
        $html = $this->render('fileupload.html.twig', array('name' => 'llt'));
        return new Response($html);


    }

}