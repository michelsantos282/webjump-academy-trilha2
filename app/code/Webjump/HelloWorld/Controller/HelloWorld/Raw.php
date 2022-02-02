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
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\Raw as ResultPage;

class Raw implements HttpGetActionInterface
{
    /**
     * @var RawFactory $rawFactory
     */
    private RawFactory $rawFactory;

    /**
     * @param RawFactory $rawFactory
     */
    public function __construct(RawFactory $rawFactory)
    {
        $this->rawFactory = $rawFactory;
    }

    /**
     * @return ResultPage
     */
    public function execute(): ResultPage
    {
        $resultRaw = $this->rawFactory->create();
        return $resultRaw->setContents("This is my Raw Content");
    }
}
