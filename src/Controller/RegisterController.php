<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Trader;
use App\Entity\Distributor;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\Regex;
use App\Symfony\Type\TaskType;


class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passEncoder)
    {
       $form = $this -> createFormBuilder()
                ->add('first_name')
                ->add('last_name')
                ->add('e-mail')
                ->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options' => ['label' => 'Password'],
                    'second_options' => ['label' => 'Confirm Password']
                ])
                ->add('role', ChoiceType::class, [
                    'choices' => [
                        '' => '',
                        'Distributor' => 'ROLE_DISTRIBUTOR',
                        'Trader' => 'ROLE_TRADER',
                    ]
                ])
                ->add('register', SubmitType::class, [
                    'attr' => [
                        'class' => 'btn btn-success float-right'
                    ]
                ])
                ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            if ($form->get('role')->getData() == 'ROLE_DISTRIBUTOR') {
                $data = $form->getData();
                $distributor = new Distributor();
                $distributor->setName($data['first_name'] . " " . $data['last_name']);
                $distributor->setRoles(['ROLE_DISTRIBUTOR']);
                $distributor->setEmail($data['e-mail']);
                $distributor->setPassword(
                    $passEncoder->encodePassword($distributor, $data['password'])
                );

                $em = $this->getDoctrine()->getManager();
                $em->persist($distributor);
                $em->flush();

                return $this->redirect($this->generateUrl('app_login'));
            } else {
                $data = $form->getData();

                $trader = new Trader();
                $trader->setFirstName($data['first_name']);
                $trader->setLastName($data['last_name']);
                $trader->setRoles(['ROLE_TRADER']);
                $trader->setEmail($data['e-mail']);
                $trader->setPassword(
                    $passEncoder->encodePassword($trader, $data['password'])
                );

                $em = $this->getDoctrine()->getManager();
                $em->persist($trader);
                $em->flush();

                return $this->redirect($this->generateUrl('app_login'));
            }
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
