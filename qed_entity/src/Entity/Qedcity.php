<?php

namespace Drupal\qed_entity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Qedcity entity.
 *
 * @ContentEntityType(
 *   id = "qedcity",
 *   label = @Translation("Qedcity"),
 *   base_table = "qedcity",
 *   entity_keys = {
 *     "id" = "qedcity_id",
 *     "label" = "city",
 *   },
 * )
 */
class Qedcity extends ContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['city'] = BaseFieldDefinition::create('string')
      ->setLabel(t('City'))
      ->setRequired(TRUE);

    $fields['state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('State'))
      ->setRequired(TRUE);

    $fields['pop'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Population'))
      ->setRequired(TRUE);

    $fields['loc'] = BaseFieldDefinition::create('map')
      ->setLabel(t('Location'))
      ->setRequired(TRUE);

    return $fields;
  }
}
