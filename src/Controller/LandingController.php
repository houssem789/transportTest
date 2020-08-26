<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Security\PostVoter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Fullfidesio;
use App\Entity\Correspondance;
use App\Entity\ModeTransport;
use App\Entity\Station;
use App\Entity\Terminus;

class LandingController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('fidesio/home/index.html.twig', ['posts' => []]);
    }
    /**
     * @Route("/questions/4", methods="GET|POST", name="question_four")
     */
    public function questionFour()
    {
        $em = $this->get('doctrine')->getManager();

        $stations = $em->getRepository(Station::class)
            ->findAll();
        $correspondances = $em->getRepository(Correspondance::class)
            ->findAll();

        dump($correspondances[0]->getModeTransport()->getTerminuses());

        die;
        dump($correspondances[0]);
        dump($correspondances[0]->getModeTransport()->getLigne());
        dump($correspondances[0]->getModeTransport());
        dump($correspondances[0]->getmodeTransport()->gettypeTransport());


        die;
        foreach ($correspondances as $corr) {
            foreach ($corr[0]->getModeTransport()->getTerminuses() as $elem) {
                dump($elem);
            }
        }
        die;
        return $this->render(
            'fidesio/question/question4.html.twig',
            [
                'correspondances' => $correspondances
            ]
        );
    }
    /**
     * @Route("/questions/2", methods="GET|POST", name="question_two")
     */
    public function questionTwo()
    {
        dump('in the 2');
        die;
        return true;
    }
}
