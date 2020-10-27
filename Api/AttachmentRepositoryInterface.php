<?php

declare(strict_types = 1);

/**
 * File: AttachmentRepositoryInterface.php
 *
 * @author Bartosz Kubicki bartosz.kubicki@lizardmedia.pl>
 * @copyright Copyright (C) 2018 Lizard Media (http://lizardmedia.pl)
 */

namespace LizardMedia\ProductAttachment\Api;

use LizardMedia\ProductAttachment\Api\Data\AttachmentInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface AttachmentRepositoryInterface
 * @package LizardMedia\ProductAttachment\Api
 */
interface AttachmentRepositoryInterface
{
    /**
     * @param int $id
     * @return AttachmentInterface
     * @throws NoSuchEntityException
     */
    public function getById($id) : AttachmentInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param int $storeId
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria, int $storeId = 0) : SearchResultsInterface;

    /**
     * @param ProductInterface $product
     * @return AttachmentInterface[]
     */
    public function getAttachmentsByProduct(ProductInterface $product) : array;

    /**
     * @param string $sku
     * @param AttachmentInterface $attachment
     * @param bool $isGlobalScopeContent
     * @return int
     */
    public function save(string $sku, AttachmentInterface $attachment, bool $isGlobalScopeContent = true): int;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool;

    /**
     * Create new gallery entry
     *
     * @param string $sku
     * @param AttachmentInterface $attachment
     * @return AttachmentInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function createForSku(
        $sku,
        AttachmentInterface $attachment
    );

    /**
     * Update gallery entry
     *
     * @param string $sku
     * @param AttachmentInterface $attachment
     * @return AttachmentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function updateForSku(
        $sku,
        $entryId,
        AttachmentInterface $attachment
    );

    /**
     * Remove gallery entry
     *
     * @param string $sku
     * @param int $entryId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function removeForSku($sku, $entryId);

    /**
     * Return information about gallery entry
     *
     * @param string $sku
     * @param int $entryId
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @return AttachmentInterface
     */
    public function getForSku($sku, $entryId);

    /**
     * Retrieve the list of gallery entries associated with given product
     *
     * @param string $sku
     * @return AttachmentInterface[]
     */
    public function getListForSku($sku);
}
