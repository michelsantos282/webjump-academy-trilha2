<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Plugin;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\Action\Action;

class ActionPlugin
{

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Plugin Before Dispatch
     * @param Action $subject
     */
    public function beforeDispatch(Action $subject)
    {
        $this->logger->debug("Eu fui chamado antes do Dispatch");
    }

    /**
     * Plugin Around Dispatch
     * @param Action $subject
     * @param callable $proceed
     * @param ...$args
     * @return mixed
     */
    public function aroundDispatch(Action $subject, callable $proceed, ...$args)
    {
        $this->logger->critical("Eu fui chamado durante o Dispatch");

        return $proceed(...$args);
    }

    /**
     * Plugin After Dispatch
     * @param Action $subject
     * @param $result
     * @return mixed
     */
    public function afterDispatch(Action $subject, $result)
    {
        $this->logger->debug("Eu fui chamado depois do Dispatch");

        return $result;
    }
}
