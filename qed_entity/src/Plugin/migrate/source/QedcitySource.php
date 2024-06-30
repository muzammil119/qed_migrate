<?php

namespace Drupal\qed_entity\Plugin\migrate\source;

use Drupal\migrate_plus\Plugin\migrate\source\Url;
use Drupal\migrate_plus\Plugin\migrate\source\DataParserPluginManager;
use Drupal\migrate_plus\Plugin\migrate\source\DataFetcherPluginManager;

/**
 * Source plugin for cities.
 *
 * @MigrateSource(
 *   id = "qedcity_source"
 * )
 */
class QedcitySource extends Url {

  public function __construct(array $configuration, $plugin_id, $plugin_definition, DataFetcherPluginManager $data_fetcher, DataParserPluginManager $data_parser) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $data_fetcher, $data_parser);
  }

  public function fields() {
    $fields = [
      'city' => $this->t('City'),
      'state' => $this->t('State'),
      'pop' => $this->t('Population'),
      'loc' => $this->t('Location'),
    ];
    return $fields;
  }

  public function getIds() {
    $ids['city'] = [
      'type' => 'string',
      'alias' => 'c',
    ];
    return $ids;
  }
}
