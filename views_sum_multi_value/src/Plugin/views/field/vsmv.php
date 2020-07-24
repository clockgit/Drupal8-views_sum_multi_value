<?php

namespace Drupal\views_sum_multi_value\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("vsmv")
 */
class vsmv extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   * returns and displays the sum of a multivalued field.
   */
  public function render(ResultRow $values) {
    //todo add field selection in buildOptions to allow running this function on other fields
    //Currently only runs on field_d30 to allowing the correct format for KSDE KIDS reporting
    $d30 = $this->view->field['field_d30']->last_render;
    $races = explode(',',strip_tags($d30));
    $race_sum = 0;
    foreach($races as $race) {
      $race_sum += (int)$race;
    }
    //todo add format to buildOptions to allow control of display
    return sprintf('%05d', $race_sum);
  }

}
