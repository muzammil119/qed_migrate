<?php

namespace Drupal\qed_entity\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for displaying Qedcity data.
 */
class QedcityController extends ControllerBase {

  public function display() {
    $storage = \Drupal::entityTypeManager()->getStorage('qedcity');
    $entities = $storage->loadMultiple();

    $rows = [];
    foreach ($entities as $entity) {
      $rows[] = [
        'city' => $entity->get('city')->value,
        'state' => $entity->get('state')->value,
        'pop' => $entity->get('pop')->value,
        'loc' => json_encode($entity->get('loc')->value),
      ];
    }

    $header = ['City', 'State', 'Population', 'Location'];
    $build = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    ];

    return $build;
  }
}
