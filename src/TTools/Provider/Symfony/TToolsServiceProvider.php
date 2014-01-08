<?php
/**
 * Helper Class to share a TTools Service on the application container
 */

namespace TTools\Provider\Symfony;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use TTools\Provider\Symfony\SymfonyRequestProvider;
use TTools\Provider\Symfony\SymfonyStorageSession;
use TTools\App;

class TToolsService {

    private $ttools;

    /**
     * @param array $config
     * @param SessionInterface $session
     * @param Request $request
     *
     */
    public function __construct(array $config = [], SessionInterface $session, Request $request)
    {
        $sp = new SymfonyStorageSession($session);
        $rp = new SymfonyRequestProvider($request);

        $this->ttools = new App($config, $sp, $rp);
    }

    /**
     * @return \TTools\App
     */
    public function getManager()
    {
        return $this->ttools;
    }

} 