<?php

use Drupal\node\Entity;
use Drupal\views\ViewExecutable;
use Drupal\views\Plugin\views\query\QueryPluginBase;

function skeleton_views_query_alter(ViewExecutable $view, QueryPluginBase $query) {

  if (strpos($view->id(), 'view_machine_name')===0) {
    $uid = 1;
    $query->where[0]['conditions'][0] = ['value' => $uid, 'operator' => ' = ', 'field' => 'users_field_data_node_field_revision.uid'];
  }
}

