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

namespace Webjump\HelloWorld\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PetSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get pets list.
     *
     * @return PetInterface[]
     */
    public function getItems(): PetInterface;

    /**
     * Set pets list.
     *
     * @param PetInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
