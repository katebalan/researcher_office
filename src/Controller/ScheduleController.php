<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Service\ApiRozkladService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleController extends AbstractController
{
    /**
     * @Route("/schedule", name="ro_schedule")
     */
    public function index(ApiRozkladService $apiRozkladService)
    {
        /** @var User $user */
        $user = $this->getUser();
        $content = '';

        if ($user->getApiRozkladId()) {
            try {
                $response = $apiRozkladService->getLessons($user->getApiRozkladId());

                $content = $response;
                $content = $this->group_by('lesson_week', $content['data']);

                foreach ($content as &$lesson) {
                    $lesson = $this->group_by('lesson_number', $lesson);

                    foreach ($lesson as &$day) {
                        $day = $this->group_by('day_number', $day);
                    }
                }
            } catch (\Exception $exception) {
                $content = 'No lessons found';
            }
        } else {
            $content = 'No content, please fill in your profile (rozklad.kpi)';
        }

        return $this->render('schedule/index.html.twig', [
            'content' => $content,
        ]);
    }

    /**
     * Function that groups an array of associative arrays by some key.
     *
     * @param {String} $key  Property to sort by
     * @param {Array}  $data Array that stores multiple associative arrays
     *
     * @return array
     */
    public function group_by($key, $data)
    {
        $result = [];

        foreach ($data as $val) {
            if (\array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[''][] = $val;
            }
        }

        return $result;
    }
}
