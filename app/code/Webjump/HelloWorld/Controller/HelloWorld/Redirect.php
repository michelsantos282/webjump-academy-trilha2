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

namespace Webjump\HelloWorld\Controller\HelloWorld;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\Redirect as ResultRedirect;

class Redirect implements HttpGetActionInterface
{

    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;

    public function __construct(RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * @return ResultRedirect
     */
    public function execute(): ResultRedirect
    {
        $result = $this->redirectFactory->create();
        return $result->setPath('webjump/helloworld/json');
    }
}
