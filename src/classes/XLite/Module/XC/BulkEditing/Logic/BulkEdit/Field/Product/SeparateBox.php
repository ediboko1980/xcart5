<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\BulkEditing\Logic\BulkEdit\Field\Product;

class SeparateBox extends \XLite\Module\XC\BulkEditing\Logic\BulkEdit\Field\AField
{
    public static function getSchema($name, $options)
    {
        return [
            $name => [
                'label'    => static::t('Separate box'),
                'type'     => 'XLite\View\FormModel\Type\SwitcherType',
                'position' => isset($options['position']) ? $options['position'] : 0,
            ],
        ];
    }

    public static function getData($name, $object)
    {
        return [
            $name => true,
        ];
    }

    public static function populateData($name, $object, $data)
    {
        $object->setUseSeparateBox($data->{$name});
    }

    /**
     * @param string               $name
     * @param \XLite\Model\Product $object
     * @param array                $options
     *
     * @return array
     */
    public static function getViewData($name, $object, $options)
    {
        $requiresShipping = $object->getShippable();

        return $requiresShipping
            ? [
                $name => [
                    'label'    => static::t('Separate box'),
                    'value'    => $object->getUseSeparateBox() ? static::t('Yes') : static::t('No'),
                    'position' => isset($options['position']) ? $options['position'] : 0,
                ],
            ]
            : [];
    }
}