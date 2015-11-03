<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/image", name="postImage")
     */
    public function postImage(Request $request)
    {
        $uploadPath = realpath(__DIR__.'/../../../web/media');

        $file = $request->files->get('file');

        $data = array(
            'status'=> 200,
            'success'=> false,
            'message'=> 'no file selected',
            'file'=> null
        );

        if($file){
            $newFileName = md5($file->getClientOriginalName().time() ) ."." . $file->guessExtension();

            $file->move($uploadPath,$newFileName);

            $data['success'] = true;
            $data['message'] = 'File Uploaded';
            $data['file'] = "/media/".$newFileName;
        }

        return new JsonResponse($data);
    }
}
