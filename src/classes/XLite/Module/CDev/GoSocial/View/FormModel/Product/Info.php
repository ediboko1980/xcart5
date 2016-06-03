<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\GoSocial\View\FormModel\Product;

class Info extends \XLite\View\FormModel\Product\Info implements \XLite\Base\IDecorator
{
    /**
     * @return array
     */
    protected function defineFields()
    {
        $schema = parent::defineFields();

        $schema['marketing']['og_tags_type'] = [
            'label'             => static::t('Open Graph meta tags'),
            'type'              => 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',
            'choices'           => array_flip([
                '0' => static::t('Autogenerated'),
                '1' => static::t('Custom'),
            ]),
            'choices_as_values' => true,
            'placeholder'       => false,
            'position'          => 50,
        ];
        $schema['marketing']['og_tags'] = [
            'help'      => static::t('These Open Graph meta tags were generated automatically based on general product information.'),
            'type'      => 'Symfony\Component\Form\Extension\Core\Type\TextareaType',
            'show_when' => [
                'marketing' => [
                    'og_tags_type' => '1',
                ],
            ],
            'position'  => 51,
        ];


        return $schema;
    }
}