<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class AuthenticationEntryPoint implements AuthenticationEntryPointInterface
{
    private $urlGenerator;

    public function setFlash($type, $event, $params = array())
    {

        /** @var FlashBag $flashBag */
        $flashBag = $this->session->getBag('flashes');
        $flashBag->add($type, $this->generateFlashMessage($event, $params));
    }

    private function generateFlashMessage($event, $params = array())
    {
        if (false === strpos($event, 'sylius.')) {
            $message = $this->config->getFlashMessage($event);
            $translatedMessage = $this->translateFlashMessage($message, $params);
            if ($message !== $translatedMessage) {
                return $translatedMessage;
            }
            return $this->translateFlashMessage('sylius.resource.'.$event, $params);
        }
        return $this->translateFlashMessage($event, $params);
    }
    private function translateFlashMessage($message, $params = array())
    {
        $resource = ucfirst(str_replace('_', ' ', $this->config->getResourceName()));
        return $this->translator->trans($message, array_merge(array('%resource%' => $resource), $params), 'flashes');

    }

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function start(Request $request, AuthenticationException $authException = null): RedirectResponse
    {

     
        // add a custom flash message and redirect to the login page
        $request->getSession()->getBag('note', 'Vous n\'etes pas autorisé à aller sur cette page.');

        return new RedirectResponse($this->urlGenerator->generate('security_login'));
    }
}
