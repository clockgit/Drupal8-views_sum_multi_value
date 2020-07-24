<?php

/**
 * @file
 * Contains views_sum_multi_value\views_sum_multi_value.views.inc..
 * Provide a custom views field data that isn't tied to any other module. */


/**
* Implements hook_views_data().
*/
function views_sum_multi_value_views_data() {

    $data['views']['table']['group'] = t('Custom Global');
    $data['views']['table']['join'] = [
      // #global is a special flag which allows a table to appear all the time.
      '#global' => [],
    ];

    $data['views']['vsmv'] = [
        'title' => t('Vsmv'),
        'help' => t('Display Multi Value field as sum'),
        'field' => [
            'id' => 'vsmv',
        ],
    ];
    return $data;
}
