<?php

namespace Drupal\qed_entity\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure field mappings for the Qedcity migration.
 */
class QedcityMappingForm extends ConfigFormBase {

  protected function getEditableConfigNames() {
    return ['qed_entity.mapping'];
  }

  public function getFormId() {
    return 'qedcity_mapping_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('qed_entity.mapping');

    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $config->get('city'),
    ];

    $form['state'] = [
      '#type' => 'textfield',
      '#title' => $this->t('State'),
      '#default_value' => $config->get('state'),
    ];

    $form['pop'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Population'),
      '#default_value' => $config->get('pop'),
    ];

    $form['loc'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Location'),
      '#default_value' => $config->get('loc'),
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('qed_entity.mapping')
      ->set('city', $form_state->getValue('city'))
      ->set('state', $form_state->getValue('state'))
      ->set('pop', $form_state->getValue('pop'))
      ->set('loc', $form_state->getValue('loc'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
