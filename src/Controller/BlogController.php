<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BlogController extends AbstractController
{
    /**
     * @Route("", name="generate your resume")
     */
    public function index(User $user=null,Request $request,UserRepository $repo)
    {
        $form=$this->createFormBuilder()
                    ->add('username', TextType::class,[ 
                        'attr'=>
                        [ 'placeholder' =>"your username" ]])
                    ->add('generate', SubmitType::class, ['label' => 'Generate resume'])
                    ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
               // get our username from post request
                $username=$request->get('form')['username'];
                // dump($username);
                $repo=$this->getDoctrine()->getRepository(User::class);
                //get user by its username
                $user=$repo->findOneByUsername($username);
                //dump($user);
                if($user==null){
                    return $this->render('resume/index.html.twig',[
                    'form'=>$form->createView(),
                    'noUser'=>'no user with that username'
                    ]);
                }
                return $this->render('resume/show.html.twig',[
                    'user'=>$user
                ]);
            }
        return $this->render('resume/index.html.twig',[
            'form'=>$form->createView(),
        ]);        
        
    }
    
}
