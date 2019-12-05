<?php


namespace App\Twig;


use App\Entity\Publication;
use App\Entity\User;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PublicationExtension extends AbstractExtension
{
    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('formatLink', [$this, 'formatLink']),
        ];
    }

    /**
     * @param Publication $entity
     * @return mixed
     * @throws \Exception
     */
    public function formatLink(Publication $entity)
    {
        $result = '';

        /** @var User $user */
        foreach ($entity->getCoAuthors() as $key => $user)
            $result .= $key === 0 ? $user : ', ' . $user ;

        $result .= ($entity->getCoAuthorsSimple()) ? ', ' . $entity->getCoAuthorsSimple() . ' ' : ' ';
        $result .= $entity->getName() . '. ';
        $result .= date_format($entity->getDate(), 'Y') . '. ';

        return $result;
    }
}
