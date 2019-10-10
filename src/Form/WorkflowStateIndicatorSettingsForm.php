<?php

namespace Drupal\workflow_state_indicator\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class WorkflowStateIndicatorSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'workflow_state_indicator.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'workflow_state_indicator_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['local_task'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show a Button inside the local task block'),
      '#default_value' => $config->get('local_task'),
    ];

    $form['admin_menu'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show a Button inside the admin menu'),
      '#default_value' => $config->get('admin_menu'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $editable_config = $this->configFactory->getEditable(static::SETTINGS);
    foreach ($form_state->getValues() as $key => $value) {
      $editable_config->set($key, $value);
    }
    $editable_config->save();
    parent::submitForm($form, $form_state);
  }

}
