<?php

/**
 * @file
 * Contains \Drupal\example\Controller\ExampleController.

  https://www.drupal.org/node/2116767
 */

namespace Drupal\skeleton\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\views\Views;

class SkeletonController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function content() {
    
    $result = [];

    $uid = \Drupal::currentUser()->id();

    $v = Views::getView('view_component');
    $v->executeDisplay('default', [$uid]);
    foreach($v->result as $row) {
      $fieldname = $v->field['title']->table.'_'.$v->field['title']->field;
      $result[$row->{'nid'}] = $row->{$fieldname};
    }
    print json_encode($result);
    die;
  }

}
