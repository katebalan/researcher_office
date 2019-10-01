<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleController extends AbstractController
{
    /**
     * @Route("/schedule", name="ro_schedule")
     */
    public function index()
    {
        /** @var User $user */
        $user = $this->getUser();

        $fullName = $user
            ? $user->getSecondName() . '+' . $user->getFirstName() . '+' .$user->getPatronymic()
            : '';

        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://api.rozklad.org.ua/v2/teachers/'. $fullName . '/lessons'
        );

        $content = false;
        if ($response->getStatusCode() === 200) {
            $content = $response->toArray();
            $content = $this->group_by('lesson_week', $content['data']);

            foreach ($content as &$lesson) {
                $lesson = $this->group_by('lesson_number', $lesson);

                foreach ($lesson as &$day) {
                    $day = $this->group_by('day_number', $day);
                }
            }
        }

        return $this->render('schedule/index.html.twig', [
            'content' => $content,
        ]);
    }

    /**
     * Function that groups an array of associative arrays by some key.
     *
     * @param {String} $key Property to sort by.
     * @param {Array} $data Array that stores multiple associative arrays.
     * @return array
     */
    function group_by($key, $data) {
        $result = array();

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }
}
