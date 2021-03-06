<?php


namespace App\EventListener;


use App\Entity\Application;
use App\Service\ApplicationMailer;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class ApplicationCreationListener
{
    /**
     * @var ApplicationMailer
     */
    private $applicationMailer;

    public function __construct(ApplicationMailer $applicationMailer)
    {
        $this->applicationMailer = $applicationMailer;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof Application) {
            return;
        }
        $this->applicationMailer->sendNewNotification($entity);
    }
}